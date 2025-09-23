<?php
/**
 * Template part for displaying the Twitter Card tags.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$x_tag = $data['x_tag'];

?>

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo esc_attr( $x_tag['twitter:title'] ); ?>">
<meta name="twitter:description" content="<?php echo esc_attr( $x_tag['twitter:description'] ); ?>">
<?php if ( $x_tag['twitter:image'] ) { ?>
	<meta name="twitter:image" content="<?php echo esc_url( $x_tag['twitter:image'] ); ?>">
<?php } ?>
