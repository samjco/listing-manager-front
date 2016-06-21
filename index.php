<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div class="posts">
		<?php while ( have_posts() ) : the_post(); ?>		
			<?php get_template_part( 'templates/content', get_post_type() );?>
		<?php endwhile; ?>
	</div><!-- /.posts -->

    <?php listing_manager_front_pagination(); ?>
<?php else : ?>
    <?php get_template_part( 'templates/content', 'none' ); ?>		
<?php endif; ?>

<?php get_footer(); ?>
