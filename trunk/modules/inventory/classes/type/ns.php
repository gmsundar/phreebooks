<?php
require_once(DIR_FS_MODULES . 'inventory/classes/inventory.php');
class ns extends inventory {//Non-stock Item
	public $title       			= INV_TYPES_NS;
    public $account_sales_income	= INV_NON_STOCK_DEFAULT_SALES;
	public $account_inventory_wage	= INV_NON_STOCK_DEFAULT_INVENTORY;
	public $account_cost_of_sales	= INV_NON_STOCK_DEFAULT_COS; 
	public $not_used_fields			= array('quantity_on_order', 'quantity_on_sales_order', 'quantity_on_allocation', 'serialize');
}