<?php
require_once(DIR_FS_MODULES . 'inventory/classes/inventory.php');
class lb extends inventory {//Labor
	public $inventory_type			= 'lb';
	public $title					= INV_TYPES_LB;
	public $account_sales_income	= INV_LABOR_DEFAULT_SALES;
	public $account_inventory_wage	= INV_LABOR_DEFAULT_INVENTORY;
	public $account_cost_of_sales	= INV_LABOR_DEFAULT_COS;
	public $cost_method				= 'f';
	public $posible_cost_methodes   = array('f');
		
}