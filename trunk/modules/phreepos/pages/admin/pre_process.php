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
//  Path: /modules/phreepos/pages/admin/pre_process.php
//
$security_level = validate_user(SECURITY_ID_CONFIGURATION);
/**************  include page specific files    *********************/
gen_pull_language($module, 'admin');
gen_pull_language('phreedom', 'admin');
require_once(DIR_FS_WORKING . 'classes/install.php');
require_once(DIR_FS_WORKING . 'classes/tills.php');
require_once(DIR_FS_WORKING . 'classes/other_transactions.php');
/**************   page specific initialization  *************************/
$error  = false; 
$action = (isset($_GET['action']) ? $_GET['action'] : $_POST['todo']);
$install = new phreepos_admin();
$tills   = new tills();
$trans	 = new other_transactions();
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
	$messageStack->add(GENERAL_CONFIG_SAVED, 'success');
	gen_redirect(html_href_link(FILENAME_DEFAULT, gen_get_all_get_params(array('action')), 'SSL'));
    break;
  case 'delete':
	validate_security($security_level, 4); // security check
    $subject = $_POST['subject'];
    $id      = $_POST['rowSeq'];
	if (!$subject || !$id) break;
    $$subject->btn_delete($id);
	break;
  default:
}

/*****************   prepare to display templates  *************************/
// build some general pull down arrays
$sel_yes_no = array(
 array('id' => '0', 'text' => TEXT_NO),
 array('id' => '1', 'text' => TEXT_YES),
);

$sel_rounding = array(
 array('id' => '0', 'text' => TEXT_NO),
 array('id' => '1', 'text' => TEXT_INTEGER),
 array('id' => '2', 'text' => TEXT_10_CENTS),
 array('id' => '3', 'text' => TEXT_NEUTRAL),
);

$include_header   = true;
$include_footer   = true;
$include_tabs     = true;
$include_calendar = false;
$include_template = 'template_main.php';
define('PAGE_TITLE', BOX_PHREEPOS_ADMIN);

?>