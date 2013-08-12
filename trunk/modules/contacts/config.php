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
//  Path: /modules/contacts/config.php
//
// Release History
// 3.0 => 2011-01-15 - Converted from stand-alone PhreeBooks release
// 3.1 => released by Rene on the forum
// 3.2 => Release by Rene on the forum
// 3.3 => 2011-04-15 - CRM additions, bug fixes
// 3.4 => 2011-08-01 - bug fixes
// 3.5 => 2011-11-15 - bug fixes, attachments, themeroller changes
// 3.6 => 2012-02-15 - bug fixes, improved CRM, clean up forms
// 3.7 => 2012-10-01 - bug fixes, redesign of the classes/methods
// 3.7.1 => 2013-06-30 - Bug fixes 
// Module software version information
define('MODULE_CONTACTS_VERSION',     3.71);
// Menu Sort Positions
define('MENU_HEADING_CUSTOMERS_ORDER',   10);
define('MENU_HEADING_VENDORS_ORDER',     20);
define('MENU_HEADING_EMPLOYEES_ORDER',   60);
// Menu Security id's (refer to master doc to avoid security setting overlap)
define('SECURITY_ID_MAINTAIN_BRANCH',    15);
define('SECURITY_ID_MAINTAIN_CUSTOMERS', 26);
define('SECURITY_ID_MAINTAIN_EMPLOYEES', 76);
define('SECURITY_ID_MAINTAIN_PROJECTS',  16);
define('SECURITY_ID_PROJECT_PHASES',     36);
define('SECURITY_ID_PROJECT_COSTS',      37);
define('SECURITY_ID_PHREECRM',           49);
define('SECURITY_ID_MAINTAIN_VENDORS',   51);
// New Database Tables
define('TABLE_ADDRESS_BOOK',    DB_PREFIX . 'address_book');
define('TABLE_CONTACTS',        DB_PREFIX . 'contacts');
define('TABLE_CONTACTS_LOG',    DB_PREFIX . 'contacts_log');
define('TABLE_DEPARTMENTS',     DB_PREFIX . 'departments');
define('TABLE_DEPT_TYPES',      DB_PREFIX . 'departments_types');
define('TABLE_PROJECTS_COSTS',  DB_PREFIX . 'projects_costs');
define('TABLE_PROJECTS_PHASES', DB_PREFIX . 'projects_phases');
// Set the title menu
$pb_headings[MENU_HEADING_CUSTOMERS_ORDER] = array(
  'text' => MENU_HEADING_CUSTOMERS, 
  'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;mID=cat_ar', 'SSL'),
);
$pb_headings[MENU_HEADING_VENDORS_ORDER] = array(
  'text' => MENU_HEADING_VENDORS, 
  'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;mID=cat_ap', 'SSL'),
);
$pb_headings[MENU_HEADING_EMPLOYEES_ORDER] = array(
  'text' => MENU_HEADING_EMPLOYEES, 
  'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;mID=cat_hr', 'SSL'),
);
// Set the menus
$menu[] = array(
  'text'        => BOX_CONTACTS_NEW_CUSTOMER, 
  'heading'     => MENU_HEADING_CUSTOMERS, 
  'rank'        => 5, 
  'hide'        => true,
  'security_id' => SECURITY_ID_MAINTAIN_CUSTOMERS, 
  'hidden'      => $_SESSION['admin_security'][SECURITY_ID_MAINTAIN_CUSTOMERS] > 1 ? false : true,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;action=new&amp;type=c', 'SSL'),
  'params'	    => '',
);
$menu[] = array(
  'text'        => BOX_CONTACTS_MAINTAIN_CUSTOMERS, 
  'heading'     => MENU_HEADING_CUSTOMERS, 
  'rank'        => 10, 
  'security_id' => SECURITY_ID_MAINTAIN_CUSTOMERS,
  'hidden'      => false, 
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;type=c&amp;list=1', 'SSL'),
  'params'	    => '',
);
$menu[] = array(
  'text'        => BOX_PHREECRM_MODULE, 
  'heading'     => MENU_HEADING_CUSTOMERS, 
  'rank'        => 15, 
  'security_id' => SECURITY_ID_PHREECRM,
  'hidden'      => false, 
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;type=i&amp;list=1', 'SSL'),
  'params'	    => '',
);
$menu[] = array(
  'text'        => BOX_CONTACTS_NEW_VENDOR, 
  'heading'     => MENU_HEADING_VENDORS, 
  'rank'        => 5, 
  'hide'        => true,
  'security_id' => SECURITY_ID_MAINTAIN_VENDORS, 
  'hidden'      => $_SESSION['admin_security'][SECURITY_ID_MAINTAIN_VENDORS] > 1 ? false : true,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;action=new&amp;type=v', 'SSL'),
  'params'      => '',
);
$menu[] = array(
  'text'        => BOX_CONTACTS_MAINTAIN_VENDORS, 
  'heading'     => MENU_HEADING_VENDORS, 
  'rank'        => 10, 
  'security_id' => SECURITY_ID_MAINTAIN_VENDORS,
  'hidden'      => false, 
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;type=v&amp;list=1', 'SSL'),
  'params'      => '',
);
$menu[] = array(
  'text'        => BOX_CONTACTS_NEW_EMPLOYEE,
  'heading'     => MENU_HEADING_EMPLOYEES, 
  'rank'        => 5, 
  'hide'        => true,
  'security_id' => SECURITY_ID_MAINTAIN_EMPLOYEES, 
  'hidden'      => $_SESSION['admin_security'][SECURITY_ID_MAINTAIN_EMPLOYEES] > 1 ? false : true,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;action=new&amp;type=e', 'SSL'),
  'params'      => '',
);
$menu[] = array(
  'text'        => BOX_CONTACTS_MAINTAIN_EMPLOYEES, 
  'heading'     => MENU_HEADING_EMPLOYEES, 
  'rank'        => 10, 
  'security_id' => SECURITY_ID_MAINTAIN_EMPLOYEES,
  'hidden'      => false, 
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;type=e&amp;list=1', 'SSL'),
  'params'      => '',
);
if (ENABLE_MULTI_BRANCH) { // don't show menu if multi-branch is disabled
  $menu[] = array(
	'text'        => BOX_CONTACTS_NEW_BRANCH, 
	'heading'     => MENU_HEADING_COMPANY, 
	'rank'        => 55, 
	'hide'        => true,
	'security_id' => SECURITY_ID_MAINTAIN_BRANCH, 
    'hidden'      => $_SESSION['admin_security'][SECURITY_ID_MAINTAIN_BRANCH] > 1 ? false : true,
	'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;action=new&amp;type=b', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
	'text'        => BOX_CONTACTS_MAINTAIN_BRANCHES, 
	'heading'     => MENU_HEADING_COMPANY, 
	'rank'        => 56, 
	'security_id' => SECURITY_ID_MAINTAIN_BRANCH,
    'hidden'      => false, 
	'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;type=b&amp;list=1', 'SSL'),
    'params'      => '',
  );
} // end disable if not looking at branches
$menu[] = array(
  'text'        => BOX_CONTACTS_MAINTAIN_PROJECTS, 
  'heading'     => MENU_HEADING_CUSTOMERS, 
  'rank'        => 60, 
  'security_id' => SECURITY_ID_MAINTAIN_PROJECTS,
  'hidden'      => false, 
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=contacts&amp;page=main&amp;type=j&amp;list=1', 'SSL'),
  'params'      => '',
);

?>