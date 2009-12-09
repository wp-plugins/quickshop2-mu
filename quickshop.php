<?php
/*
Plugin Name: QuickShop2 MU
Plugin URI: http://www.zackdesign.biz/wp-plugins/94
Description: Quick and easy shopping cart with widget!
Author: Isaac Rowntree & ElbertF modified for WPMU by RavanH
Version: 2.1.0
Author URI: http://zackdesign.biz

	Copyright (c) 2005, 2006 Isaac Rowntree (http://zackdesign.biz)
	QuickShop is released under the GNU General Public
	License (GPL) http://www.gnu.org/licenses/gpl.txt

	This is a WordPress plugin (http://wordpress.org).

*/

require_once('quickshop_class.php');

global $quickShop;

if ( class_exists('quickShop') ) $quickShop = new quickShop();

if ( isset($quickShop) )
{
	$quickShop->pluginPath = str_replace('\\', '/', ABSPATH) . PLUGINDIR . '/' . dirname(plugin_basename(__FILE__)) . '/';

	add_action('init',           array($quickShop, 'init'));
	add_action('plugins_loaded', array($quickShop, 'quickshop_widgets'));
	add_action('admin_menu',     array($quickShop, 'quickshop_options_page'));

	add_filter('the_content', array($quickShop, 'content_filter'));

// modified by RavanH for MU compatibility >>
	if ( dirname(dirname(plugin_basename(__FILE__))) == WPMU_PLUGIN_URL )
		$quickShop->pluginURL = WPMU_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . '/';
	else
		$quickShop->pluginURL = WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) . '/';
	add_filter('whitelist_options', array($quickShop, 'whitelist_options'));
//<<

	add_shortcode('quickshop', array($quickShop, 'shortcode'));

}
?>
