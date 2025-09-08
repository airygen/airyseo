<?php
/**
 * Template part for displaying the Twitter Card option.
 */

?>

<label for="twitter-card-option-yes">
	<?php esc_html_e( 'Yes', 'airyseo' ); ?>
	<input id="twitter-card-option-yes" type="radio" name="<?php echo esc_attr( $name ); ?>" value="yes" <?php checked( 'yes', $option ); ?> />
</label>
<label for="twitter-card-option-no">
	<?php esc_html_e( 'No', 'airyseo' ); ?>
	<input id="twitter-card-option-no" type="radio" name="<?php echo esc_attr( $name ); ?>" value="no" <?php checked( 'no', $option ); ?> />
</label>
