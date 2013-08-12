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
//  Path: /modules/phreebooks/config.php
//
// Release History
// 3.0 => 2011-01-15 - Converted from stand-alone PhreeBooks release
// 3.1 => 2011-04-15 - Bug fixes, managers, code enhancement
// 3.2 => 2011-08-01 - Bug fixes
// 3.3 => 2011-11-15 - Bug fixes, themeroller changes
// 3.4 => 2012-02-15 - Bug fixes
// 3.5 => 2012-10-01 - bug fixes
// 3.6 => 2013-06-30 - bug fixes
// Module software version information
define('MODULE_PHREEBOOKS_VERSION',    3.6);
// Menu Sort Positions
define('MENU_HEADING_BANKING_ORDER',      40);
define('MENU_HEADING_GL_ORDER',           50);
define('MENU_HEADING_TOOLS_ORDER',        70);
// Menu Security id's (refer to master doc to avoid security setting overlap)
define('SECURITY_ID_SEARCH',               4);
define('SECURITY_ID_GEN_ADMIN_TOOLS',     19);
define('SECURITY_ID_SALES_ORDER',         28);
define('SECURITY_ID_SALES_QUOTE',         29);
define('SECURITY_ID_SALES_INVOICE',       30);
define('SECURITY_ID_SALES_CREDIT',        31);
define('SECURITY_ID_SALES_STATUS',        32);
define('SECURITY_ID_POINT_OF_SALE',       33);
define('SECURITY_ID_INVOICE_MGR',         34);
define('SECURITY_ID_QUOTE_STATUS',        35);
define('SECURITY_ID_CUST_CREDIT_STATUS',  40);
define('SECURITY_ID_PURCHASE_ORDER',      53);
define('SECURITY_ID_PURCHASE_QUOTE',      54);
define('SECURITY_ID_PURCHASE_INVENTORY',  55);
define('SECURITY_ID_POINT_OF_PURCHASE',   56);
define('SECURITY_ID_PURCHASE_CREDIT',     57);
define('SECURITY_ID_PURCHASE_STATUS',     58);
define('SECURITY_ID_RFQ_STATUS',          59);
define('SECURITY_ID_VCM_STATUS',          60);
define('SECURITY_ID_PURCH_INV_STATUS',    61);
define('SECURITY_ID_SELECT_PAYMENT',     101);
define('SECURITY_ID_CUSTOMER_RECEIPTS',  102);
define('SECURITY_ID_PAY_BILLS',          103);
define('SECURITY_ID_ACCT_RECONCILIATION',104);
define('SECURITY_ID_ACCT_REGISTER',      105);
define('SECURITY_ID_VOID_CHECKS',        106);
define('SECURITY_ID_CUSTOMER_PAYMENTS',  107);
define('SECURITY_ID_VENDOR_RECEIPTS',    108);
define('SECURITY_ID_RECEIPTS_STATUS',    111);
define('SECURITY_ID_PAYMENTS_STATUS',    112);
define('SECURITY_ID_JOURNAL_ENTRY',      126);
define('SECURITY_ID_GL_BUDGET',          129);
define('SECURITY_ID_JOURNAL_STATUS',     130);
// New Database Tables
define('TABLE_ACCOUNTING_PERIODS',        DB_PREFIX . 'accounting_periods');
define('TABLE_ACCOUNTS_HISTORY',          DB_PREFIX . 'accounts_history');
define('TABLE_CHART_OF_ACCOUNTS',         DB_PREFIX . 'chart_of_accounts');
define('TABLE_CHART_OF_ACCOUNTS_HISTORY', DB_PREFIX . 'chart_of_accounts_history');
define('TABLE_JOURNAL_ITEM',              DB_PREFIX . 'journal_item');
define('TABLE_JOURNAL_MAIN',              DB_PREFIX . 'journal_main');
define('TABLE_TAX_AUTH',                  DB_PREFIX . 'tax_authorities');
define('TABLE_TAX_RATES',                 DB_PREFIX . 'tax_rates');
define('TABLE_RECONCILIATION',            DB_PREFIX . 'reconciliation');

if (defined('MODULE_PHREEBOOKS_STATUS')) {
  // Set the title menu
  $pb_headings[MENU_HEADING_BANKING_ORDER] = array(
    'text' => MENU_HEADING_BANKING, 
    'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;mID=cat_bnk', 'SSL'),
  );
  $pb_headings[MENU_HEADING_GL_ORDER] = array(
    'text' => MENU_HEADING_GL, 
    'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;mID=cat_gl', 'SSL'),
  );
  $pb_headings[MENU_HEADING_TOOLS_ORDER] = array(
    'text' => MENU_HEADING_TOOLS, 
    'link' => html_href_link(FILENAME_DEFAULT, 'module=phreedom&amp;page=main&amp;mID=cat_tools', 'SSL'),
  );
  // Set the menus
  $menu[] = array(
    'text'        => ORD_TEXT_18_C_WINDOW_TITLE,
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 5,
    'security_id' => SECURITY_ID_CUSTOMER_RECEIPTS,
    'hidden'      => false,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=bills&amp;jID=18&amp;type=c', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_18_C_WINDOW_TITLE),
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 10,
    'security_id' => SECURITY_ID_RECEIPTS_STATUS,
    'hidden'      => false,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=18&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_20_V_WINDOW_TITLE,
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 20,
    'security_id' => SECURITY_ID_PAY_BILLS,
    'hidden'      => false,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=bills&amp;jID=20&amp;type=v', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => BOX_BANKING_SELECT_FOR_PAYMENT,
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 15,
    'security_id' => SECURITY_ID_SELECT_PAYMENT,
    'hidden'      => false,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=bulk_bills', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_20_V_WINDOW_TITLE),
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 25,
    'security_id' => SECURITY_ID_PAYMENTS_STATUS,
    'hidden'      => false,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=20&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => BOX_BANKING_BANK_ACCOUNT_REGISTER,
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 30,
    'security_id' => SECURITY_ID_ACCT_REGISTER,
    'hidden'      => false,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=register', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => BOX_BANKING_ACCOUNT_RECONCILIATION,
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 35,
    'security_id' => SECURITY_ID_ACCT_RECONCILIATION,
    'hidden'      => false,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=reconciliation', 'SSL'),
    'params'      => '',
  );
/*
  $menu[] = array(
    'text'        => BOX_BANKING_VOID_CHECKS,
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 35,
    'security_id' => SECURITY_ID_VOID_CHECKS,
    'hidden'      => false;
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=', 'SSL'),
    'params'      => '',
  );
*/
  $menu[] = array(
    'text'        => ORD_TEXT_20_C_WINDOW_TITLE,
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 40,
    'security_id' => SECURITY_ID_CUSTOMER_PAYMENTS,
    'hidden'      => false,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=bills&amp;jID=20&amp;type=c', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_18_V_WINDOW_TITLE,
    'heading'     => MENU_HEADING_BANKING,
    'rank'        => 45,
    'security_id' => SECURITY_ID_VENDOR_RECEIPTS,
    'hidden'      => false,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=bills&amp;jID=18&amp;type=v', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_9_WINDOW_TITLE,
    'heading'     => MENU_HEADING_CUSTOMERS, 
    'rank'        => 20, 
    'security_id' => SECURITY_ID_SALES_QUOTE,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=orders&amp;jID=9', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_9_WINDOW_TITLE),
    'heading'     => MENU_HEADING_CUSTOMERS, 
    'rank'        => 25, 
    'security_id' => SECURITY_ID_QUOTE_STATUS,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=9&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_10_WINDOW_TITLE, 
    'heading'     => MENU_HEADING_CUSTOMERS, 
    'rank'        => 30, 
    'security_id' => SECURITY_ID_SALES_ORDER,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=orders&amp;jID=10', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_10_WINDOW_TITLE),
    'heading'     => MENU_HEADING_CUSTOMERS, 
    'rank'        => 35, 
    'security_id' => SECURITY_ID_SALES_STATUS,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=10&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_12_WINDOW_TITLE, 
    'heading'     => MENU_HEADING_CUSTOMERS, 
    'rank'        => 40, 
    'security_id' => SECURITY_ID_SALES_INVOICE,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=orders&amp;jID=12', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_12_WINDOW_TITLE),
    'heading'     => MENU_HEADING_CUSTOMERS, 
    'rank'        => 50, 
    'security_id' => SECURITY_ID_INVOICE_MGR,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=12&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_13_WINDOW_TITLE, 
    'heading'     => MENU_HEADING_CUSTOMERS, 
    'rank'        => 55, 
    'security_id' => SECURITY_ID_SALES_CREDIT,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=orders&amp;jID=13', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_13_WINDOW_TITLE),
    'heading'     => MENU_HEADING_CUSTOMERS, 
    'rank'        => 60, 
    'security_id' => SECURITY_ID_CUST_CREDIT_STATUS,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=13&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_3_WINDOW_TITLE, 
    'heading'     => MENU_HEADING_VENDORS, 
    'rank'        => 20, 
    'security_id' => SECURITY_ID_PURCHASE_QUOTE,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=orders&amp;jID=3', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_3_WINDOW_TITLE),
    'heading'     => MENU_HEADING_VENDORS, 
    'rank'        => 25, 
    'security_id' => SECURITY_ID_RFQ_STATUS,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=3&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_4_WINDOW_TITLE, 
    'heading'     => MENU_HEADING_VENDORS, 
    'rank'        => 30, 
    'security_id' => SECURITY_ID_PURCHASE_ORDER,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=orders&amp;jID=4', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_4_WINDOW_TITLE),
    'heading'     => MENU_HEADING_VENDORS, 
    'rank'        => 35, 
    'security_id' => SECURITY_ID_PURCHASE_STATUS,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=4&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_6_WINDOW_TITLE, 
    'heading'     => MENU_HEADING_VENDORS, 
    'rank'        => 40, 
    'security_id' => SECURITY_ID_PURCHASE_INVENTORY,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=orders&amp;jID=6', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_6_WINDOW_TITLE),
    'heading'     => MENU_HEADING_VENDORS, 
    'rank'        => 45, 
    'security_id' => SECURITY_ID_PURCH_INV_STATUS,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=6&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_7_WINDOW_TITLE, 
    'heading'     => MENU_HEADING_VENDORS, 
    'rank'        => 50, 
    'security_id' => SECURITY_ID_PURCHASE_CREDIT,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=orders&amp;jID=7', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_7_WINDOW_TITLE),
    'heading'     => MENU_HEADING_VENDORS, 
    'rank'        => 55, 
    'security_id' => SECURITY_ID_VCM_STATUS,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=7&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => ORD_TEXT_2_WINDOW_TITLE, 
    'heading'     => MENU_HEADING_GL, 
    'rank'        => 5, 
    'security_id' => SECURITY_ID_JOURNAL_ENTRY,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=journal', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => sprintf(BOX_STATUS_MGR, ORD_TEXT_2_WINDOW_TITLE),
    'heading'     => MENU_HEADING_GL, 
    'rank'        => 10, 
    'security_id' => SECURITY_ID_JOURNAL_STATUS,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=status&amp;jID=2&amp;list=1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => TEXT_SEARCH,
    'heading'     => MENU_HEADING_GL,
    'rank'        => 15,
    'security_id' => SECURITY_ID_SEARCH,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=search&amp;journal_id=-1', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => BOX_GL_BUDGET, 
    'heading'     => MENU_HEADING_GL, 
    'rank'        => 50, 
    'security_id' => SECURITY_ID_GL_BUDGET,
    'hidden'      => false, 
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=budget', 'SSL'),
    'params'      => '',
  );
  $menu[] = array(
    'text'        => BOX_HEADING_ADMIN_TOOLS,
    'heading'     => MENU_HEADING_GL,
    'rank'        => 70,
    'security_id' => SECURITY_ID_GEN_ADMIN_TOOLS, 
    'hidden'      => $_SESSION['admin_security'][SECURITY_ID_GEN_ADMIN_TOOLS] > 3 ? false : true,
    'link'        => html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=admin_tools', 'SSL'),
    'params'      => '',
  );
}

?>