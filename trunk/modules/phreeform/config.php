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
//  Path: /modules/phreeform/config.php
//

// Release History
// 3.0 => 2011-01-15 - Converted from stand-alone PhreeBooks release
// 3.1 => 2011-04-15 - Bug fixes, moved custom operation to modules
// 3.2 => 2011-08-01 - Bug fixes
// 3.3 => 2011-11-15 - Bug fixes, themeroller changes
// 3.4 => 2012-02-15 - bug fixes, added dynamic images, dynamic bar codes to forms
// 3.5 => 2012-10-01 - bug fixes
// 3.6 => 2013-06-30 - bug fixes
// Module software version information
define('MODULE_PHREEFORM_VERSION',  3.6);
// Menu Sort Positions
// Menu Security id's (refer to master doc to avoid security setting overlap)
define('SECURITY_ID_PHREEFORM', 3); // same as SECURITY_ID_REPORTS
// New Database Tables
define('TABLE_PHREEFORM', DB_PREFIX . 'phreeform');

if (defined('MODULE_PHREEFORM_STATUS')) {
  // Set the title menu
  // Set the menus
  $menu[] = array(
    'text'        => TEXT_REPORTS, 
    'heading'     => MENU_HEADING_TOOLS, 
    'rank'        => 25, 
    'security_id' => SECURITY_ID_PHREEFORM,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreeform&amp;page=main', 'SSL'),
    'params'      => '',
  );
  if (defined('MODULE_CONTACTS_STATUS')) { // add reports menus
	$menu[] = array(
	  'text'        => TEXT_REPORTS, 
	  'heading'     => MENU_HEADING_CUSTOMERS, 
	  'rank'        => 99, 
	  'security_id' => SECURITY_ID_PHREEFORM,
	  'hidden'      => false, 
	  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreeform&amp;page=main&amp;tab=cust', 'SSL'),
	  'params'      => '',
	);
	$menu[] = array(
	  'text'        => TEXT_REPORTS, 
	  'heading'     => MENU_HEADING_EMPLOYEES, 
	  'rank'        => 99, 
	  'security_id' => SECURITY_ID_PHREEFORM,
	  'hidden'      => false, 
	  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreeform&amp;page=main&amp;tab=hr', 'SSL'),
	  'params'      => '',
	);
	$menu[] = array(
	  'text'        => TEXT_REPORTS, 
	  'heading'     => MENU_HEADING_VENDORS, 
	  'rank'        => 99, 
	  'security_id' => SECURITY_ID_PHREEFORM,
	  'hidden'      => false, 
	  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreeform&amp;page=main&amp;tab=vend', 'SSL'),
	  'params'      => '',
	);
  }
  if (defined('MODULE_INVENTORY_STATUS')) {
	$menu[] = array(
	  'text'        => TEXT_REPORTS, 
	  'heading'     => MENU_HEADING_INVENTORY, 
	  'rank'        => 99, 
	  'security_id' => SECURITY_ID_PHREEFORM,
	  'hidden'      => false, 
	  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreeform&amp;page=main&amp;tab=inv', 'SSL'),
	  'params'      => '',
	);
  }
  if (defined('MODULE_PHREEBOOKS_STATUS')) {
	$menu[] = array(
	  'text'        => TEXT_REPORTS, 
	  'heading'     => MENU_HEADING_BANKING, 
	  'rank'        => 99, 
	  'security_id' => SECURITY_ID_PHREEFORM,
	  'hidden'      => false, 
	  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreeform&amp;page=main&amp;tab=bnk', 'SSL'),
	  'params'      => '',
	);
	$menu[] = array(
	  'text'        => TEXT_REPORTS, 
	  'heading'     => MENU_HEADING_GL, 
	  'rank'        => 99, 
	  'security_id' => SECURITY_ID_PHREEFORM,
	  'hidden'      => false, 
	  'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreeform&amp;page=main&amp;tab=gl', 'SSL'),
	  'params'      => '',
	);
  }
}

?>