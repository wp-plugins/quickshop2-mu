=== Quick Shop ===
Contributors: zackdesign, RavanH
Donate link: http://www.zackdesign.biz/wp-plugins/34
Tags: cart, shop, widget, post, sidebar, contact, php, plugin, paypal, tinymce
Requires at least: 2.3
Tested up to: 2.5
Stable tag: 1.3.12

QuickShop has two shopping-cart widgets, automatically adds buttons to your posts, and includes a TinyMCE editor button.

== Description ==

QuickShop supports any Wordpress that has the Sidebar Widgets installed, really. It adds a SideBar widget that shows the user what 
they currently have in the cart and allows them to remove the items, not to mention a TinyMCE button to easily allow you to add products to your posts/pages.

I've integrated QuickShop with the [Wordpress Contact Form](http://green-beast.com/blog/?page_id=136 "WP-GBCF") but there 
are several other possible ways of doing it. Want me to do it for you? Contact me
at [Zack Design](http://www.zackdesign.biz "Zack Design"). I have also integrated it with the Dagon Design Form Mailer
but this one's a bit more difficult. The code isn't saved but I can come up with it easily again.

Also, you will need to make your own CSS for this. I've included enough classes/ids for you.

Features:

 * A TinyMCE button. This is practically a copy and changeover from the NextGen Gallery - I would like to thank the developers of NextGen Gallery for an excellent solution.
 * Full range of formatting for widget layout in Admin -> Options -> Quickshop
 * Two widgets - one is Paypal, the other is set for your custom solution
 * Now has both Paypal Subscription and Donation tags!
 * Ability to create different product options in a drop-down 
 * You may use the DLGuard notification and return URLs along with the new item number and the Paypal widget for DLGuard/Quickshop integration 

One of my clients required a quick and dirty shopping cart for Wordpress. The background:

 1. They had more than one product per post
 2. They only wanted orders to be sent via email
 3. They only needed EFT (Electronic Fund Transfer - like Direct Debit or Internet Banking)
 
Thus, QuickShop was born thanks to the excellent way in which the Wordpress Plugin API is set up.

List of possible future features:

 * AJAX implementation - currently being worked on. Was slated for 1.3 but will be pushed back further
 * Moneybookers widget
 * Inventory - this one is really hard at the moment.
 * Better integration with the new WP-GBCF currently being developed - more to come.
 
Please be aware that I'll only be updating this if I need to or if I'm paid to. Feel free to come on board and contribute!

== Installation ==

1. Upload the 'quick-shop' folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add tags to your post text: 
   You may now use the TinyMCE button!!!

OR

   In any post where you have a product add this tag: 
   
   `[quickshop:NAME_OF_YOUR_PRODUCT:price:YOUR_PRODUCT_PRICE:shipping:YOUR_SHIPPING_PRICE:shipping2:SHIPPING_PRICE_FOR_MULTIPLE_PRODUCTS_AFTER_FIRST:item_num:ITEM_NUMBER:end]`
   
   This will create the form button 'Add to Cart' as well as pricing. Shipping is optional, you can end it like so: `[quickshop:Test:price:30:end]`,
   or even `[quickshop:Test:price:30:shipping:2:end]`.
   
   You may also create a drop-down using this format: quickshop:NAME_OF_YOUR_PRODUCT_TYPE_1|NAME_OF_YOUR_PRODUCT_TYPE_2:price
  
    The | character seperates each product type.
    
    You can also optionally create a price for each of the items in the drop-down instead of having a single price for all of them:
    
    :price:PRICE_1|PRICE_2:shipping:
   
NEW - Paypal subscribe and donate buttons!

`[quickdonate:YOUR_EMAIL:d_name:DONATION_PURPOSE:d_id:OPTIONAL_ID:d_amount:DEFAULT_DONATION_AMOUNT:d_currency:PAYMENT_CURRENCY:d_locale:YOUR_COUNTRY:d_end]`

The time type in subscribe is for day, week, month, or year.

`[quicksubscribe:YOUR_EMAIL:s_name:SUBSCRIPTION:s_id:OPTIONAL_ID:s_amount:PRICE:s_currency:PAYMENT_CURRENCY:s_locale:YOUR_COUNTRY:sc_value:TIME_PERIOD:sc_time:TIME_TYPE(D,W,M,Y):s_end]`
    
4. Add either cart widget to your sidebar.

5. Did you use the Paypal widget? Then you're done! Otherwise, see below for WP-GBCF and CFormsII implementation:

*WP-GBCF*

If you want shipping calculated as well in this form I'll add it here as soon as I can...

You must remember with the following code to remove all backticks: `

Also WP-GBCF has been updated (v. 2008.02.07). I've give updated line numbers and new code below. If you want old code see a pre 1.3.4 QuickShop README.

Add this after Line 1220 of WP-GBCF V2.0 (wp-gbcf_form.php):

--------------------------------------------

     `unset($_SESSION['qscart']);  // This line clears the cart after the email is sent.`

--------------------------------------------     

Starting from Line 1286 - 1289 of WP-GBCF V. 2.0 (wp-gbcf_form.php): 

--------------------------------------------


    `$forms.=('         </select>
        '.$x_or_h_br.'
<!-- Required Form Comments Area -->
        <label for="message">Message</label>'.$x_or_h_br.'<textarea tabindex="'.$tab_message.'" class="textbox" rows="12" cols="60" name="message" id="message">');
        // Add quickshop integration by adding the cart info into the text area.

if ($_SESSION['qscart'] && is_array($_SESSION['qscart']))
{
    $forms .= ('I would like to order the following items: 
');
    foreach ($_SESSION['qscart'] as $item)
    {
        $forms .= ("".$item['name']." - Price: $".$item['price']."  -  Quantity: ".$item['quantity']."
");
    
    }

}   
    $forms.=('</textarea>'.$x_or_h_br.'`
        

--------------------------------------------

*CFormsII* - Thanks to aproxis for providing this solution

--------------------------------------------

Create new form using cForms.
For example - it will be the form #2.

Go to the "Core Form Admin / Email Options"
Check "Use custom input field NAMES & ID's"

We are taking an example from help topics of cForms.

Create new .php file (orderform.php)

Paste into it (remember to remove any backticks: `):

`<?php
/* here is an example from cForms help topics. i've edited it a little bit */

$fields = array();
$formdata = array(      
                array('Your name[id:yourName]|Name','textfield',0,1,0,1,0), /* is
required, auto clears on focus */
                array('Your Email[id:yourEmail]|Email','textfield',0,1,1,1,0), /* is
required, is email, auto clears on focus */
                array('Your Order[id:yourorder]','textarea',0,1,0,0,1) /* is
required, and is not editable */
                );
$i=0;
foreach ( $formdata as $field ) {
        $fields['label'][$i]        = $field[0];
        $fields['type'][$i]         = $field[1];
        $fields['isdisabled'][$i]   = $field[2];
        $fields['isreq'][$i]        = $field[3];
        $fields['isemail'][$i]      = $field[4];                                                
        $fields['isclear'][$i]      = $field[5];                                                
        $fields['isreadonly'][$i++] = $field[6];                
}

/* inserting QuickShop-related strings */

        if ($_SESSION['qscart'] && is_array($_SESSION['qscart']))
        {
        foreach ($_SESSION['qscart'] as $item)
        {
           $forms .= ("".$item['name']." - ".$item['quantity']." pcs.,
".$item['price']." each.
");
        }

        }
/* inserting is done. now - inserting the form */

insert_custom_cform($fields,'2'); /* 2 - is number of your form */

/* fixing some troubles with newlines */

$fnd = array("\n","\r");
$rep = array('\n','\r');
$result = str_replace($fnd, $rep, addslashes($forms));

/* and now - mix it all together using javascript*/
?>

<script>
    document.getElementById("yourorder").value = "<?php echo $result ?>";
</script>`

----- Save and close the orderform.php -----

Now, create in wordpress administration a new page (for your order form).
And another new page for redirect after submitting order form.

After that - edit your page.php file from your theme folder.
You should insert two conditional IF's (before or inside the Loop).
Here is an example:

`<?php get_header(); ?>

<?php if (is_page('3')) : /* page #3 - it is page for redirect after
submitting form */ ?>
    <?php unset($_SESSION['qscart']); ?>
<?php endif; ?>

<?php if (is_page('2')) : /* it is page with the form. you should
point your QuckShop plugin to this page in settings */ ?>
    <?php include (TEMPLATEPATH . '/orderform.php'); /* upload
orderform.php in your theme folder */?>

<?php elseif (have_posts()) : while (have_posts()) : the_post(); ?>`

------- Save and close the page.php --------

And one more thing.
In settings of your form in "Redirection, Messages, Text and Button Label"
Look for "Redirect options:"
Then select "Enable alternative success page (redirect)"
And enter the URL of "page for redirect" (with ID #3)

*How to do Optional Totals for the custom forms*

`
    $total = 0;
    $count = 1;
    
    
    foreach ($_SESSION['qscart'] as $item)
    {
        // Following is the code that you would run after the normal 'add info to form textbox code'
        
        $total += $item['price'] * $item['quantity'];
        $count += $item['quantity'];
        
        if ($item['shipping2'])
            $postage += (($item['quantity'] - 1) * $item['shipping2']) + $item['shipping'];
        else
            $postage += $item['quantity'] * $item['shipping'];
    }
    
    // Following is the totals code that you want to appear in the text box. 
    // I'll leave it for you to replace 'echo' with the WP-GBCF or CFormsII implementation
    if ($count)
    {       
       if (!get_option('quickshop_total')) 
       {
            
            if ($freeshipv && ($freeshipv < $total))
                $postage = 0;
            
            echo "Subtotal: ".output_currency($total, $symbol, $decimal)."
                 Postage: ".output_currency($postage, $symbol, $decimal);
       }
       echo "Total: ".output_currency($total + $postage, $symbol, $decimal);
    }   
`

--------------------------------------------

== Latest Changes ==

1.3.12

- Addition of Paypal notification and return URLs. Also item number. 

1.3.11

- Minor bugfixes/updates to the code so that it works better when creating the 'add to cart' button
- Update to drop-downs so that you can now set multiple prices for each option

1.3.10

- Mature implementation of multiple tags with drop-downs in one post. There w0z bugz!
- Finally fixed the irksome free shipping bug in the paypal widget. Sorry about the wait Dietmar!
- If you're reading the changelog this far, please consider donating!

1.3.9

- Free shipping finally fixed properly. I don't know how/why but the previous implementation was wrong
- Added ability to do drop-downs with products (e.g. different options)

1.3.8

- Fixed Paypal shipping implementation - because Paypal wasn't doing the calculation!! (yet does it for second shipping prices, weird)
- Also fixed Paypal free shipping

1.3.7

- Added ability to use Terms and Conditions to both widgets
- Added ability to hide 'buy now' button if not logged in
- Changed CFormsII integration slightly (yourorder) due to user fix found (Thanks Zach!!)

1.3.6

- Fixed a small glitch with checkout page url - thanks Lionel!!
- CFormsII integration included - thanks aproxis!!!
- Paypal subscription added
- Paypal donations added
- Shopping cart links now send absolute URL of current page - this should now work in all situations

1.3.5

- Fixed numerous bugs in admin section as well as adding the ability to change the widget title
- Added javascript key checking and form submission to QTY changing field to make it less likely to fail - should work everywhere now!

1.3.4

- Added 'Free shipping at X amount' Admin setting
- Cleaned up admin for 2.5
- Fixed admin form bug
- Updated instructions for the new WP-GBCF form update

1.3.3 

- Added 'Add to Cart' button text change in Admin

1.3.2

- Addition to Admin of setting where custom cart points

1.3.1

- Fixes for certain server configurations. All of you who report strange cart updates should now be right!

1.3

- Support for TinyMCE in 2.5

1.2.4.7

- Line 522 bug fixed - now properly checks the session. I can't believe this has taken so long to get right!!

1.2.4.6

- Added Display shopping cart when empty? checkbox - this functionality has also been fixed for PHP5
- Added Display total only? checkbox
- Added before or after currency symbol? radioboxes

1.2.4.4

- Renamed session from cart to 'qscart' in an attempt to stop other applications conflicting...

1.2.4.3

- Disappeared the widget when empty

1.2.4.2

- Added option for Paypal email
- Fixed slight bug in admin form submit which made it impossible to have nothing submitted in currency (defaults to USD)

1.2.4.1

- Added more options for currency (e.g. formatting for money)

1.2.4

- Admin page for setting currency (works with Paypal widget)
- Removed style for colouring the widget - you should do these yourselves as it looks bad in some themes

1.2.3.1

- Fixed Problem with linking back to product
- Ensured that QuickShop Is Valid XHTML 1.0 Transitional

1.2.3

- Updated layout of widgets, added ability to link back to product item from the shopping cart
- Works out postage for you now

1.2.2

- Fixed changing product quantity on shopping cart widget
- Fixed Paypal form bug

1.2.1

- New TinyMCE Button

1.2

- Better Paypal integration. Now uses a new shopping cart widget instead!
- Quantity setting in sidebar widget
- Removal of extra Paypal tags to consolidate to just one tag.
- Added shipping by default

1.1

- Added product price
- Added tag for Paypal baskets

== Frequently Asked Questions ==

= How do I change the currency in Quick Shop? =

You may now do it in the QuickShop admin options page. You can put in any currency you wish to set as the default currency.

= I Need HELP!!! =

That's what I'm here for. I do Wordpress sites for many people in a professional capacity and
can do the same for you. Check out www.zackdesign.biz

= Why didn't I include the changed WP-GBCF as well? =

Because they may upgrade it in future. Nothing worse than out-of-date code.

= Where do I get WP-GBCF? =

Weren't you paying attention? Read the Description again!!!

