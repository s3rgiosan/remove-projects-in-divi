<?php

namespace Vint3\WP\Plugin\Divi\RemoveProjects;

/**
 * The dashboard-specific functionality of the plugin
 *
 * @package Divi
 * @since   1.0.0
 */
class Admin {

	/**
	 * The plugin's instance.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    Plugin
	 */
	private $plugin;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param Plugin $plugin This plugin's instance.
	 */
	public function __construct( Plugin $plugin ) {
		$this->plugin = $plugin;
	}

	/**
	 * Remove Project post type.
	 *
	 * @since 1.3.0 Support Divi 2.6, 2.7
	 * @since 1.0.0
	 */
	public function remove_post_type() {
		global $wp_post_types;

		$theme      = \wp_get_theme( \get_template() );
		$theme_name = $theme->display( 'Name' );

		if ( $theme_name !== 'Divi' ) {
			return;
		}

		if ( empty( $wp_post_types['project'] ) ) {
			return;
		}

		unset( $wp_post_types['project'] );

	}

	/**
	 * Remove Portfolio sections.
	 *
	 * @since 1.1.0
	 */
	public function remove_sections() {
		global $wp_customize;
		$wp_customize->remove_section( 'et_pagebuilder_portfolio' );
		$wp_customize->remove_section( 'et_pagebuilder_filterable_portfolio' );
	}
}
