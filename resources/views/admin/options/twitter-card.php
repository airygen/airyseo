<?php
/**
 * Template part for displaying the Twitter Card option.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<label for="twitter-card-option-yes">
	<?php esc_html_e( 'Yes', 'airyseo' ); ?>
	<input id="twitter-card-option-yes" type="radio" name="<?php echo esc_attr( $data['name'] ); ?>" value="yes" <?php checked( 'yes', $data['option'] ); ?> />
</label>
<label for="twitter-card-option-no">
	<?php esc_html_e( 'No', 'airyseo' ); ?>
	<input id="twitter-card-option-no" type="radio" name="<?php echo esc_attr( $data['name'] ); ?>" value="no" <?php checked( 'no', $data['option'] ); ?> />
</label>
