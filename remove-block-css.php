<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://southernweb.com
 * @since             1.0.0
 * @package           Remove_Block_Css
 *
 * @wordpress-plugin
 * Plugin Name:       Remove WP Block CSS
 * Plugin URI:        https://github.com/ryandonsullivan/remove-block-css
 * Description:       This plugin removes the wp-block-library CSS from the front end of WordPress.
 * Version:           1.0.0
 * Author:            Ryan Sullivan
 * Author URI:        https://southernweb.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       remove-block-css
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-remove-block-css-activator.php
 */
function activate_remove_block_css() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-remove-block-css-activator.php';
	Remove_Block_Css_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-remove-block-css-deactivator.php
 */
function deactivate_remove_block_css() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-remove-block-css-deactivator.php';
	Remove_Block_Css_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_remove_block_css' );
register_deactivation_hook( __FILE__, 'deactivate_remove_block_css' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-remove-block-css.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_remove_block_css() {

	$plugin = new Remove_Block_Css();
	$plugin->run();

}
run_remove_block_css();

/*
 * Remove the `wp-block-library.css` file from `wp_head()`
 *
 * @author Rahul Arora
 * @since  12182018
 * @uses   wp_dequeue_style
 */
add_action( 'wp_enqueue_scripts', function() {
  wp_dequeue_style( 'wp-block-library' );
} );
