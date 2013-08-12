<?php
require_once(DIR_FS_MODULES . 'inventory/classes/inventory.php');
class ci extends inventory {//Charge Item
	public $inventory_type			= 'ci';
	public $title 					= INV_TYPES_CI;
	public $account_sales_income	= INV_CHARGE_DEFAULT_SALES;
	public $account_inventory_wage	= null;
	public $account_cost_of_sales	= null;	
	public $cost_method				= 'f';
	public $posible_cost_methodes   = array('f');
}