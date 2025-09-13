<?php
/**
 * This class is responsible for the menu position of the plugin,
 * as well as the entry link to the settings page.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySeo\Admin;

use AirySeo\Constants;

/**
 * Menu controller.
 */
class Menu {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'create_options_page' ) );
	}

	/**
	 * Create the options page for the plugin.
	 *
	 * @return void
	 */
	public function create_options_page(): void {
		add_options_page(
			__( 'Airy SEO', 'airyseo' ),
			__( 'Airy SEO', 'airyseo' ),
			'manage_options',
			'airyseo-options',
			array( $this, 'render_options_page' )
		);
	}

	/**
	 * Render the options page for the plugin.
	 * Called by this::create_options_page().
	 *
	 * @return void
	 */
	public function render_options_page(): void {
		airyseo_render_template(
			'admin/options',
			array(
				'setting_group' => Constants::SETTING_GROUP,
				'page'          => 'airyseo-options',
			)
		);
	}
}
