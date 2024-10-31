<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.hayatikodla.com
 * @since      1.0.0
 *
 * @package    Seldos_Mail
 * @subpackage Seldos_Mail/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Seldos_Mail
 * @subpackage Seldos_Mail/includes
 * @author     Hasan Yüksektepe <hasanhasokeyk@hotmail.com>
 */
class Seldos_Mail_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'seldos-mail',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
