<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       domain.com
 * @since      1.0.0
 *
 * @package    Custom_Youtube_Shortcode_Api
 * @subpackage Custom_Youtube_Shortcode_Api/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Custom_Youtube_Shortcode_Api
 * @subpackage Custom_Youtube_Shortcode_Api/includes
 * @author     Dipankar Pal <dipankarpal212@gmail.com>
 */
class Custom_Youtube_Shortcode_Api_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'custom-youtube-shortcode-api',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
