<?php if ( !empty($_SESSION['qscart']) ): ?>
<table>
	<tbody>
		<tr>
			<th><?php echo $this->lang['quantity']     ?></th>
			<th><?php echo $this->lang['product name'] ?></th>
			<th><?php echo $this->lang['price']        ?></th>
			<th><?php echo $this->lang['shipping']     ?></th>
			<th><?php echo $this->lang['total']        ?></th>
		</tr>
		<?php foreach ( $_SESSION['qscart'] as $item ): ?>
		<tr>
			<td><?php echo $item['quantity'] ?></td>
			<td><a href="<?php echo $item['qslink'] ?>"><?php echo $item['name'] ?></a></td>
			<td><?php echo $this->output_currency($item['price'],    $currencySymbol, $decimalPoint, $thousandsSeperator) ?></td>
			<td><?php echo $this->output_currency($item['shipping'], $currencySymbol, $decimalPoint, $thousandsSeperator) ?></td>
			<td><?php echo $this->output_currency($item['quantity'] * ( $item['price'] + $item['shipping'] ), $currencySymbol, $decimalPoint, $thousandsSeperator) ?></td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="2"><br/></td>
			<td><?php echo $this->output_currency($totalPrice,    $currencySymbol, $decimalPoint, $thousandsSeperator) ?></td>
			<td><?php echo $this->output_currency($totalShipping, $currencySymbol, $decimalPoint, $thousandsSeperator) ?></td>
			<td><strong><?php echo $this->output_currency($totalPrice + $totalShipping, $currencySymbol, $decimalPoint, $thousandsSeperator) ?></strong></td>
		</tr>
	</tbody>
</table>

<!-- PayPal -->
<?php if ( get_option('quickshop_paypal_enabled') ): ?>
<h3>Paypal</h3>

<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
	<fieldset>
		<input type="hidden" name="business"      value="<?php echo get_option('quickshop_paypal_email') ?>"/>
		<input type="hidden" name="cmd"           value="_cart"/>
		<input type="hidden" name="upload"        value="1"/>
		<input type="hidden" name="item_name_1"   value="Shipping"/>
		<input type="hidden" name="amount_1"      value="<?php echo $totalShipping ?>"/>
		<input type="hidden" name="notify_url"    value="<?php echo get_option('quickshop_paypal_notify_url') ?>"/>
		<input type="hidden" name="return"        value="<?php echo $this->get_url() . ( strstr($this->get_url(), '?') ? '&' : '?' ) ?>qsreturn=true"/>
		<input type="hidden" name="currency_code" value="<?php echo get_option('quickshop_currency') ?>"/>

		<?php foreach ( $_SESSION['qscart'] as $i => $item ): ?>
		<input type="hidden" name="item_name_<?php echo $i + 2 ?>" value="<?php echo $item['name']     ?>"/>
		<input type="hidden" name="quantity_<?php  echo $i + 2 ?>" value="<?php echo $item['quantity'] ?>"/>
		<input type="hidden" name="amount_<?php    echo $i + 2 ?>" value="<?php echo $item['price']    ?>"/>
		<?php endforeach; ?>

		<input class="button" type="submit" value="Buy now"/>
	</fieldset>
</form>
<?php endif ?>
<!-- /PayPal -->

<!-- E-mail -->
<?php if ( get_option('quickshop_email_enabled') ): ?>
<h3>Debit</h3>

<form method="post" action="">
	<fieldset>
		<dl>
			<dt>Name:</dt>
			<dd>
				<input class="text" type="text" name="qs_name"/>
			</dd>
		</dl>
		<dl>
			<dt>E-mail address:</dt>
			<dd>
				<input class="text" type="text" name="qs_email"/>
			</dd>
		</dl>
		<dl>
			<dt>Phone number:</dt>
			<dd>
				<input class="text" type="text" name="qs_phone"/>
			</dd>
		</dl>
		<dl>
			<dt>Street:</dt>
			<dd>
				<input class="text" type="text" name="qs_street"/>
			</dd>
		</dl>
		<dl>
			<dt>Suburb:</dt>
			<dd>
				<input class="text" type="text" name="qs_suburb"/>
			</dd>
		</dl>
		<dl>
			<dt>Postcode:</dt>
			<dd>
				<input class="text" type="text" name="qs_postcode"/>
			</dd>
		</dl>
		<dl>
			<dt>State:</dt>
			<dd>
				<input class="text" type="text" name="qs_state"/>
			</dd>
		</dl>
		<dl>
			<dt>Country:</dt>
			<dd>
				<input class="text" type="text" name="qs_country"/>
			</dd>
		</dl>
	</fieldset>
	<fieldset>
		<dl>
			<dt><br/></dt>
			<dd>
				<input type="hidden" name="qs_action" value="checkout_email"/>
				
				<input class="button" type="submit" value="E-mail request"/>
			</dd>
		</dl>
	</fieldset>
</form>
<?php endif ?>
<!-- /E-mail -->

<!-- Authorize.Net -->
<!--
<?php
$loginID        = 'API_LOGIN_ID';
$transactionKey = 'TRANSACTION_KEY';
$amount         = '19.99';
$description    = 'Sample Transaction';
$testMode       = 'false';
$sequence       = rand(1, 1000);
$timeStamp      = time();

$invoice	   = date('YmdHis');
$fingerprint = hash_hmac('md5', $loginID . '^' . $sequence . '^' . $timeStamp . '^' . $amount . '^', $transactionKey);
?>

<form method="post" action="$url">
	<input type="hidden" name="x_login"        value="<?php echo $loginID ?>"/>
	<input type="hidden" name="x_amount"       value="<?php echo $amount ?>"/>
	<input type="hidden" name="x_description"  value="<?php echo $description ?>"/>
	<input type="hidden" name="x_invoice_num"  value="<?php echo $invoice ?>"/>
	<input type="hidden" name="x_fp_sequence"  value="<?php echo $sequence ?>"/>
	<input type="hidden" name="x_fp_timestamp" value="<?php echo $timeStamp ?>"/>
	<input type="hidden" name="x_fp_hash"      value="<?php echo $fingerprint ?>"/>
	<input type="hidden" name="x_test_request" value="<?php echo $testMode ?>"/>
	<input type="hidden" name="x_show_form"    value="PAYMENT_FORM"/>

	<input type="submit" value="Pay with Authorize.Net"/>
</form>
-->
<!-- /Authorize.Net -->

<?php else: ?>
<p><strong><?php echo $this->lang['cart empty'] ?></strong></p>
<?php endif ?>