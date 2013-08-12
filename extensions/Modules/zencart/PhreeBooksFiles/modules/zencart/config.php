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
//  Path: /modules/zencart/config.php
//

// Release History
// 3.0 => 2011-01-25 - Converted from stand-alone PhreeBooks release
// 3.1 => 2011-04-15 - Bug fixes
// 3.2 => 2011-05-27 - Patch for shared field change in Phreedom 3.1

// Module software version information
define('MODULE_ZENCART_VERSION',      '3.3');
// Set the menu order, if using ZenCart title menu option (after Customers and before Vendors)
define('MENU_HEADING_ZENCART_ORDER',     15);
// Security id's
define('SECURITY_ID_ZENCART_INTERFACE', 200);
// New Database Tables
if (defined('MODULE_ZENCART_STATUS')) {
/*
  $pb_headings[MENU_HEADING_ZENCART_ORDER] = array(
    'text' => MENU_HEADING_ZENCART, 
    'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=index&amp;mID=cat_zencart', 'SSL'),
  );
*/
  // Menu Locations
  $menu[] = array(
    'text'        => BOX_ZENCART_MODULE, 
    'heading'     => MENU_HEADING_TOOLS, // MENU_HEADING_ZENCART // Change if creating own title menu item
    'rank'        => 31, 
    'security_id' => SECURITY_ID_ZENCART_INTERFACE, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=zencart&amp;page=main', 'SSL'),
  );
}
?>