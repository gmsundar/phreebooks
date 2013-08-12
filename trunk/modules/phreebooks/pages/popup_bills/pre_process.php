<?php
// +-----------------------------------------------------------------+
// |                   PhreeBooks Open Source ERP                    |
// +-----------------------------------------------------------------+
// | Copyright(c) 2008-2013 PhreeSoft, LLC (www.PhreeSoft.com)       |

// +-----------------------------------------------------------------+
// | This program is free software: you can redistribute it and/or   |
// | modify it under the terms of the GNU General Public License as  |
// | published by the Free Software Foundation, either version 3 of  |
// | the License, or any later version.                              |
// |                                                                 |
// | This program is distributed in the hope that it will be useful, |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of  |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the   |
// | GNU General Public License for more details.                    |
// +-----------------------------------------------------------------+
//  Path: /modules/phreebooks/pages/popup_bills/pre_process.php
//
$security_level = validate_user(0, true);
/**************  include page specific files  *********************/
require(DIR_FS_WORKING . 'functions/phreebooks.php');
/**************   page specific initialization  *************************/
define('JOURNAL_ID',   $_GET['jID']);
define('ACCOUNT_TYPE', $_GET['type']);

switch (JOURNAL_ID) {
  default:
  case 18: $terms_type = 'AR'; break;
  case 20: $terms_type = 'AP'; break;
  default: die ('Bad Journal id in modules/phreebooks/popup_bills.php');
}
if(!isset($_REQUEST['list'])) $_REQUEST['list'] = 1;
$acct_period = isset($_REQUEST['search_period']) ? $_REQUEST['search_period'] : CURRENT_ACCOUNTING_PERIOD;
$period_filter = ($acct_period == 'all') ? '' : (' and period = ' . $acct_period);
$search_text = db_input($_REQUEST['search_text']);
if ($search_text == TEXT_SEARCH) $search_text = '';
$action        = isset($_GET['action']) ? $_GET['action'] : $_POST['todo'];
if (!$action && $search_text <> '') $action = 'search'; // if enter key pressed and search not blank
// load the sort fields
$_GET['sf'] = $_POST['sort_field'] ? $_POST['sort_field'] : $_GET['sf'];
$_GET['so'] = $_POST['sort_order'] ? $_POST['sort_order'] : $_GET['so'];
/***************   hook for custom actions  ***************************/
$custom_path = DIR_FS_WORKING . 'custom/pages/popup_bills/extra_actions.php';
if (file_exists($custom_path)) { include($custom_path); }

/***************   Act on the action request   *************************/
switch ($action) {
  case 'go_first':    $_REQUEST['list'] = 1;     break;
  case 'go_previous': $_REQUEST['list']--;       break;
  case 'go_next':     $_REQUEST['list']++;       break;
  case 'go_last':     $_REQUEST['list'] = 99999; break;
  case 'search':
  case 'search_reset':
  case 'go_page':
  default:
}

/*****************   prepare to display templates  *************************/
// build the list header
$heading_array = array('post_date' => TEXT_DATE);
if (ENABLE_MULTI_BRANCH) $heading_array['store_id'] = GEN_STORE_ID;
$heading_array['purchase_invoice_id'] = TEXT_REFERENCE;
$heading_array['total_amount']        = TEXT_AMOUNT;
$heading_array['bill_primary_name']   = GEN_PRIMARY_NAME;
$result      = html_heading_bar($heading_array, $_GET['sf'], $_GET['so'], array());
$list_header = $result['html_code'];
$disp_order  = $result['disp_order'];

// build the list for the page selected
if (isset($search_text) && $search_text <> '') {
  $search_fields = array('bill_primary_name', 'bill_contact', 'bill_address1', 'bill_address2', 'bill_city_town', 
  	'bill_postal_code', 'purchase_invoice_id', 'total_amount');
  // hook for inserting new search fields to the query criteria.
  if (is_array($extra_search_fields)) $search_fields = array_merge($search_fields, $extra_search_fields);
  $search = ' and (' . implode(' like \'%' . $search_text . '%\' or ', $search_fields) . ' like \'%' . $search_text . '%\')';
} else {
  $search = '';
}

$field_list = array('m.id', 'm.bill_acct_id', 'm.bill_primary_name', 'm.purchase_invoice_id', 
	'm.post_date', 'm.total_amount', 'm.store_id');

// hook to add new fields to the query return results
if (is_array($extra_query_list_fields) > 0) $field_list = array_merge($field_list, $extra_query_list_fields);

$query_raw = "select SQL_CALC_FOUND_ROWS " . implode(', ', $field_list) . " 
	from " . TABLE_JOURNAL_MAIN . " m inner join " . TABLE_CONTACTS . " a on m.bill_acct_id = a.id
	where a.type = '" . (ACCOUNT_TYPE == 'v' ? 'v' : 'c') . "' 
	and m.journal_id = " . JOURNAL_ID . $period_filter . $search . " order by $disp_order";
$query_result = $db->Execute($query_raw, (MAX_DISPLAY_SEARCH_RESULTS * ($_REQUEST['list'] - 1)).", ".  MAX_DISPLAY_SEARCH_RESULTS);
// the splitPageResults should be run directly after the query that contains SQL_CALC_FOUND_ROWS
$query_split  = new splitPageResults($_REQUEST['list'], '');

$include_header   = false;
$include_footer   = true;
$include_tabs     = false;
$include_calendar = false;
$include_template = 'template_main.php';
define('PAGE_TITLE', constant('ORD_TEXT_' . JOURNAL_ID . '_' . strtoupper(ACCOUNT_TYPE) . '_WINDOW_TITLE'));

?>