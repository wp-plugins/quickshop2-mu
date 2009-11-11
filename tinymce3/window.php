<?php

$wpconfig = realpath("../../../../wp-config.php");

if (!file_exists($wpconfig))  {
	echo "Could not found wp-config.php. Error in path :\n\n".$wpconfig ;	
	die;	
}// stop when wp-config is not there

require_once($wpconfig);
require_once(ABSPATH.'/wp-admin/admin.php');

// check for rights
if(!current_user_can('edit_posts')) die;

global $wpdb;

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Quickshop</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo QS_URLPATH ?>tinymce3/tinymce.js"></script>
	<base target="_self" />
</head>
<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';document.getElementById('shoptag').focus();" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="QuickShop" action="#">
	<div class="tabs">
		<ul>
			<li id="product_tab" class="current"><span><a href="javascript:mcTabs.displayTab('product_tab','quickshop_panel');" onmousedown="return false;"><?php _e("Product", 'quickshop'); ?></a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper">
		<!-- quickshop panel -->
		<div id="quickshop_panel" class="panel current">
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
            <td nowrap="nowrap"><label for="product"><?php _e("Product Name", 'quickshop'); ?></label></td>
            <td></td>
            <td><input id="product" name="product" style="width: 200px" /></td>
         </tr>
         <tr>
            <td nowrap="nowrap"><label for="price"><?php _e("Product Price", 'quickshop'); ?></label></td>
            <td>$</td>
            <td><input id="price" name="price" style="width: 100px" value="0" /></td>
          </tr>
          <tr>
            <td nowrap="nowrap"><label for="shipping"><?php _e("Product Shipping", 'quickshop'); ?></label></td>
            <td>$</td>
            <td><input id="shipping" name="shipping" style="width: 100px" value="0" /> (Optional)</td>
          </tr>
         <tr>
            <td nowrap="nowrap"><label for="shipping2"><?php _e("Product Shipping 2", 'quickshop'); ?></label></td>
            <td>$</td>
            <td><input id="shipping2" name="shipping2" style="width: 100px" value="0" /> (Optional)</td>
          </tr>
        </table>
Multiple product quantities: first item is still shipping 1, but the rest are shipping 2.
		</div>
		<!-- quickshop panel -->
	</div>

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'quickshop'); ?>" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'quickshop'); ?>" onclick="insertQSLink();" />
		</div>
	</div>
</form>
</body>
</html>
