<?php
/**
 * Options page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="wrap">
	<h1><?php esc_html_e( 'Airy SEO', 'airyseo' ); ?></h1>
	<p><?php esc_html_e( 'Please select the feature you would like to use.', 'airyseo' ); ?></p>
	<form action="options.php" method="post">
		<?php
		settings_fields( $data['setting_group'] );
		do_settings_sections( $data['page'] );
		submit_button();
		?>
	</form>
</div>

