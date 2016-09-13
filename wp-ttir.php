<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/knorpot/plugins
 * @since             1.0.0
 * @package           Wp_Ttir
 *
 * @wordpress-plugin
 * Plugin Name:       text to image ratio
 * Plugin URI:        https://github.com/knorpot/plugins
 * Description:       Shows the text to image ratio before contents of every post.
 * Version:           1.0.0
 * Author:            Neels Groenewald
 * Author URI:        http://cardocket.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-ttir
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-ttir-activator.php
 */
function activate_wp_ttir() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-ttir-activator.php';
	Wp_Ttir_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-ttir-deactivator.php
 */
function deactivate_wp_ttir() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-ttir-deactivator.php';
	Wp_Ttir_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_ttir' );
register_deactivation_hook( __FILE__, 'deactivate_wp_ttir' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-ttir.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_ttir() {

	$plugin = new Wp_Ttir();
	$plugin->run();

}
run_wp_ttir();
