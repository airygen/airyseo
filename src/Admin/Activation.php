<?php
/**
 * Handling plugin activation and deactivation.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySeo\Admin;

use AirySEO\Constants;

/**
 * Metabox controller.
 */
class Activation {

	/**
	 * Constructor.
	 *
	 * @param string $base The base path for the plugin's entry file.
	 */
	public function __construct( string $base ) {
		register_activation_hook( $base, array( $this, 'activate' ) );
		register_deactivation_hook( $base, array( $this, 'deactivate' ) );
	}

	/**
	 * Method triggered upon plugin activation.
	 *
	 * @return void
	 */
	public function activate() {
		update_option(
			Constants::SETTING_OPTION_NAME,
			array(
				'enable_facebook_open_graph' => 'no',
				'enable_twitter_card'        => 'no',
			)
		);
	}

	/**
	 * Method triggered upon plugin deactivation.
	 *
	 * @return void
	 */
	public function deactivate() {
		delete_option( Constants::SETTING_OPTION_NAME );
	}
}
