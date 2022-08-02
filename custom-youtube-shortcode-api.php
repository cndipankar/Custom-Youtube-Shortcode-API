<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              domain.com
 * @since             1.0.0
 * @package           Custom_Youtube_Shortcode_Api
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Youtube Shortcode API
 * Plugin URI:        domain.com
 * Description:       Just put the shortcode anywhere, the youtube video is ready with custom play/pause/thumbnail option.
 * Version:           1.0.0
 * Author:            Dipankar Pal
 * Author URI:        domain.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-youtube-shortcode-api
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
define( 'CUSTOM_YOUTUBE_SHORTCODE_API_VERSION', '1.0.0' );
define( 'CYS_URL', plugin_dir_url( __FILE__ ) );
define( 'CYS_YT_SHORTCODE', 'cs_youtube' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-youtube-shortcode-api-activator.php
 */
function activate_custom_youtube_shortcode_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-youtube-shortcode-api-activator.php';
	Custom_Youtube_Shortcode_Api_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-youtube-shortcode-api-deactivator.php
 */
function deactivate_custom_youtube_shortcode_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-youtube-shortcode-api-deactivator.php';
	Custom_Youtube_Shortcode_Api_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_youtube_shortcode_api' );
register_deactivation_hook( __FILE__, 'deactivate_custom_youtube_shortcode_api' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-youtube-shortcode-api.php';
require plugin_dir_path( __FILE__ ) . 'admin/class-custom-youtube-shortcode-functions.php';
require plugin_dir_path( __FILE__ ) . 'functions.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_youtube_shortcode_api() {

	$plugin = new Custom_Youtube_Shortcode_Api();
	$plugin->run();

}
run_custom_youtube_shortcode_api();
