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
//  Path: /modules/inventory/classes/sales_report_qty_year.php
//

// this file contains special function calls to generate the data array needed to build reports not possible
// with the current reportbuilder structure.
class sales_report_qty_year {
	// List the special fields as an array to substitute out for the sql, must match from the selection menu generation
	public $special_field_array = array('this_year','one_year_ago','two_years_ago','three_years_ago');
	
  	function __construct() {

  	}
  	
	function load_report_data($report, $Seq, $sql, $GrpField) {
		global $db;
		foreach ($report->fieldlist as $key => $value) {
			if($key == ltrim($GrpField, 'c')) {
				$group_field = $value->fieldname; 
			}
		}
		// prepare the sql by temporarily replacing calculated fields with real fields
		$sql_fields = substr($sql, strpos($sql,'select ') + 7, strpos($sql, ' from ') - 7);
		$this->sql_field_array = explode(', ', $sql_fields);
		for ($i = 0; $i < count($this->sql_field_array); $i++) {
	  		$this->sql_field_karray['c' . $i] = substr($this->sql_field_array[$i], 0, strpos($this->sql_field_array[$i], ' '));
		}
		$sql = $this->replace_special_fields($sql);
		$temp_sql = explode("FROM", $sql);
		$sql = $temp_sql[0] .", journal_item.sku, sum(journal_item.qty) as qty FROM " . $temp_sql[1];
		$temp_sql = explode("WHERE", $sql);
		$YrStrt = CURRENT_ACCOUNTING_PERIOD - ((CURRENT_ACCOUNTING_PERIOD - 1) % 12);
		$temp = gen_calculate_fiscal_dates($YrStrt);
		$ds = $temp['start_date'];
		$temp = gen_calculate_fiscal_dates($YrStrt + 11);
		$de = gen_specific_date($temp['end_date'], 1);
		$orderby = explode("ORDER BY", $temp_sql[1]);
		$sql  = $temp_sql[0]." WHERE journal_main.post_date >= '" . $ds . "' and journal_main.post_date < '" . $de . "' and " .$orderby[0]. " GROUP BY " . $group_field ." ORDER BY ". $orderby[1];
		// prepare the sql by temporarily replacing calculated fields with real fields
		$result = $db->Execute($sql);
		if ($result->RecordCount() == 0) return false; // No data so bail now
		// 	Generate the output data array
		$this->inventory_data = array();
		while(!$result->EOF){
			$this->inventory_data[$result->fields[$GrpField]][0] = 'd';
			$this->inventory_data[$result->fields[$GrpField]][1] = $result->fields[$GrpField];
			$this->inventory_data[$result->fields[$GrpField]][2] = ProcessData($result->fields['qty'],'rnd2d');
			$this->inventory_data[$result->fields[$GrpField]][3] = '';
			$this->inventory_data[$result->fields[$GrpField]][4] = '';
			$this->inventory_data[$result->fields[$GrpField]][5] = '';
			$result->MoveNext();
		}
		$i = 3;
		//print_r($this->inventory_data);return;
		//move period before this.
		while(true){
			$YrStrt = $YrStrt - 12; 
			if($YrStrt < 1) break;
			$temp = gen_calculate_fiscal_dates($YrStrt);
			$ds = $temp['start_date'];
			$temp = gen_calculate_fiscal_dates($YrStrt + 11);
			$de = gen_specific_date($temp['end_date'], 1);
			$sql  = $temp_sql[0]." WHERE journal_main.post_date >= '" . $ds . "' and journal_main.post_date < '" . $de . "' and " .$orderby[0]. " GROUP BY " . $group_field ." ORDER BY ". $orderby[1];
			$result = $db->Execute($sql);
		//print('hier1');print($sql);return;	
			if($result->RecordCount()!=0) {
				while(!$result->EOF){
					if(isset($this->inventory_data[$result->fields[$GrpField]])) {
						$this->inventory_data[$result->fields[$GrpField]][$i] = ProcessData($result->fields['qty'],'rnd2d');
					}else{
						$this->inventory_data[$result->fields[$GrpField]][0] = 'd';
						$this->inventory_data[$result->fields[$GrpField]][1] = $result->fields[$GrpField];
						$this->inventory_data[$result->fields[$GrpField]][2] = '';
						$this->inventory_data[$result->fields[$GrpField]][3] = '';
						$this->inventory_data[$result->fields[$GrpField]][4] = '';
						$this->inventory_data[$result->fields[$GrpField]][5] = '';
						$this->inventory_data[$result->fields[$GrpField]][$i] = ProcessData($result->fields['qty'],'rnd2d');
					}
					
					$result->MoveNext();
				}
			}
			if($i == 5) break;
			$i++;
		}
  ksort($this->inventory_data);
//print_r($this->inventory_data);
		return $this->inventory_data;
  	}
  	
 	function build_table_drop_down() {
		$output = array();
		return $output;
  	}
  	
	function replace_special_fields($sql) {
 		$preg_array = array();
  		for ($i = 0; $i < count ($this->special_field_array); $i++ ) {
	  		$preg_array[] = '/' . $this->special_field_array[$i] . '/';
		}
		return preg_replace($preg_array, TABLE_JOURNAL_MAIN . '.id', $sql);
  	}

 	function build_selection_dropdown() {
 		global $db;
		// build user choices for this class with the current and newly established fields
		$output = array();
		$output[0] = array('id' => 'journal_item.sku', 		'text' => 'sku');
		$output[1] = array('id' => 'journal_item.gl_type',	'text' => 'gl_type');
		$output[2] = array('id' => 'journal_item.qty',		'text' => 'qty');
		$output[3] = array('id' => 'this_year', 			'text' => 'this year');
		$output[4] = array('id' => 'one_year_ago',			'text' => 'one year ago');
		$output[5] = array('id' => 'two_years_ago',			'text' => 'two years ago');
		$output[6] = array('id' => 'three_years_ago',       'text' => 'three years ago');
		$result = $db->Execute("select * from " . TABLE_EXTRA_FIELDS ." where module_id = 'inventory' order by description asc");
		$i = 7;
		while (!$result->EOF) {
			$id = "inventory.".$result->fields['field_name'] ;
			$text = $result->fields['description'];
			$output[$i] = array('id' => $id,        'text' => $text);
			$i++;
			$result->MoveNext();
		}
		
		return $output;
  	}
}
?>