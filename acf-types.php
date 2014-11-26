<?php

/**
 * ACF_Types plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://apper.com.au
 * @since             1.0.0
 * @package           ACF_Types
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced Custom Fields Types
 * Plugin URI:        http://apper.com.au/wordpress-plugin/
 * Description:       Dead simple Post Type Management for use with Advanced Custom Fields.
 * Version:           1.0.0
 * Author:            ACF_Types
 * Author URI:        http://apper.com.au/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acf-types
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf-types.php';

function run_ACF_Types() {

	$plugin = new ACF_Types();
	$plugin->run();

}
run_ACF_Types();
