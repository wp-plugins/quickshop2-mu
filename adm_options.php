<div id="icon-options-general" class="icon32"><br /></div>

<div class="wrap">
	<h2>QuickShop Options</h2>
	<form method="post" action="options.php">
<?php 
if(function_exists(settings_fields)) { 
	settings_fields('quickshop-options'); 
} else { 
	wp_nonce_field('update-options'); 
	echo '<input name="action" type="hidden" value="update" />'; 
	echo '<input name="page_options" type="hidden" value="quickshop_currency,quickshop_churl,quickshop_symbol,quickshop_decimal,quickshop_addcart,quickshop_total,quickshop_display,quickshop_location,quickshop_freeshipv,quickshop_title,quickshop_tc,quickshop_logged,quickshop_checkout_page,quickshop_paypal_email,quickshop_paypal_notify_url,quickshop_payment_return_url,quickshop_paypal_enabled,quickshop_email_enabled" />'; }
?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					Shopping cart title
				</th>
				<td>
					<input type="text" name="quickshop_title" value="<?php echo $title ?>"/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Currency
				</th>
				<td>
					<input type="text" name="quickshop_currency" value="<?php echo $currency ?>" size="5"/>
					e.g. USD, AUD
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Currency sybmol
				</th>
				<td>
					<input type="text" name="quickshop_symbol" value="<?php echo $currencySymbol ?>" size="5"/>
					e.g. $, &#163; - 
					
					<label>before <input type="radio" name="quickshop_location" value="before" <?php echo $symbolBefore ?>></label> or
					<label>after  <input type="radio" name="quickshop_location" value="after"  <?php echo $symbolAfter  ?>> the number?</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Decimal point
				</th>
				<td>
					<input type="text" name="quickshop_decimal" value="<?php echo $decimalPoint ?>" size="5"/>
					e.g. a period or comma
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Thousands seperator
				</th>
				<td>
					<input type="text" name="quickshop_seperator" value="<?php echo $thousandsSeperator ?>" size="5"/>
					e.g. a comma, period or space
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Display shopping cart when empty?
				</th>
				<td>
					<input type="checkbox" name="quickshop_display" value="1" <?php echo $displayEmpty ?>/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Display total only?
				</th>
				<td>
					<input type="checkbox" name="quickshop_total" value="1" <?php echo $totalOnly ?>/>
					e.g. when you don't use postage
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Free shipping threshold
				</th>
				<td>
					<input type="text" name="quickshop_freeshipv" value="<?php echo $feeShippingValue ?>" size="5"/>
					<?php echo $currencySymbol ?>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Checkout page
				</th>
				<td>
					<select name="quickshop_checkout_page">
						<option value="">Select a page..</option>
						<?php
						foreach ( get_pages() as $page )
							echo '
								<option value="' . $page->ID . '"' . ( $checkoutPageID == $page->ID ? ' selected="selected"' : '' ) . '>' . $page->post_title . '</option>
								';
						?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Terms and conditions URL
				</th>
				<td>
					<input type="text" name="quickshop_tc" value="<?php echo $termsURL ?>" size="70"/>
					Must begin with "http://"
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Buy button for logged-in users only?
				</th>
				<td>
					<input type="checkbox" name="quickshop_logged" value="1" <?php echo $loggedOnly ?>/>
				</td>
			</tr>
		</table>

		<h3>Checkout options</h3>

		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					Return URL after payment
				</th>
				<td>
					<input type="text" name="quickshop_payment_return_url" value="<?php echo $paymentReturnURL ?>"/>
				</td>
			</tr>
		</table>
		
		<h4>Payment request per e-mail</h4>

		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					Enabled
				</th>
				<td>
					<input type="checkbox" name="quickshop_email_enabled" <?php echo $emailEnabled ? ' checked="checked"' : '' ?>"/>
				</td>
			</tr>
		</table>

		<h4>PayPal</h4>

		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					Enabled
				</th>
				<td>
					<input type="checkbox" name="quickshop_paypal_enabled" <?php echo $payPalEnabled ? ' checked="checked"' : '' ?>"/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Paypal e-mail addres
				</th>
				<td>
					<input type="text" name="quickshop_paypal_email" value="<?php echo $payPalEmail ?>"/>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					Notification URL
				</th>
				<td>
					<input type="text" name="quickshop_paypal_notify_url" value="<?php echo $payPalNotifyURL ?>"/>
				</td>
			</tr>
		</table>

		<p class="submit">
			<input type="submit" name="Submit" value="Save" class="button-primary"/>
		</p>

		<h3>Do you like QuickShop?</h3>

		<h4>Websites</h4>

		<p>Zack Design has completed many websites, themes, and plugins. This one is free for you to use and has been perfected over countless hours. Please either <a href="http://zackdesign.biz/wp-plugins/34">donate</a> or <a href="http://zackdesign.biz/">consider using Zack Design for your next project!</a></p>

		<h4>VirtualBox, Synergy, more than 2 Desktop Monitors, Networks, Linux and more!</h4>

		<p>Zack Design knows all the tricks when it comes to setting up your office with multiple monitors, seamlessly integrating multiple PCs with different operating systems, virtual machines like VirtualBox for emulating Windows or Linux on your desktop, and can setup and configure wireless and wired networks as well as network servers easily. <a href="http://zackdesign.biz/contact">Contact us today to increase your productivity!</a></p>
	</form>
</div>
