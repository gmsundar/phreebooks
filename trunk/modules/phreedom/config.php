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
//  Path: /modules/phreedom/config.php
//
// Release History
// 3.0 => 2011-01-15 - Converted from stand-alone PhreeBooks release
// 3.1 => 2011-04-15 - Bug fixes
// 3.2 => 2011-08-01 - Bug fixes, added roles
// 3.3 => 2011-11-15 - Bug fixes, theme re-design, jqueryUI integration
// 3.4 => 2012-02-15 - bug fixes, Google Chart support
// 3.5 => 2012-10-01 - bug fixes
// 3.6 => 2013-06-30 - bug fixes
// Module software version information
define('MODULE_PHREEDOM_VERSION',  3.6);
// Menu Sort Positions
define('MENU_HEADING_COMPANY_ORDER',  90);
// Menu Security id's (refer to master doc to avoid security setting overlap)
define('SECURITY_ID_USERS',            1);
define('SECURITY_ID_IMPORT_EXPORT',    2);
define('SECURITY_ID_ROLES',            5);
define('SECURITY_ID_HELP',             6);
define('SECURITY_ID_MY_PROFILE',       7);
define('SECURITY_ID_CONFIGURATION',   11); // admin for all modules
define('SECURITY_ID_BACKUP',          18);
define('SECURITY_ID_ENCRYPTION',      20);
// New Database Tables
define('TABLE_AUDIT_LOG',      DB_PREFIX . 'audit_log');
define('TABLE_CONFIGURATION',  DB_PREFIX . 'configuration');
define('TABLE_CURRENCIES',     DB_PREFIX . 'currencies');
define('TABLE_CURRENT_STATUS', DB_PREFIX . 'current_status');
define('TABLE_DATA_SECURITY',  DB_PREFIX . 'data_security');
define('TABLE_EXTRA_FIELDS',   DB_PREFIX . 'xtra_fields');
define('TABLE_EXTRA_TABS',     DB_PREFIX . 'xtra_tabs');
define('TABLE_USERS',          DB_PREFIX . 'users');
define('TABLE_USERS_PROFILES', DB_PREFIX . 'users_profiles');
// TBD Tables no longer in use, but need to verify conversion before delete
define('TABLE_IMPORT_EXPORT',  DB_PREFIX . 'import_export');
define('TABLE_REPORTS',        DB_PREFIX . 'reports');
define('TABLE_REPORT_FIELDS',  DB_PREFIX . 'report_fields');
define('TABLE_PROJECT_VERSION',DB_PREFIX . 'project_version');
// Set the title menu
$pb_headings[0] = array(
  'text' => TEXT_HOME,
  'link' => html_href_link(FILENAME_DEFAULT),
  'icon' => html_icon('actions/go-home.png', TEXT_HOME, 'small'),
);
$pb_headings[MENU_HEADING_COMPANY_ORDER] = array(
  'text' => MENU_HEADING_COMPANY,
  'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;mID=cat_company', 'SSL'),
);
$pb_headings[999] = array(
  'text' => TEXT_LOGOUT,
  'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;action=logout', 'SSL'),
  'icon' => html_icon('actions/system-log-out.png', TEXT_LOGOUT, 'small'),
);
// Set the menus
$menu[] = array(
  'text'        => TEXT_HELP,
  'heading'     => MENU_HEADING_COMPANY,
  'rank'        => 1,
  'security_id' => SECURITY_ID_HELP,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreehelp&amp;page=main', 'SSL'),
  'hidden'      => false,
  'params'      => 'target="_blank"',
);
$menu[] = array(
  'text'        => BOX_HEADING_PROFILE,
  'heading'     => MENU_HEADING_COMPANY,
  'rank'        => 5,
  'security_id' => SECURITY_ID_MY_PROFILE,
  'hidden'      => false,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=profile', 'SSL'),
  'params'      => '',
);
$menu[] = array(
  'text'        => BOX_HEADING_CONFIGURATION,
  'heading'     => MENU_HEADING_COMPANY,
  'rank'        => 10,
  'security_id' => SECURITY_ID_CONFIGURATION, 
  'hidden'      => $_SESSION['admin_security'][SECURITY_ID_CONFIGURATION] > 0 ? false : true,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=admin', 'SSL'),
  'params'      => '',
);
if (DEBUG) $menu[] = array(
  'text'        => BOX_HEADING_DEBUG_DL,
  'heading'     => MENU_HEADING_TOOLS,
  'rank'        => 0,
  'security_id' => SECURITY_ID_CONFIGURATION,
  'hidden'      => false,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;action=debug', 'SSL'),
  'params'      => '',
);
if (ENABLE_ENCRYPTION) $menu[] = array(
  'text'        => BOX_HEADING_ENCRYPTION,
  'heading'     => MENU_HEADING_TOOLS,
  'rank'        => 1,
  'security_id' => SECURITY_ID_ENCRYPTION,
  'hidden'      => false,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=encryption', 'SSL'),
  'params'      => '',
);
$menu[] = array(
  'text'        => BOX_IMPORT_EXPORT, 
  'heading'     => MENU_HEADING_TOOLS, 
  'rank'        => 50, 
  'security_id' => SECURITY_ID_IMPORT_EXPORT, 
  'hidden'      => false,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=import_export', 'SSL'),
  'params'      => '',
);
$menu[] = array(
  'text'        => BOX_HEADING_BACKUP,
  'heading'     => MENU_HEADING_TOOLS,
  'rank'        => 95,
  'security_id' => SECURITY_ID_BACKUP, 
  'hidden'      => $_SESSION['admin_security'][SECURITY_ID_BACKUP] > 3 ? false : true,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=backup', 'SSL'),
  'params'      => '',
);
$menu[] = array(
  'text'        => BOX_HEADING_USERS,
  'heading'     => MENU_HEADING_COMPANY,
  'rank'        => 90,
  'security_id' => SECURITY_ID_USERS, 
  'hidden'      => false,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=users&amp;list=1', 'SSL'),
  'params'      => '',
);
$menu[] = array(
  'text'        => BOX_HEADING_ROLES,
  'heading'     => MENU_HEADING_COMPANY,
  'rank'        => 85,
  'security_id' => SECURITY_ID_ROLES, 
  'hidden'      => false,
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=roles&amp;list=1', 'SSL'),
  'params'      => '',
);

?>