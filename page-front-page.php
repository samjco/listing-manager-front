<?php
/**
 * The template for displaying front page
 *
 * Template name: Front
 *
 * @package Listing Manager Front
 * @since Listing Manager Front 1.0.0
 */

get_header(); ?>

<?php if ( is_active_sidebar( 'front' ) ) : ?>
	<?php dynamic_sidebar( 'front' ); ?>
<?php endif; ?>

<?php get_footer( 'simple' ); ?>