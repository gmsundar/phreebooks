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
//  Path: /modules/bulk_inv/pages/bulk_inv/pre_process.php
//
/**************   Check user security   *****************************/
$security_level = validate_user(SECURITY_ID_MAINTAIN_INVENTORY);
/**************  include page specific files    *********************/
/**************   page specific initialization  *************************/
$search_text  = $_POST['search_text'] ? db_input($_POST['search_text']) : db_input($_GET['search_text']);
if ($search_text == TEXT_SEARCH) $search_text = '';
$_GET['search_text'] = $search_text;
$action       = isset($_GET['action']) ? $_GET['action'] : $_POST['todo'];
if (!$action && $search_text <> '') $action = 'search';
$field_cnt    = $_POST['field_cnt'] ? $_POST['field_cnt'] : ($_GET['c'] ? $_GET['c'] : '3');
$_GET['c']    = $field_cnt;
for ($i = 0; $i < $field_cnt; $i++) {
	$field[$i] = $_POST['field'.$i] ? $_POST['field'.$i] : ($_GET['f'.$i] ? $_GET['f'.$i] : 'upc_code');
	$_GET['f'.$i] = $field[$i];
}
// load the sort fields
$_GET['sf'] = $_POST['sort_field'] ? $_POST['sort_field'] : $_GET['sf'];
$_GET['so'] = $_POST['sort_order'] ? $_POST['sort_order'] : $_GET['so'];
/***************   Act on the action request   *************************/
switch ($action) {
  case 'save':
	validate_security($security_level, 3);
	$row = 0;
	while (true) {
	  $id = $_POST['id_'.$row];
	  if (!$id) break;
	  $sql_data_array = array();
	  for ($i = 0; $i < $field_cnt; $i++) {
		$sql_data_array[$field[$i]] = $_POST['f'.$i.'_'.$row]; 
	  }
//echo 'updating id = ' . $id . ' with '; print_r($sql_data_array); echo '<br><br>';
	  db_perform(TABLE_INVENTORY, $sql_data_array, 'update', "id = $id");
	  $row++;
	}
	$messageStack->add('Finished updating inventory database', 'success');
	break;
  case 'go_first':    $_GET['list'] = 1;     break;
  case 'go_previous': $_GET['list']--;       break;
  case 'go_next':     $_GET['list']++;       break;
  case 'go_last':     $_GET['list'] = 99999; break;
  case 'search':
  case 'search_reset':
  case 'go_page':
  default:
}

/*****************   prepare to display templates  *************************/
$skip   = array('id', 'sku', 'inactive', 'inventory_type', 'account_sales_income', 'account_inventory_wage',
	'account_cost_of_sales', 'cost_method', 'quantity_on_hand', 'quantity_on_order', 'quantity_on_sales_order',
	'quantity_on_allocation', 'minimum_stock_level', 'reorder_quantity', 'serialize', 'creation_date',
	'last_update', 'last_journal_date'
);

$fields = array();
$result = $db->Execute("show fields from ".TABLE_INVENTORY);
while (!$result->EOF) {
	if (!in_array($result->fields['Field'], $skip)) {
		$fields[] = array('id' => $result->fields['Field'], 'text' => $result->fields['Field']);
	}
	$result->MoveNext();
}
// build the list header
$heading_array = array('sku' => TEXT_SKU);
for ($i = 0; $i < $field_cnt; $i++) $heading_array[$field[$i]] = $field[$i];
$result      = html_heading_bar($heading_array, $_GET['sf'], $_GET['so']);
$list_header = $result['html_code'];
$disp_order  = $result['disp_order'];

// build the list for the page selected
$criteria = array();
if (isset($search_text) && $search_text <> '') {
	$search_fields = array('sku', 'description_short', 'description_sales', 'description_purchase');
	// hook for inserting new search fields to the query criteria.
	$criteria[] = '(' . implode(' like \'%' . $search_text . '%\' or ', $search_fields) . ' like \'%' . $search_text . '%\')';
}
// build search filter string
$search = (sizeof($criteria) > 0) ? (' where ' . implode(' and ', $criteria)) : '';
$field_list = array('id', 'sku', 'description_short');
for ($i = 0; $i < $field_cnt; $i++) $field_list[] = $field[$i] . ' as f'.$i;

$query_raw        = "select ".implode(', ', $field_list)." from ".TABLE_INVENTORY."$search order by $disp_order";
$query_split      = new splitPageResults($_GET['list'], MAX_DISPLAY_SEARCH_RESULTS, $query_raw, $query_numrows);
$query_result     = $db->Execute($query_raw);
$include_header   = true;
$include_footer   = true;
$include_template = 'template_main.php';
define('PAGE_TITLE', 'Bulk Inventory Updater');

?>