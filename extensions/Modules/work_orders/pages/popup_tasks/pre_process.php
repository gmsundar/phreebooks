<?php
// +-----------------------------------------------------------------+
// |                   PhreeBooks Open Source ERP                    |
// +-----------------------------------------------------------------+
// | Copyright (c) 2008, 2009, 2010, 2011 PhreeSoft, LLC             |
// | http://www.PhreeSoft.com                                        |
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
//  Path: /modules/work_orders/pages/popup_tasks/pre_process.php
//
$security_level = validate_user(0, true);
/**************  include page specific files    *********************/
/**************   page specific initialization  *************************/
$rowID = (isset($_GET['rowID']) ? $_GET['rowID'] : 0);
$search_text = ($_POST['search_text']) ? db_input($_POST['search_text']) : db_input($_GET['search_text']);
if ($search_text == TEXT_SEARCH) $search_text = '';
$action = isset($_GET['action']) ? $_GET['action'] : $_POST['todo'];
if (!$action && $search_text <> '') $action = 'search'; // if enter key pressed and search not blank

/***************   hook for custom actions  ***************************/
$custom_path = DIR_FS_WORKING . 'custom/pages/popup_tasks/extra_actions.php';
if (file_exists($custom_path)) { include($custom_path); }

/***************   Act on the action request   *************************/
switch ($action) {
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
// build the list header
$heading_array = array(
  'task_name'   => TEXT_TASK_NAME,
  'description' => TEXT_DESCRIPTION,
);
$result = html_heading_bar($heading_array, $_GET['list_order'], array());
$list_header = $result['html_code'];
$disp_order = $result['disp_order'];

// build the list for the page selected
if (isset($search_text) && $search_text <> '') {
  $search_fields = array('task_name', 'description');
  // hook for inserting new search fields to the query criteria.
  if (is_array($extra_search_fields)) $search_fields = array_merge($search_fields, $extra_search_fields);
  $search = ' where ' . implode(' like \'%' . $search_text . '%\' or ', $search_fields) . ' like \'%' . $search_text . '%\'';
} else {
  $search = '';
}

$field_list = array('id', 'task_name', 'description');

// hook to add new fields to the query return results
if (is_array($extra_query_list_fields) > 0) $field_list = array_merge($field_list, $extra_query_list_fields);

$query_raw = "select " . implode(', ', $field_list)  . " from " . TABLE_WO_TASK . $search . " order by $disp_order";

$query_split  = new splitPageResults($_GET['list'], MAX_DISPLAY_SEARCH_RESULTS, $query_raw, $query_numrows);
$query_result = $db->Execute($query_raw);

$include_header   = false;
$include_footer   = false;
$include_tabs     = false;
$include_calendar = false;
$include_template = 'template_main.php';
define('PAGE_TITLE', WO_POPUP_TASK_WINDOW_TITLE);

?>