<?php
/**
 * Plugin Name: Airy SEO
 * Plugin URI:  https://github.com/airygen/airyseo
 * Description: A lightweight WordPress SEO plugin designed for simplicity and performance.
 * Version:     1.0.1
 * Author:      Airygen Team
 * Author URI:  https://github.com/airygen
 * License:     GPL 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: airyseo
 * Domain Path: /languages
 *
 * @package airyseo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This file is the entry point of the plugin.
 */

require 'vendor/autoload.php';

$airyseo = new AirySeo\Launcher( __FILE__, '1.0.1' );
$airyseo->init();
