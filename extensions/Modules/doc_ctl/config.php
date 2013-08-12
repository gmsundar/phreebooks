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
//  Path: /modules/doc_ctl/config.php
//

define('NAME_TRIM_LENGTH','24'); // TBD - needs to move to admin constant

// 0.1 => 2010-09-01 - Converted from stand-alone PhreeBooks release
// 1.0 => 2011-11-15 - Initial module release, themeroller compatible
// Module software version information
define('MODULE_DOC_CTL_VERSION',  '1.0');
// Menu Sort Positions
define('BOX_DOC_CTL_ORDER',          10);
define('MENU_HEADING_QUALITY_ORDER', 80);
// Security id's
define('SECURITY_ID_DOC_CONTROL',   210);
// New Database Tables
define('TABLE_DC_DOCUMENT', DB_PREFIX . 'doc_ctl');
// Set the title menu
$pb_headings[MENU_HEADING_QUALITY_ORDER] = array(
  'text' => MENU_HEADING_QUALITY, 
  'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=index&amp;mID=cat_qa', 'SSL'),
);
// Menu Locations
$menu[] = array(
  'text'        => BOX_DOC_CTL_MODULE, 
  'heading'     => MENU_HEADING_QUALITY, 
  'rank'        => BOX_DOC_CTL_ORDER, 
  'security_id' => SECURITY_ID_DOC_CONTROL, 
  'link'        => html_href_link(FILENAME_DEFAULT, 'module=doc_ctl&amp;page=main', 'SSL'),
);

?>