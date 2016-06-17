<?php
/**
 * Template file
 *
 * @package Listing Manager Front
 * @subpackage Templates
 * @since 1.0.3
 */

?>

<?php global $post; ?>

<?php if ( ! empty( $post->post_content ) ) : ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
		<div class="post-content">
			<?php the_content(); ?>
		</div><!-- /.post-content -->

	    <?php wp_link_pages( array(
            'before'      => '<div class="pagination page-links"><span class="page-links-title">' . esc_attr__( 'Post Pages:', 'listing-manager-front' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span class="page-numbers">',
            'link_after'  => '</span>',
	    ) ); ?>

	    <?php if ( has_tag() ) : ?>
	        <div class="post-meta-tags clearfix">
	            <?php echo esc_attr__( 'Tags', 'listing-manager-front' ); ?>:
	            <ul>
	                <?php the_tags( '<li class="tag">', '</li><li class="tag">', '</li>' ); ?>
	            </ul>
	        </div><!-- /.post-meta -->
	    <?php endif; ?>			
	</div><!-- /.post -->

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>
<?php endif; ?>