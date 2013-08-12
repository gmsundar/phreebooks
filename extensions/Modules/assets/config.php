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
//  Path: /modules/assets/config.php
//
// Release History
// 3.0 => 2011-01-14 - Converted from stand-alone PhreeBooks release
// 3.1 => 2011-04-15 - Bug fixes
// 3.3 => 2011-11-15 - Theme conversion
// Module software version information
define('MODULE_ASSETS_VERSION',       '3.3');
// Menu sort positions
define('MENU_HEADING_ASSETS_ORDER',      77);
define('BOX_ASSETS_MODULE_ORDER',        90);
// Menu security id's
define('SECURITY_ASSETS_MGT',            170);
// New database tables
define('TABLE_ASSETS',        DB_PREFIX . 'assets');
if (defined('MODULE_ASSETS_STATUS')) {
/*
  // Set the title menu
  $pb_headings[MENU_HEADING_ASSETS_ORDER] = array(
    'text' => MENU_HEADING_ASSETS, 
    'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;mID=cat_assets', 'SSL'),
  );
*/
  // Set the menus
  $menu[] = array(
    'text'        => BOX_ASSET_MODULE, 
    'heading'     => MENU_HEADING_COMPANY, // MENU_HEADING_ASSETS, 
    'rank'        => BOX_ASSETS_MODULE_ORDER, 
    'security_id' => SECURITY_ASSETS_MGT, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=assets&amp;page=main', 'SSL'),
  );
}

?>