<?php

/**
 * Remove Projects in Divi
 *
 * This plugin removes the Project Post Type in Divi.
 *
 * @link              http://vint3.com
 * @since             1.0.0
 * @package           Divi
 *
 * @wordpress-plugin
 * Plugin Name:       Remove Projects in Divi
 * Plugin URI:        https://github.com/vint3creative/remove-projects-in-divi
 * Description:       Remove the Project Post Type in Divi by Elegant Themes.
 * Version:           1.2.3
 * Author:            Vint3
 * Author URI:        http://vint3.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       remove-projects-in-divi
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/vint3creative/remove-projects-in-divi
 * GitHub Branch:     master
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Vint3\Divi\RemoveProjects;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
\add_action( 'plugins_loaded', function() {
    $plugin = new RemoveProjects\Plugin();
    $plugin->run();
} );

/**
 * Remove Project post type for Divi 2.5.
 *
 * @since    1.2.0
 */
\add_action( 'plugins_loaded', function() {

	$theme         = \wp_get_theme( \get_template() );
	$theme_name    = $theme->display( 'Name' );
	$theme_version = $theme->display( 'Version' );

	if ( $theme_name !== 'Divi' ) {
		return;
	}

	if ( substr( $theme_version, 0, 3 ) === '2.5' && ! function_exists( 'et_pb_register_posttypes' ) ) {
		function et_pb_register_posttypes() {
			return;
		}
	}

} );
