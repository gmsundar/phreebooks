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
//  Path: /modules/phreebooks/dashboards/open_inv/open_inv.php
//
// Revision history
// 2011-07-01 - Added version number for revision control
// 2011-12-20 - Updated to show invoice balance, was total invoice amount 

require_once(DIR_FS_MODULES . 'phreebooks/functions/phreebooks.php');

class open_inv extends ctl_panel {
	public $dashboard_id 		= 'open_inv';
	public $description	 		= CP_OPEN_INV_DESCRIPTION;
	public $security_id  		= SECURITY_ID_SALES_INVOICE;
	public $title		 		= CP_OPEN_INV_TITLE;
	public $version      		= 3.5;
	
	function Output($params) {
		global $db, $currencies;
		$list_length = array();
		$contents = '';
		$control  = '';
		for ($i = 0; $i <= $this->max_length; $i++) $list_length[] = array('id' => $i, 'text' => $i);
		// Build control box form data
		$control  = '<div class="row">';
		$control .= '<div style="white-space:nowrap">' . TEXT_SHOW . TEXT_SHOW_NO_LIMIT;
		$control .= html_pull_down_menu('open_inv_field_0', $list_length, $params['num_rows']);
		$control .= html_submit_field('sub_open_inv', TEXT_SAVE);
		$control .= '</div></div>';
		// Build content box
		$total = 0;
		$sql = "select id, purchase_invoice_id, total_amount, bill_primary_name, currencies_code, currencies_value 
		  from " . TABLE_JOURNAL_MAIN . " 
		  where journal_id = 12 and closed = '0' order by post_date DESC, purchase_invoice_id DESC";
		if ($params['num_rows']) $sql .= " limit " . $params['num_rows'];
		$result = $db->Execute($sql);
		if ($result->RecordCount() < 1) {
		  	$contents = ACT_NO_RESULTS;
		} else {
		  	while (!$result->EOF) {
		  		$inv_balance = $result->fields['total_amount'] - fetch_partially_paid($result->fields['id']);
		 		$total += $inv_balance;
				$contents .= '<div style="float:right">' . $currencies->format_full($inv_balance, true, $result->fields['currencies_code'], $result->fields['currencies_value']) . '</div>';
				$contents .= '<div>';
				$contents .= '<a href="' . html_href_link(FILENAME_DEFAULT, 'module=phreebooks&amp;page=orders&amp;oID='.$result->fields['id'].'&amp;jID=12&amp;action=edit', 'SSL') . '">';
				$contents .= $result->fields['purchase_invoice_id'] . ' - ';
				$contents .= htmlspecialchars($result->fields['bill_primary_name']);
				$contents .= '</a></div>' . chr(10);
				$result->MoveNext();
		  	}
		}
		if (!$params['num_rows'] && $result->RecordCount() > 0) {
		  	$contents .= '<div style="float:right">' . $currencies->format_full($total, true, DEFAULT_CURRENCY, 1) . '</div>';
		  	$contents .= '<div><b>' . TEXT_TOTAL . '</b></div>' . chr(10);
		}
		return $this->build_div('', $contents, $control);
	}

	function Update() {
		$this->params['num_rows'] = db_prepare_input($_POST['open_inv_field_0']);
		parent::Update();
	}

}
?>