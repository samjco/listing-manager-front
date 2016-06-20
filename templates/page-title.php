<?php $title = get_the_title(); ?>

<?php if ( ! empty( $title ) && ! is_singular( 'product' ) ) : ?>
	<div class="page-title">
		<div class="page-title-inner">
			<?php if ( is_search() ) : ?>
				<h1><?php echo esc_html__( 'Search Results', 'listing-manager-front' ); ?></h1>
			<?php elseif ( class_exists( 'WooCommerce' ) && is_shop() ) : ?>
				<?php $title = woocommerce_page_title( false ); ?>
				
				<h1>
					<?php if ( ! empty( $title ) ) : ?>
						<?php echo esc_html( $title ); ?>
					<?php else : ?>
						<?php echo esc_html__( 'Listings', 'listing-manager' ); ?>
					<?php endif; ?>
				</h1>

				<?php if ( is_shop() ) : ?>					
					<?php $page_id = get_option( 'woocommerce_shop_page_id', null );?>
					<?php if ( ! empty( $page_id ) ) : ?>
						<?php $description = get_post_meta( $page_id, 'title_description', true ); ?>
						<?php if ( ! empty( $description ) ) : ?>
							<p>
								<?php echo esc_html( $description ); ?>
							</p>
						<?php endif; ?>						
					<?php endif; ?>
				<?php endif; ?>
			<?php elseif ( is_archive() ) : ?>
				<h1><?php the_archive_title(); ?></h1>
			<?php elseif ( is_search() ) : ?>
                <h1>
	                <?php echo esc_html__( 'Search for', 'listing-manager-front' ); ?>
					<?php echo get_search_query(); ?>
                </h1>
			<?php elseif ( is_home() ) : ?>
				<h1><?php echo esc_html__( 'Recent news from', 'listing-manager-front' ); ?> <?php bloginfo( 'name' ); ?></h1>
			<?php else : ?>
				<h1><?php the_title(); ?></h1>
				<?php $description = get_post_meta( get_the_ID(), 'title_description', true ); ?>
				<?php if ( ! empty( $description ) ) : ?>
					<p>
						<?php echo esc_html( $description ); ?>
					</p>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- /.page-title-inner -->
	</div><!-- /.page-title -->
<?php endif; ?>