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
//  Path: /modules/import_bank/config.php
//

// Release History
// 1 16-10-2012 created.
// Module software version information
define('MODULE_AUDIT_VERSION',  '1');
// Menu Sort Positions

// Menu Security id's
define('SECURITY_ID_AUDIT',      500);
// New Database Tables

// Set the menus
if (defined('MODULE_AUDIT_STATUS')) {
  $menu[] = array(
    'text'        => BOX_AUDIT_MODULE,
    'heading'     => MENU_HEADING_GL,
    'rank'        => 80,
    'security_id' => SECURITY_ID_AUDIT,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=audit&amp;page=main', 'SSL'),
  );
}

?>