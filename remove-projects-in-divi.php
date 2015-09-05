<?php

/**
 * Divi :: Remove Projects
 *
 * Remove the Projects Post Type in Divi by Elegant Themes.
 *
 * @link              http://vint3.com
 * @since             1.0.0
 * @package           Divi
 *
 * @wordpress-plugin
 * Plugin Name:       Divi :: Remove Projects
 * Plugin URI:        https://github.com/vint3creative/remove-projects-in-divi
 * Description:       Remove the Projects Post Type in Divi by Elegant Themes.
 * Version:           1.0.0
 * Author:            Vint3
 * Author URI:        http://vint3.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       remove-projects-in-divi
 * Domain Path:       /languages
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Vint3\Divi\Remove_Projects;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
\add_action( 'plugins_loaded', function () {
    $plugin = new Remove_Projects\Plugin();
    $plugin->run();
} );

?>
