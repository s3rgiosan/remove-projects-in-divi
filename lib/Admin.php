<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       http://vint3.com
 * @since      1.0.0
 *
 * @package    Divi
 * @subpackage Remove_Projects/lib
 */

namespace Vint3\Divi\Remove_Projects;

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Divi
 * @subpackage Remove_Projects/lib
 * @author     Vint3 <hello@vint3.com>
 */
class Admin {

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
	 * Remove Project post type.
	 *
	 * @since    1.0.0
	 */
	public function remove_post_type() {

		if ( \wp_basename( \get_bloginfo( 'template_directory' ) ) === 'Divi' ) {
			\remove_action( 'init', 'et_pb_register_posttypes', 0 );
		}

	}

}
