<?php
/**
 * Plugin Name: Airy SEO
 * Plugin URI:  https://github.com/airygen/airyseo
 * Description: ightweight WordPress SEO plugin designed for simplicity and performance.
 * Version:     1.0.0
 * Author:      Airygen Team
 * Author URI:  https://github.com/airygen
 * License:     GPL 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: airyseo
 * Domain Path: /languages
 */

/**
 * This file is the entry point of the plugin.
 */

require 'vendor/autoload.php';

$airyseo = new AirySEO\Launcher( __FILE__, '1.0.0' );
$airyseo->init();
