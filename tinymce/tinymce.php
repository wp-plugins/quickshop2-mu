<?php

/**
 * @title TinyMCE Button Integration
 * @author Alex Rabe - modified by Isaac Rowntree
 */

// Load the Script for the Button
function insert_quickshop_script() {	
 
 	//TODO: Do with WP2.1 Script Loader
 	// Thanks for this idea to www.jovelstefan.de
	echo "\n"."
	<script type='text/javascript'> 
		function qs_buttonscript()	{ 
		if(window.tinyMCE) {

			var template = new Array();
	
			template['file'] = '".QS_URLPATH."tinymce/window.php';
			template['width'] = 360;
			template['height'] = 210;
	
			args = {
				resizable : 'no',
				scrollbars : 'no',
				inline : 'yes'
			};
	
			tinyMCE.openWindow(template, args);
			return true;
		} 
	} 
	</script>"; 
	return;
}

function qs_addbuttons() {
 
	global $wp_db_version;

	// Don't bother doing this stuff if the current user lacks permissions
	if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
		 
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
	 
	// add the button for wp21 in a new way
		add_filter("mce_plugins", "quickshop_button_plugin", 5);
		add_filter('mce_buttons', 'quickshop_button', 5);
		add_action('tinymce_before_init','quickshop_button_script');
		}
}

// used to insert button in wordpress 2.1x editor
function quickshop_button($buttons) {

	array_push($buttons, "seperator", "QuickShop");
	return $buttons;

}

// Tell TinyMCE that there is a plugin (wp2.1)
function quickshop_button_plugin($plugins) {    

	array_push($plugins, "-QuickShop");    
	return $plugins;
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.1)
function quickshop_button_script() {	
 
	echo 'tinyMCE.loadPlugin("QuickShop", "'.QS_URLPATH.'tinymce/");' . "\n"; 
	return;
}

// init process for button control
add_action('init', 'qs_addbuttons');
add_action('edit_page_form', 'insert_quickshop_script');
add_action('edit_form_advanced', 'insert_quickshop_script');

?>