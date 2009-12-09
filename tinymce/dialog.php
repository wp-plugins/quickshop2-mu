<?php
$wpconfig = realpath('../../../../wp-config.php');

if ( !file_exists($wpconfig) )
{
	echo 'Could not find wp-config.php. Error in path: ' . $wpconfig;	
	
	exit;	
}

require_once($wpconfig);
require_once(ABSPATH . '/wp-admin/admin.php');

if( !current_user_can('edit_posts') ) exit;

$inventory = $quickShop->get_inventory();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>QuickShop</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-content/plugins/quick-shop/tinymce/tinymce.js"></script>
		
		<base target="_self" />
	</head>
	<body id="link" onload="tinyMCEPopup.executeOnLoad('init();'); document.body.style.display=''; document.getElementById('shoptag').focus();" style="display: none">
		<div class="tabs">
			<ul>
				<li id="product_tab" class="current"><span><a href="javascript:mcTabs.displayTab('product_tab','quickshop_panel');" onmousedown="return false;"><?php _e("QuickShop", 'quickshop'); ?></a></span></li>
			</ul>
		</div>
		
		<div class="panel_wrapper">
			<!-- quickshop panel -->
			<div id="quickshop_panel" class="panel current">
				<table border="0" cellpadding="4" cellspacing="0">
					<tr><td><br/></td></tr>
					<tr>
						<td nowrap="nowrap"><label for="product"><?php _e("Insert product", 'quickshop'); ?></label></td>
						<td></td>
						<td>
							<select name="product" id="product">
								<option value="">Select..</option>
								<?php foreach ( $inventory as $productName => $d ): ?>
								<option><?php echo $productName; ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr><td><br/></td></tr>
					<tr><td><br/></td></tr>
				</table>
				
				<div class="mceActionPanel">
					<div style="float: left">
						<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'quickshop'); ?>" onclick="tinyMCEPopup.close();"/>
					</div>

					<div style="float: right">
						<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'quickshop'); ?>" onclick="insertQSLink();"/>
					</div>
				</div>
			</div>
			<!-- quickshop panel -->
		</div>
	</body>
</html>
