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
// 0.1 01-03-2011 created.
// 0.2 04-03-2011 location of xml changed and sample added.
// 0.3 22-03-2011 Added install functions for contacts 3.1
// 0.4 31-01-2011 removed bugg from install class 
// 1   15-01-2013 added the function so that multiple bank could be attached to one contact and added iban support.
// 1.1 27-1-2013  added the transaction templates (aka known transactions). plus support for payment of multiple invoices.
// 2   28-1-2013  	complete rewrite reduced the number of sql calles.
//					added function to find invoicenumber in description for transactions that are not connected to a bank or iban account
// Module software version information
define('MODULE_IMPORT_BANK_VERSION',  '2');
// Menu Sort Positions

// Menu Security id's
define('SECURITY_ID_IMPORT_BANK',      980);
// New Database Tables
define('TABLE_IMPORT_BANK',    			DB_PREFIX . 'import_bank');
// Set the menus
if (defined('MODULE_IMPORT_BANK_STATUS')) {
  $menu[] = array(
    'text'        => BOX_IMPORT_BANK_MODULE,
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 55,
    'security_id' => SECURITY_ID_IMPORT_BANK,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=import_bank&amp;page=main', 'SSL'),
  );
}

?>