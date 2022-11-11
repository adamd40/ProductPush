<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://dropwire.digital
 * @since             1.0.0
 * @package           Dwpush
 *
 * @wordpress-plugin
 * Plugin Name:       Product Push
 * Plugin URI:        https://github.com/adamd40/ProductPush
 * Description:       Push WooCommerce products out to other stores from the home store. Continue to update and maintain product info and prices from the home store! Useful for setting up landing pages and funnels, or running sub brands
 * Version:           1.0.0
 * Author:            Adam Burns
 * Author URI:        https://dropwire.digital
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dwpush
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DWPUSH_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dwpush-activator.php
 */
function activate_dwpush() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dwpush-activator.php';
	Dwpush_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dwpush-deactivator.php
 */
function deactivate_dwpush() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dwpush-deactivator.php';
	Dwpush_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dwpush' );
register_deactivation_hook( __FILE__, 'deactivate_dwpush' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dwpush.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dwpush() {

	$plugin = new Dwpush();
	$plugin->run();

}
run_dwpush();
