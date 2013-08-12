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
//  Path: /themes/default/menu.php
//
echo '<!-- Pull Down Menu -->' . chr(10);
switch (MY_MENU) {
   case 'left': echo '<div id="smoothmenu" class="ddsmoothmenu-v" style="float:left">'.chr(10); break;
   case 'top':
   default:     echo '<div id="smoothmenu" class="ddsmoothmenu">'.chr(10); break;
}
echo '  <ul>' . chr(10);
if (is_array($pb_headings)) {
  ksort($pb_headings); // sorts the category headings with included extra modules
  foreach ($pb_headings as $box) {
    $sorted_menu = array();
	if ($box['text'] == TEXT_HOME || $box['text'] == TEXT_LOGOUT) {
	  echo '  <li><a href="'.$box['link'].'">';
	  if ($box['text']==TEXT_HOME && ENABLE_ENCRYPTION && strlen($_SESSION['admin_encrypt']) > 0) {
		echo html_icon('emblems/emblem-readonly.png', TEXT_ENCRYPTION_ENABLED, 'small');
	  }
	  echo ($box['icon'] ? $box['icon'].' '.$box['text'] : $box['text']).'</a></li>'.chr(10);
	} else {
      $hide_menu   = true;
      foreach ($menu as $item)  {
	    if (isset($item['heading']) && !$item['hidden']) {
	      if ($item['heading'] == $box['text'] && isset($_SESSION['admin_security'][$item['security_id']]) && $_SESSION['admin_security'][$item['security_id']] > 0) {
		    $sorted_menu['text'][]    = $item['text'];
		    $sorted_menu['heading'][] = $item['heading'];
		    $sorted_menu['rank'][]    = $item['rank'];
		    $sorted_menu['link'][]    = $item['link'];
		    $sorted_menu['params'][]  = $item['params'];
		    if ($item['text'] <> TEXT_REPORTS) $hide_menu = false;
	      }
	    }
      }
	  if (is_array($sorted_menu['rank']) && !$hide_menu) {
	    $result = array_multisort(
		  $sorted_menu['rank'], SORT_ASC, SORT_NUMERIC, 
		  $sorted_menu['text'], SORT_ASC, SORT_STRING, 
		  $sorted_menu['link'], SORT_ASC, SORT_STRING);
	    if ($result) {
	      echo '  <li><a href="'.$box['link'].'">'.$box['text'].'</a>'.chr(10);
	      echo '    <ul>' . chr(10);
	      foreach ($sorted_menu['text'] as $key => $item) {
	        echo '      <li><a href="'.$sorted_menu['link'][$key].'" '.$sorted_menu['params'][$key].'>'.$item.'</a></li>'.chr(10);
	      }
	      echo '    </ul>'.chr(10);
	      echo '  </li>'.chr(10);
	    } else {
	      die('Error in multi-sort in header_navigation.php');
	    }
      }
	}
  }
}
echo '  </ul>'.chr(10);
echo '<br style="clear:left" />'.chr(10);
echo '</div>'.chr(10);
switch (MY_MENU) {
   case 'left': echo '<div style="float:left;margin-left:auto;margin-right:auto;">'.chr(10); break;
   case 'top':
   default:     echo '<div>'.chr(10); break;
}

?>
