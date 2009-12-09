<div id="icon-options-general" class="icon32"><br /></div>

<div class="wrap">
	<h2>QuickShop Products</h2>

	<form method="post" action="options.php">
<?php 
// modified by RavanH for MU compatibility >>
if(function_exists(settings_fields)) { 
	settings_fields('quickshop-products'); 
} else { 
	wp_nonce_field('update-options'); 
	echo '<input name="action" type="hidden" value="update" />'; 
	echo '<input name="page_options" type="hidden" value="quickshop_products,quickshop_shipping,quickshop_shipping_start" />'; }
// <<
?>

		<div style="float: left; width: 50%;">
			<h3>Products</h3>

			<p>Add each product on a new line.</p>

			<p>
				<code>product name | price [ | [ shipping ] [ | property : 1, 2 [ , ... ] ] ]</code>
			</p>

			<p><strong>Examples:</strong></p>

			<p>
				Default shipping price, no properties:<br />
			</p>

			<p>
				<code>Cap | 25.00</code>
			</p>

			<p>
				Default shipping price:<br />
			</p>

			<p>
				<code>Bag | 120.00 | | Color : Red, Blue, Purple</code>
			</p>

			<p>
				Override default shipping price:<br />
			</p>

			<p>
				<code>T-shirt | 10.00 | 5.00 | Size : S, M, L, XL, XXL</code>
			</p>
		</div>

		<div style="float: right;">
			<h3>Shipping</h3>

			<table class="form-table">
				<tr valign="top">
					<th scope="row">Starting price</th>
					<td>
						<input type="text" name="quickshop_shipping_start" value="<?php echo $shippingStart ?>" size="5"/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Default shipping price</th>
					<td>
						<input type="text" name="quickshop_shipping" value="<?php echo $shipping ?>" size="5"/>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" name="Submit" value="Save all" class="button-primary"/>
			</p>
		</div>

		<table class="form-table">
			<tr>
				<td>
					<textarea name="quickshop_products" style="width: 100%;" rows="15"><?php echo $products ?></textarea>
				</td>
			</tr>
		</table>
	</form>
</div>
