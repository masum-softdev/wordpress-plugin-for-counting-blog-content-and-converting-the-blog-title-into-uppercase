<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://hellomasum.com
 * @since             1.0.0
 * @package           Content_Counting
 *
 * @wordpress-plugin
 * Plugin Name:       Content Counting
 * Plugin URI:        https://hellomasum.com
 * Description:       This plugin will show the total words, and letters & finally it'll convert the post's title into uppercase.
 * Version:           1.0.0
 * Author:            Masum
 * Author URI:        https://hellomasum.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       content-counting
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
define( 'CONTENT_COUNTING_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-content-counting-activator.php
 */
function activate_content_counting() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-content-counting-activator.php';
	Content_Counting_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-content-counting-deactivator.php
 */
function deactivate_content_counting() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-content-counting-deactivator.php';
	Content_Counting_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_content_counting' );
register_deactivation_hook( __FILE__, 'deactivate_content_counting' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-content-counting.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_content_counting() {

	$plugin = new Content_Counting();
	$plugin->run();

}
run_content_counting();
