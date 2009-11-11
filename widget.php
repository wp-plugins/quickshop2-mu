<?php		
// modified by RavanH >>
// widget shopping cart form code cleanup + refresh icon
// <<


if ( $this->cart_has_items() )
{
	$currency           = get_option('quickshop_currency')       or $currency            = 'USD';
	$currencySymbol     = get_option('quickshop_symbol')         or $currencySymbol      = '$';
	$DecimalPoint       = get_option('quickshop_decimal')        or $defaultDecimalPoint = '.';
	$thousandsSeperator = get_option('quickshop_thousands')      or $thousandsSeperator  = ',';
	$freeShippingValue  = get_option('quickshop_freeshipv')      or $freeShippingValue   = 0;
	$title              = get_option('quickshop_title')          or $title               = 'Your Shopping Cart';
	$shippingStart      = get_option('quickshop_shipping_start') or $shippingStart       = 0;
	$checkoutPageID     = get_option('quickshop_checkout_page');

	echo
		$before_widget . '
		<div class="quickshopcart" style="padding: 5px;">
		' . $before_title . $title . $after_title
		;

	echo '

		<table style="width: 100%;">
		';

	$count   = 1;
	$total   = 0;
	$postage = $shippingStart;

	if ( !empty($_SESSION['qscart']) && is_array($_SESSION['qscart']) )
	{
		echo '
			<tr>
				<th>' . $this->lang['product name'] . '</th>
				<th>' . $this->lang['quantity']     . '</th>
				<th style="text-align: center;">' . $this->lang['price']        . '</th>
			</tr>
			';

		foreach ( $_SESSION['qscart'] as $item )
		{
			echo '
				<tr>
					<td style="overflow: hidden;">
						<a href="' . $item['qslink'] . '">' . $item['name'] . '</a>
					</td>
					<td>
						<form method="post" name="cquantity" action="#quickshop" style="display:inline;border:none">
							<input type="hidden" name="product" value="' . $item['name'] . '"/>
							<input type="text" name="quantity" value="' . $item['quantity'] . '" size="2"/>
							<input type="submit" name="cquantity" style="text-indent:-999px;width:16px;height:16px;border:none;background-image:url(' . $this->pluginURL . 'images/cart_refresh.png)" value="Update" title="Update"/>
							<input type="submit" name="delcart" style="text-indent:-999px;width:16px;height:16px;border:none;background-image:url(' . $this->pluginURL . 'images/cart_remove.png)" value="Remove" title="Remove"/>
						</form>
					</td>
					<td style="text-align: right;">
						' . $this->output_currency($item['price'] * $item['quantity'], $currencySymbol, $decimalPoint, $thousandsSeperator) . '
					</td>
				</tr>
				';

			$total   += $item['price'] * $item['quantity'];
			$count   += $item['quantity'];
			$postage += $item['quantity'] * $item['shipping'];
		}
	}

	if ( -- $count )
	{
		echo '
			<tr>
				<td><br/></td>
				<td><br/></td>
				<td><br/></td>
			</tr>
			';

		if ( !get_option('quickshop_total') )
		{
			if ( $freeShippingValue && $freeShippingValue <= $total ) $postage = 0;

			echo '
				<tr>
					<td colspan="2" style="font-weight: bold; text-align: right;">
						' . $this->lang['subtotal'] . ':
					</td>
					<td style="text-align: right;">
						' . $this->output_currency($total, $currencySymbol, $decimalPoint, $thousandsSeperator) . '
					</td>
				</tr>
				<tr>
					<td colspan="2" style="font-weight: bold; text-align: right;">
						' . $this->lang['shipping'] . ':
					</td>
					<td style="text-align: right">
						' . $this->output_currency($postage, $currencySymbol, $decimalPoint, $thousandsSeperator) . '
					</td>
				</tr>
				';
		}

		echo '
			<tr>
				<td colspan="2" style="font-weight: bold; text-align: right;">
					' . $this->lang['total'] . ':
				</td>
				<td style="text-align: right;">
					' . $this->output_currency($total + $postage, $currencySymbol, $decimalPoint, $thousandsSeperator) . '
				</td>
			</tr>
		</table>
			';

		$terms = get_option('quickshop_tc');

		if ( !$_SESSION['qstc'] && $terms )
		{
			echo '
		<form method="post" action="">
			<p><a href="' . $terms . '" target="_blank">' . $this->lang['terms agree'] . '</a></p>

			<input type="hidden" value="true" name="qstc"/>
			<input type="submit" value="' . $this->lang['yes'] . '"/>
		</form>
				';
		}
		else 
			echo '
		<p style="font-weight: bold;text-align: right">
			<a href="' . get_permalink($checkoutPageID) . '">
				' . $this->lang['to checkout'] . '
				&nbsp;
				<img src="' . get_bloginfo('wpurl') . '/wp-content/plugins/quick-shop/images/cart_go.png" style="border: 0px;" title="Checkout" alt="Checkout"/>
				&nbsp;
			</a>
		</p>
				';
	}

	echo '
		</div>
		
		' . $after_widget
		;
}
else
{
	if ( get_option('quickshop_display') )
	{
		$title = get_option('quickshop_title') or 'Your Shopping Cart';

		echo
			$before_widget . '
			<div class="quickshopcart" style="padding: 5px;">
				' . $before_title . $title . $after_title . '
				
				<p>' . $this->lang['cart empty'] . '</p>
			</div>
			' . $after_widget
			;
	}
}
