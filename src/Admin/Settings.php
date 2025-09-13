<?php
/**
 * Mange the settings of the plugin.
 *
 * @since 1.0.0
 */

declare(strict_types=1);

namespace AirySeo\Admin;

use AirySeo\Constants;

/**
 * Settings controller.
 */
class Settings {

	/**
	 * The plugin's settings.
	 *
	 * @var array
	 */
	public $settings = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->settings = get_option( Constants::SETTING_NAME );

		add_action( 'admin_init', array( $this, 'register_setting' ) );
		add_action( 'admin_init', array( $this, 'add_setting_fields' ) );
	}

	/**
	 * Register the settings of the plugin.
	 *
	 * @return void
	 */
	public function register_setting(): void {
		register_setting(
			Constants::SETTING_GROUP,
			Constants::SETTING_NAME,
			array(
				'type'              => 'array',
				'default'           => array(),
				'sanitize_callback' => function ( $value ) {
					return is_array( $value ) ? array_map( 'sanitize_text_field', $value ) : array();
				},
			)
		);
	}

	/**
	 * Add the setting fields.
	 *
	 * @return void
	 */
	public function add_setting_fields(): void {
		add_settings_section(
			'airy-seo-settings-section',
			__( 'General Settings', 'airyseo' ),
			array( $this, 'render_section' ),
			'airyseo-options'
		);

		add_settings_field(
			'social-media-facebook',
			__( 'Facebook Open Graph', 'airyseo' ),
			array( $this, 'render_facebook_open_graph_option' ),
			'airyseo-options',
			'airy-seo-settings-section'
		);

		add_settings_field(
			'social-media-twitter',
			__( 'Twitter Card', 'airyseo' ),
			array( $this, 'render_twitter_card_option' ),
			'airyseo-options',
			'airy-seo-settings-section'
		);
	}

	/**
	 * Render the settings section.
	 *
	 * @return void
	 */
	public function render_section() {
		echo '';
	}

	/**
	 * Render the twitter card option.
	 *
	 * @return void
	 */
	public function render_twitter_card_option(): void {
		$name   = airyseo_get_option_name( Constants::OPTION_ENABLE_TWITTER_CARD );
		$option = airyseo_get_option( Constants::OPTION_ENABLE_TWITTER_CARD );

		airyseo_render_template(
			'admin/options/twitter-card',
			array(
				'name'   => $name,
				'option' => $option,
			)
		);
	}

	/**
	 * Render the facebook open graph option.
	 *
	 * @return void
	 */
	public function render_facebook_open_graph_option(): void {
		$name   = airyseo_get_option_name( Constants::OPTION_ENABLE_FACEBOOK_OG_TAGS );
		$option = airyseo_get_option( Constants::OPTION_ENABLE_FACEBOOK_OG_TAGS );

		airyseo_render_template(
			'admin/options/facebook-open-graph',
			array(
				'name'   => $name,
				'option' => $option,
			)
		);
	}
}
