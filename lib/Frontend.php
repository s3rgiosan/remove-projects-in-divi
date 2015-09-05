<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://vint3.com
 * @since      1.0.0
 *
 * @package    Divi
 * @subpackage Remove_Projects/lib
 */

namespace Vint3\Divi\Remove_Projects;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Divi
 * @subpackage Remove_Projects/lib
 * @author     Vint3 <hello@vint3.com>
 */
class Frontend {

	/**
	 * The plugin's instance.
	 *
	 * @since     1.0.0
	 * @access    private
	 * @var       Plugin    $plugin    This plugin's instance.
	 */
	private $plugin;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    Plugin    $plugin    This plugin's instance.
	 */
	public function __construct( Plugin $plugin ) {
		$this->plugin = $plugin;
	}

	/**
	 * Remove the Projects post type in Divi themes and child themes.
	 *
	 * @since    1.0.0
	 */
	public function after_setup_theme() {

		if ( \wp_basename( \get_bloginfo( 'template_directory' ) ) === 'Divi' ) {
			\remove_action( 'init', 'et_pb_register_posttypes', 0 );
		}

	}

}
