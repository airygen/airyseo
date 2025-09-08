<?php
/**
 * Unit tests for AirySeo\Modules\TwitterCard.
 *
 * @package airyseo
 */

namespace AirySeoTest\Modules;

use AirySeo\Modules\TwitterCard;
use AirySeoTest\BaseTestCase;

/**
 * Class TwitterCardTest
 */
class TwitterCardTest extends BaseTestCase {
	/**
	 * Test TwitterCard class can be instantiated.
	 */
	public function test_can_instantiate() {
		$tc = new TwitterCard();
		$this->assertInstanceOf( TwitterCard::class, $tc );
	}

	/**
	 * Test add_tags outputs Twitter Card meta tags on singular post.
	 */
	public function test_add_tags_outputs_twitter_tags() {
		// Arrange.
		$post_id = self::factory()->post->create(
			array(
				'post_title'   => 'Test Twitter Title',
				'post_content' => 'Test content for Twitter Card.',
				'post_type'    => 'post',
			)
		);
		$this->set_mock_post( $post_id );

		$tc = new TwitterCard();

		// Act.
		ob_start();
		$tc->add_tags();
		$output = ob_get_clean();

		// Assert.
		$this->assertStringContainsString( 'twitter:title', $output );
		$this->assertStringContainsString( 'Test Twitter Title', $output );
		$this->assertStringContainsString( 'twitter:description', $output );
	}

	/**
	 * Test add_tags does not output on non-singuar pages.
	 */
	public function test_add_tags_should_not_output_on_non_singular() {
		$tc = new TwitterCard();
		global $wp_query;
		$wp_query->is_singular = false;

		ob_start();
		$tc->add_tags();
		$output = ob_get_clean();

		$this->assertEmpty( $output );
	}
}
