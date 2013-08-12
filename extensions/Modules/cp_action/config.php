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
//  Path: /modules/cp_action/config.php
//

// Release History
// 0.1 => 2010-09-01 - Converted from stand-alone PhreeBooks release
// 3.3 => 2011-11-15 - bug fixes, themeroller changes
// Module software version information
define('MODULE_CP_ACTION_VERSION','3.3');
// Menu Sort Positions
define('BOX_CAPA_MODULE_ORDER',      80);
define('MENU_HEADING_QUALITY_ORDER', 75);
// Menu Security id's
define('SECURITY_CAPA_MGT',         185);
/// New Database Tables
define('TABLE_CAPA', DB_PREFIX . 'capa_module');
// Set the title menu
$pb_headings[MENU_HEADING_QUALITY_ORDER] = array(
  'text' => MENU_HEADING_QUALITY, 
  'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;mID=cat_qa', 'SSL'),
);
// Set the menus
$menu[] = array(
  'text'        => BOX_CAPA_MODULE, 
  'heading'     => MENU_HEADING_QUALITY,
  'rank'        => BOX_CAPA_MODULE_ORDER, 
  'security_id' => SECURITY_CAPA_MGT, 
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=cp_action&amp;page=main', 'SSL'),
);
if (defined('MODULE_PHREEFORM_STATUS')) {
  $menu[] = array(
	'text'        => TEXT_REPORTS, 
	'heading'     => MENU_HEADING_QUALITY, 
	'rank'        => 99, 
	'security_id' => SECURITY_CAPA_MGT, 
	'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreeform&amp;page=main', 'SSL'),
  );
}

?>