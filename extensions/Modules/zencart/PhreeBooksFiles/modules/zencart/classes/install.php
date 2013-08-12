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
//  Path: /modules/zencart/classes/install.php
//

class zencart_admin {
  function zencart_admin() {
	$this->notes = array(); // placeholder for any operational notes
	$this->prerequisites = array( // modules required and rev level for this module to work properly
	  'phreedom'   => '3.1',
	  'contacts'   => '3.4',
	  'inventory'  => '3.1',
	  'payment'    => '3.1',
	  'phreebooks' => '3.1',
	  'shipping'   => '3.1',
	);
	// Load configuration constants for this module, must match entries in admin tabs
    $this->keys = array(
	  'ZENCART_URL'               => 'http://',
	  'ZENCART_USERNAME'          => '',
	  'ZENCART_PASSWORD'          => '',
	  'ZENCART_PRODUCT_TAX_CLASS' => '',
	  'ZENCART_USE_PRICE_SHEETS'  => '0',
	  'ZENCART_PRICE_SHEET'       => '',
	  'ZENCART_STATUS_CONFIRM_ID' => '',
	  'ZENCART_STATUS_PARTIAL_ID' => '',
	);
	// add new directories to store images and data
	$this->dirlist = array(
	);
	// Load tables
	$this->tables = array(
    );
  }

  function install($module) {
    global $db, $messageStack;
	$error = false;
	if (!db_field_exists(TABLE_INVENTORY, 'catalog')) { // setup new tab in table inventory
	  $sql_data_array = array(
	    'module_id'   => 'inventory',
	    'tab_name'    => 'ZenCart',
	    'description' => 'ZenCart Catalog',
	    'sort_order'  => '49',
	  );
	  db_perform(TABLE_EXTRA_TABS, $sql_data_array);
	  $tab_id = db_insert_id();
	  gen_add_audit_log(ZENCART_LOG_TABS . TEXT_ADD, 'zencart');
	  // setup extra fields for inventory
	  $sql_data_array = array(
	    'module_id'   => 'inventory',
	    'tab_id'      => $tab_id,
	    'entry_type'  => 'check_box',
	    'field_name'  => 'catalog',
	    'description' => ZENCART_CATALOG_ADD,
	    'params'      => serialize(array('type' => 'check_box', 'select' => '0')),
	  );
	  db_perform(TABLE_EXTRA_FIELDS, $sql_data_array);
	  $db->Execute("alter table " . TABLE_INVENTORY . " add column `catalog` enum('0','1') default '0'");
	  $sql_data_array = array(
	    'module_id'   => 'inventory',
	    'tab_id'      => $tab_id,
	    'entry_type'  => 'text',
	    'field_name'  => 'category_id',
	    'description' => ZENCART_CATALOG_CATEGORY_ID,
	    'params'      => serialize(array('type' => 'text', 'length' => '64', 'default' => '')),
	  );
	  db_perform(TABLE_EXTRA_FIELDS, $sql_data_array);
	  $db->Execute("alter table " . TABLE_INVENTORY . " add column `category_id` varchar(64) default ''");
	  $sql_data_array = array(
	    'module_id'   => 'inventory',
	    'tab_id'      => $tab_id,
	    'entry_type'  => 'text',
	    'field_name'  => 'manufacturer',
	    'description' => ZENCART_CATALOG_MANUFACTURER,
	    'params'      => serialize(array('type' => 'text', 'length' => '64', 'default' => '')),
	  );
	  db_perform(TABLE_EXTRA_FIELDS, $sql_data_array);
	  $db->Execute("alter table " . TABLE_INVENTORY . " add column `manufacturer` varchar(64) default ''");
	  gen_add_audit_log(ZENCART_LOG_FIELDS . TEXT_NEW, 'zencart - catalog');
	}
    return $error;
  }

  function initialize($module) {
  }

  function update($module) {
    global $db, $messageStack;
	$error = false;
	if (!$error) {
	  write_configure('MODULE_' . strtoupper($module) . '_STATUS', constant('MODULE_' . strtoupper($module) . '_VERSION'));
   	  $messageStack->add(sprintf(GEN_MODULE_UPDATE_SUCCESS, $module, constant('MODULE_' . strtoupper($module) . '_VERSION')), 'success');
	}
	return $error;
  }

  function remove($module) {
  }

  function load_reports($module) {
  }

  function load_demo() {
  }

}
?>