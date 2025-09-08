<?php
/**
 * Unit tests for AirySeo\Modules\MetaTags.
 *
 * @package airyseo
 */

namespace AirySeoTest\Modules;

use AirySeo\Constants;
use AirySeo\Modules\MetaTags;
use AirySeoTest\BaseTestCase;

/**
 * Class MetaTagsTest
 */
class MetaTagsTest extends BaseTestCase {

	/**
	 * Test MetaTags class can be instantiated.
	 */
	public function test_can_instantiate() {
		$meta_tags = new MetaTags();
		$this->assertInstanceOf( MetaTags::class, $meta_tags );
	}

	/**
	 * Test print_meta_description outputs meta tag.
	 */
	public function test_print_meta_description_outputs_meta() {
		// Arrange.
		$post_id = self::factory()->post->create(
			array(
				'post_title'   => 'Test Title',
				'post_content' => 'Test content for meta description.',
			)
		);

		$this->set_mock_post( $post_id );
		update_post_meta( $post_id, Constants::META_DESCRIPTION, 'This is a test meta description.' );

		$meta_tags = new MetaTags();

		// Act.
		ob_start();
		$meta_tags->print_meta_description();
		$output = ob_get_clean();

		// Assert.
		$this->assertStringContainsString(
			'<meta name="description" content="This is a test meta description.">',
			$output
		);
	}

	/**
	 * Test print_meta_description does not output on non-singular pages.
	 */
	public function test_print_meta_description_should_not_output_on_non_singular() {
		// Arrange.
		$meta_tags = new MetaTags();

		global $wp_query;
		$wp_query->is_singular = false;

		// Act.
		ob_start();
		$meta_tags->print_meta_description();
		$output = ob_get_clean();

		// Assert.
		$this->assertEmpty( $output );
	}
}
