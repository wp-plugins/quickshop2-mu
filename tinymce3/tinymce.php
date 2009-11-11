<?php

/**
 * @title TinyMCE V3 Button Integration (for Wp2.5)
 * @author Alex Rabe - modified by Isaac Rowntree
 */

function qs_addbuttons() {

	// Don't bother doing this stuff if the current user lacks permissions
	if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
	 
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
	 
	// add the button for wp25 in a new way
		add_filter("mce_external_plugins", "add_quickshop_tinymce_plugin", 5);
		add_filter('mce_buttons', 'register_quickshop_button', 5);
	}
}

// used to insert button in wordpress 2.5x editor
function register_quickshop_button($buttons) {

	array_push($buttons, "separator", "QuickShop");

	return $buttons;
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_quickshop_tinymce_plugin($plugin_array) {    

	$plugin_array['QuickShop'] = QS_URLPATH.'tinymce3/editor_plugin.js';
	return $plugin_array;
}

function quickshop_change_tinymce_version($version) {
	return ++$version;
}

// Modify the version when tinyMCE plugins are changed.
add_filter('tiny_mce_version', 'quickshop_change_tinymce_version');

// init process for button control
add_action('init', 'qs_addbuttons');

?>