<div class="main-wrapper">	
	<div class="main">
		<?php if ( class_exists( 'WooCommerce' ) ) : ?>
			<?php woocommerce_breadcrumb(); ?>
		<?php endif; ?>

		<?php if ( is_singular( 'product' ) ) : ?>
			<div class="woocommerce-product-actions">
				<?php do_action( 'listing_manager_front_product_actions' ); ?>
			</div><!-- /.woocommerce-product-actions -->
		<?php endif; ?>

		<div class="main-inner">
			<?php get_template_part( 'templates/page-title' ); ?>

			<?php if ( is_active_sidebar( 'content-top' ) ) : ?>
				<?php dynamic_sidebar( 'content-top' ); ?>
			<?php endif; ?>