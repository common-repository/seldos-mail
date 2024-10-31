<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.hayatikodla.com
 * @since             1.0.0
 * @package           Seldos_Mail
 *
 * @wordpress-plugin
 * Plugin Name:       Seldos Mail
 * Plugin URI:        www.seldos.com.tr
 * Description:       Auto Mailing Tools
 * Version:           1.0.1
 * Author:            Hasan Yüksektepe
 * Author URI:        www.hayatikodla.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       seldos-mail
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
define( 'SELDOD_MAIL_PLUGIN_NAME_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-seldos-mail-activator.php
 */
function activate_seldos_mail() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-seldos-mail-activator.php';
	Seldos_Mail_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-seldos-mail-deactivator.php
 */
function deactivate_seldos_mail() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-seldos-mail-deactivator.php';
	Seldos_Mail_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_seldos_mail' );
register_deactivation_hook( __FILE__, 'deactivate_seldos_mail' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-seldos-mail.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_seldos_mail() {

	$plugin = new Seldos_Mail();
	$plugin->run();

}
run_seldos_mail();
