<?php
/**
 * The constants for this plugin.
 * Main propose is to avoid typos and make it easier to check with intellisense.
 */

declare(strict_types=1);

namespace AirySeo;

/**
 * Airy SEO plugin constants.
 */
class Constants {

	// The settings option name.
	const SETTING_NAME = 'airyseo_settings';

	// The settings group name.
	const SETTING_GROUP = 'airyseo_settings_group';

	// The postmeta key for the title.
	const META_TITLE = '_airyseo_title';

	// The postmeta key for the description.
	const META_DESCRIPTION = '_airyseo_description';

	// The setting option of the Facebook OG tags.
	const OPTION_ENABLE_FACEBOOK_OG_TAGS = '_airyseo_enable_facebook_og_tags';

	// The setting option of the Twitter card.
	const OPTION_ENABLE_TWITTER_CARD = '_airyseo_enable_twitter_card';
}
