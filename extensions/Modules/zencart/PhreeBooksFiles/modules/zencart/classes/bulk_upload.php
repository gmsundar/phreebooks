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
//  Path: /modules/zencart/classes/bulk_upload.php
//

class bulk_upload {
  function bulk_upload() {
  }

  function bulkUpload($inc_image = false) {
	global $db, $messageStack;
	$error  = false;
	$result = $db->Execute("select id from " . TABLE_INVENTORY . " where catalog = '1' and inactive = '0'");
	$cnt    = 0;
	while(!$result->EOF) {
	  $prodXML = new zencart();
	  if (!$prodXML->submitXML($result->fields['id'], 'product_ul', true, $inc_image)) {
		$error = true;
		break;
	  }
	  $cnt++;
	  $result->MoveNext();
	}
	$messageStack->add(sprintf(ZENCART_BULK_UPLOAD_SUCCESS, $cnt), 'success');
	return ($error ? true : false);
  }

}
?>