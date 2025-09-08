<?php
/**
 * Template part for displaying the Facebook Open Graph option.
 */

?>

<label for="facebook-open-graph-option-yes">
	<?php esc_html_e( 'Yes', 'airyseo' ); ?>
	<input id="facebook-open-graph-option-yes" type="radio" name="<?php echo esc_attr( $name ); ?>" value="yes" <?php checked( 'yes', $option ); ?> />
</label>
<label for="facebook-open-graph-option-no">
	<?php esc_html_e( 'No', 'airyseo' ); ?>
	<input id="facebook-open-graph-option-no" type="radio" name="<?php echo esc_attr( $name ); ?>" value="no" <?php checked( 'no', $option ); ?> />
</label>
