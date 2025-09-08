<?php
/**
 * The helper functions for this plugin.
 *
 * @since 1.0.0
 * @package AirySEO
 */

/**
 * Load a template file.
 *
 * @param string $template_path The path of the view file.
 * @param array  $data          The data to be passed to the view file.
 * @return string
 */
function airyseo_get_template( string $template_path, $data = array() ) {
	$template_path = plugin_dir_path( __FILE__ ) . '../resources/views/' . $template_path . '.php';

	if ( ! file_exists( $template_path ) ) {
		return '';
	}

	if ( ! empty( $data ) ) {
		extract( $data ); // phpcs:ignore
	}

	ob_start();
	include $template_path;
	$result = ob_get_contents();
	ob_end_clean();

	return $result;
}

/**
 * Render a template file.
 *
 * @param string $template_path The path of the view file.
 * @param array  $data          The data to be passed to the view file.
 * @return void
 */
function airyseo_render_template( string $template_path, $data = array() ) {
	echo airyseo_get_template( $template_path, $data ); // phpcs:ignore
}

/**
 * Get a specific option from the settings.
 *
 * @param string $option  The option name.
 * @param mixed  $default_value The default value.
 * @return mixed
 */
function airyseo_get_option( string $option, $default_value = '' ) {
	$options = get_option( 'airyseo_settings' );

	if ( isset( $options[ $option ] ) ) {
		return $options[ $option ];
	}

	return $default_value;
}

/**
 * Get the name of a specific option.
 *
 * @param string $option The option name.
 * @return string
 */
function airyseo_get_option_name( string $option ): string {
	return 'airyseo_settings[' . $option . ']';
}
