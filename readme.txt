=== QuickShop2 MU ===
Contributors: zackdesign, ElbertF, RavanH
Donate link: http://www.zackdesign.biz/wp-plugins/94
Tags: cart, shop, widget, post, sidebar, contact, php, plugin, paypal, tinymce
Requires at least: 2.6
Tested up to: 2.8.5
Stable tag: 1.3.12

QuickShop is a Wordpress Shopping Cart with both Paypal and Email functionality built-in.

== Description ==

QuickShop supports any WordPress that has the Sidebar Widgets installed. It adds a SideBar widget that shows the user what they currently have in the cart and allows them to remove the items. There is a TinyMCE button to easily allow you to add products to your posts/pages.

This is a special version. For the regular QuickShop please go to the [QuickShop for WordPress plugin page](http://wordpress.org/extend/plugins/quick-shop/) and get the latest version (and support) there.

= WPMU version =

This version has been created to run on WPMU. However, it also works just fine on regular WP. 

*This version has not been created to compete with regular QuickShop in any way!* 
As soon as the changes are included in the regular QuickShop version, this one will stop being developed. Users will be referred to the regular version for upgrades from then on.

Please subscribe to http://www.zackdesign.biz/forum?forum=bug-reports&topic=cannot-change-settings-wpmu-26&xfeed=topic for updates.

= Future development =

The only thing missing in regular QuickShop is internationalisation. This will be adressed in the near future.

== Installation ==

1. Upload the 'quickshop' folder to the `plugins` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Edit your QuickShop settings in Settings -> QuickShop
4. Edit your Quickshop inventory in Tools - > QuickShop 
5. Add tags to your post text using the TinyMCE button

If the TinyMCE QuickShop button doesn't appear, simply type: [quickshop product="WHATEVER_YOUR_PRODUCT_NAME_IS"]

= WPMU =

Do *can* use this plugin in `mu-plugins` !

== Changelog ==

= 0.2 =

Based on [QuickShop](http://wordpress.org/extend/plugins/quick-shop/) version 2.0.1

* improved options saving routine
* improved sidebar cart form layout
* bugfix: wrong url for cart icons

== Frequently Asked Questions ==

= Why this special QuickShop version? =

When creating this MU-version, regular QuickShop v2.0.1 was not suitable for WordPress_MU. Options could not be saved. This has been fixed in this version alongside some other small improvements and code cleanup. As soon as this is incorporated in the regular version, this one will die.

Please subscribe to http://www.zackdesign.biz/forum?forum=bug-reports&topic=cannot-change-settings-wpmu-26&xfeed=topic for updates.

= How does this version differ from the regular QuickShop plugin? =

The method for saving options is now compliant with the latest WP security standards. Some other small improvements and code cleanup has been done on the widget cart form. Please note: There is no updater script for migration from QuickShop pre-2.0 included in this version!

= Where is this branch of QuickShop heading? =

After this, you can expect implementation of internationalization. That should be it. Nothing more except following any improvements that are done on QuickShop trunk, as long as they do not break WPMU compatibility. As soon as WPMU compatibility (and internationaliziation) are reached in QuickShop trunk version, this branch will merge back.

Please subscribe to http://www.zackdesign.biz/forum?forum=bug-reports&topic=cannot-change-settings-wpmu-26&xfeed=topic for updates.

= I am currently using an older version of the regular QuickShop. Should I start using this one? =

No, if the older version works on your WP installation, please upgrade to at least version 2.0 of the regular QuickShop. After you have done that, you _could_ start using this one instead but there is not much point in that. Unless you value the security of your website so much that you are willing to make that effort. Keep in mind that you might have to go back to the regular version one day...

Please subscribe to http://www.zackdesign.biz/forum?forum=bug-reports&topic=cannot-change-settings-wpmu-26&xfeed=topic for updates.
