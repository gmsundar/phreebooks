<?php
require_once(DIR_FS_MODULES . 'inventory/classes/inventory.php');
class si extends inventory {//Stock Item
	public $inventory_type			= 'si';
	public $title					= INV_TYPES_SI;
	public $account_sales_income	= INV_STOCK_DEFAULT_SALES;
	public $account_inventory_wage	= INV_STOCK_DEFAULT_INVENTORY;
	public $account_cost_of_sales	= INV_STOCK_DEFAULT_COS; 
	public $cost_method				= INV_STOCK_DEFAULT_COSTING;
		
}