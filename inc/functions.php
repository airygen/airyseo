<?php
/**
 * The helper functions for this plugin.
 *
 * @since 1.0.0
 * @package AirySEO
 */

declare( strict_types=1 );

use AirySeo\Constants;

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

	$data = airyseo_recursive_sanitize( $data );

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
	$template_html = airyseo_get_template( $template_path, $data );
	echo wp_kses( $template_html, airyseo_safe_html_tags() );
}

/**
 * Recursively sanitize all string values in an array using sanitize_text_field.
 *
 * @param mixed $data The data to be passed to the view file.
 * @return array
 */
function airyseo_recursive_sanitize( $data ) {
	if ( is_array( $data ) ) {
		foreach ( $data as $key => $value ) {
			$data[ $key ] = airyseo_recursive_sanitize( $value );
		}
		return $data;
	}
	if ( is_string( $data ) ) {
		return sanitize_text_field( $data );
	}
	return $data;
}

/**
 * Returns the allowed HTML tags for settings pages.
 *
 * @return array The allowed HTML tags and their attributes.
 */
function airyseo_safe_html_tags() {
	return array(
		'a'      => array(
			'href'  => array(),
			'title' => array(),
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'input'  => array(
			'type'    => array(),
			'name'    => array(),
			'value'   => array(),
			'id'      => array(),
			'checked' => array(),
		),
		'label'  => array(
			'for' => array(),
		),
		'form'   => array(
			'action' => array(),
			'method' => array(),
		),
		'div'    => array(
			'class' => array(),
		),
		'span'   => array(
			'class' => array(),
		),
		'h1'     => array(),
		'h2'     => array(),
		'p'      => array(
			'class' => array(),
		),
		'meta'   => array(
			'property' => array(),
			'content'  => array(),
			'name'     => array(),
		),
		'table'  => array(
			'class' => array(),
			'role'  => array(),
		),
		'tr'     => array(),
		'th'     => array(
			'scope' => array(),
		),
		'td'     => array(),
	);
}

/**
 * Get a specific option from the settings.
 *
 * @param string $option  The option name.
 * @param mixed  $default_value The default value.
 * @return mixed
 */
function airyseo_get_option( string $option, $default_value = '' ) {
	$options = get_option( Constants::SETTING_NAME );

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
