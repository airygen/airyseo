<?php
/**
 * Unit tests for AirySeo\Modules\FacebookOpenGraph.
 *
 * @package airyseo
 */

namespace AirySeoTest\Modules;

use AirySeo\Modules\FacebookOpenGraph;
use AirySeoTest\BaseTestCase;

/**
 * Class FacebookOpenGraphTest
 */
class FacebookOpenGraphTest extends BaseTestCase {
	/**
	 * Test FacebookOpenGraph class can be instantiated.
	 */
	public function test_can_instantiate() {
		$og = new FacebookOpenGraph();
		$this->assertInstanceOf( FacebookOpenGraph::class, $og );
	}

	/**
	 * Test add_tags outputs Open Graph meta tags on singular post.
	 */
	public function test_add_tags_outputs_og_tags() {
		// Arrange.
		$post_id = self::factory()->post->create(
			array(
				'post_title'   => 'Test OG Title',
				'post_content' => 'Test content for Open Graph.',
			)
		);

		$this->set_mock_post( $post_id );

		$og = new FacebookOpenGraph();

		// Act.
		ob_start();
		$og->add_tags();
		$output = ob_get_clean();

		// Assert.
		$this->assertStringContainsString( 'og:title', $output );
		$this->assertStringContainsString( 'Test OG Title', $output );
		$this->assertStringContainsString( 'og:description', $output );
	}

	/**
	 * Test add_tags does not output on non-singular pages.
	 */
	public function test_add_tags_should_not_output_on_non_singular() {
		$og = new FacebookOpenGraph();
		global $wp_query;
		$wp_query->is_singular = false;

		ob_start();
		$og->add_tags();
		$output = ob_get_clean();

		$this->assertEmpty( $output );
	}
}
