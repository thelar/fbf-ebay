<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://4x4tyres.co.uk
 * @since      1.0.0
 *
 * @package    Fbf_Ebay
 * @subpackage Fbf_Ebay/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Fbf_Ebay
 * @subpackage Fbf_Ebay/includes
 * @author     Kevin Price-Ward <kevin.price-ward@4x4tyres.co.uk>
 */
class Fbf_Ebay_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'fbf-ebay',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
