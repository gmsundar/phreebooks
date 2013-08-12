<?php
// +-----------------------------------------------------------------+
// |                   PhreeBooks Open Source ERP                    |
// +-----------------------------------------------------------------+
// | Copyright (c) 2007-2008 PhreeSoft, LLC                          |
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
//  Path: /modules/zencart/pages/admin/pre_process.php
//
$security_level = validate_user(SECURITY_ID_CONFIGURATION);
/**************  include page specific files    *********************/
gen_pull_language($module, 'admin');
require_once(DIR_FS_WORKING . 'functions/zencart.php');
require_once(DIR_FS_WORKING . 'classes/install.php');

/**************   page specific initialization  *************************/
$error   = false; 
$action  = (isset($_GET['action']) ? $_GET['action'] : $_POST['todo']);
$install = new zencart_admin();

/***************   hook for custom actions  ***************************/
$custom_path = DIR_FS_WORKING . 'custom/pages/admin/extra_actions.php';
if (file_exists($custom_path)) { include($custom_path); }
/***************   Act on the action request   *************************/
switch ($action) {
  case 'save':
	if ($security_level < 3) {
		$messageStack->add_session(ERROR_NO_PERMISSION,'error');
		gen_redirect(html_href_link(FILENAME_DEFAULT, gen_get_all_get_params(array('action')), 'SSL')); 
	}
	// save general tab
	foreach ($install->keys as $key => $default) {
	  $field = strtolower($key);
      if (isset($_POST[$field])) write_configure($key, $_POST[$field]);
    }
	gen_redirect(html_href_link(FILENAME_DEFAULT, gen_get_all_get_params(array('action')), 'SSL'));
	$messageStack->add(ZENCART_CONFIG_SAVED, 'success');
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
// build some general pull down arrays
$sel_yes_no = array(
 array('id' => '0', 'text' => TEXT_NO),
 array('id' => '1', 'text' => TEXT_YES),
);

$include_header   = true;
$include_footer   = true;
$include_tabs     = true;
$include_calendar = false;
$include_template = 'template_main.php';
define('PAGE_TITLE', BOX_ZENCART_ADMIN);

?>