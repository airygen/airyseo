<?php
/**
 * Unit tests for AirySeo\Admin\Assets
 *
 * @package airyseo
 */

declare(strict_types=1);

namespace AirySeoTest\Admin;

use AirySeo\Admin\Assets;
use AirySeoTest\BaseTestCase;

/**
 * Class AssetsTest
 */
class AssetsTest extends BaseTestCase {

	/**
	 * Test Assets class can be instantiated.
	 */
	public function test_can_instantiate() {
		$assets = new Assets( 'http://localhost/', '1.0.0' );
		$this->assertInstanceOf( Assets::class, $assets );
	}

	/**
	 * Test enqueue_styles registers and enqueues style.
	 */
	public function test_enqueue_styles_registers_and_enqueues_style() {
		$assets = new Assets( 'http://localhost/', '1.0.0' );
		$assets->enqueue_styles( 'post.php' );
		$this->assertTrue( wp_style_is( 'airyseo_admin_css', 'enqueued' ) );
	}

	/**
	 * Test enqueue_scripts registers and enqueues script.
	 */
	public function test_enqueue_scripts_registers_and_enqueues_script() {
		$assets = new Assets( 'http://localhost/', '1.0.0' );
		$assets->enqueue_scripts( 'post.php' );
		$this->assertTrue( wp_script_is( 'airyseo_admin_js', 'enqueued' ) );
	}
}
