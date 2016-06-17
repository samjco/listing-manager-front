<?php
/**
 * The template for displaying promo page
 *
 * Template name: Promo
 *
 * @package Listing Manager Front
 * @since Listing Manager Front 1.0.0
 */

get_header(); ?>

<div class="hero-wrapper">
	<div class="hero">
		<div class="hero-inner">
			<h1>
				<?php echo esc_html__( 'Create Exceptional Directory Solutions In WordPress &amp; WooCommerce', 'listing-manager-front' ); ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/woocommerce-logo-white.png" alt="WooCommerce">
			</h1>

			<p>
				<?php echo esc_html__( 'Listing Manager plugin provides easy way how to create directory website on the top of the e-commerce platform WooCommerce and easily monetize your business.', 'listing-manager-front' );?>
			</p>

			<div class="buttons">
				<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) )?>" class="button button-primary">
					<?php echo esc_html__( 'Show Listings', 'listing-manager-front' ); ?>
				</a><!-- /.button -->

				<a href="https://codecanyon.net/item/listing-manager-directory-listings-for-woocommerce/16250019?ref=codevisionthemes" class="button button-white">
					<?php echo esc_html__( 'Purchase', 'listing-manager-front' ); ?>

					<span class="description">
						<?php echo wp_kses( __( 'Get one site license<br>on CodeCanyon' , 'listing-manager-front' ), wp_kses_allowed_html( 'post' ) ); ?>
					</span>
				</a><!-- /.button -->
			</div><!-- /.buttons -->
		</div><!-- /.hero-inner -->

		<div class="hero-image center"></div><!-- /.hero-image -->
		<div class="hero-image left"></div><!-- /.hero-image -->
		<div class="hero-image right"></div><!-- /.hero-image -->
	</div><!-- /.hero -->
</div><!-- /.hero-wrapper -->

<div class="page-navigation-wrapper">
	<div class="page-navigation">
		<div class="page-navigation-inner">
			<ul>
				<li><a href="#page-navigation-core-features"><?php echo esc_html__( 'Core Features', 'listing-manager-front' ); ?></a></li>
				<li><a href="#page-navigation-listing-manager-front"><?php echo esc_html__( 'Listing Manager Front', 'listing-manager-front' ); ?></a></li>
				<li><a href="#page-navigation-download-theme"><?php echo esc_html__( 'Download Theme', 'listing-manager-front' ); ?></a></li>
				<li><a href="#page-navigation-download-theme"><?php echo esc_html__( 'FAQ', 'listing-manager-front' ); ?></a></li>
			</ul>
		</div><!-- /.page-navigation-inner -->
	</div><!-- /.page-navigation -->
</div><!-- /.page-navigation-wrapper -->

<div id="page-navigation-core-features" class="block-wrapper">
	<div class="block">
		<div class="block-inner">
			<div class="page-header">
				<h2><?php echo esc_html__( 'Listing Manager Features', 'listing-manager-front' ); ?></h2>

				<p>
					<?php echo esc_html__( 'Check the main features which makes Listing Manager plugin standing out of the crowd', 'listing-manager-front' ); ?>
				</p>		
			</div><!-- /.page-header -->

			<div class="box-wrapper">
				<div class="box">
					<div class="box-inner">
						<h3><?php echo esc_html__( 'Based on WooCommerce', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Listing Manager is completely build upon the WooCommerce plugin.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.box-inner -->
				</div><!-- /.box -->

				<div class="box">
					<div class="box-inner">
						<h3><?php echo esc_html__( 'Packages & WooCommerce Payments', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Using the native WooCommerce payment gateways to purchase listing packages.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.box-inner -->
				</div><!-- /.box -->

				<div class="box">
					<div class="box-inner">
						<h3><?php echo esc_html__( 'Front End Submission', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Allows users to submit the listings from the front end without admin access.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.box-inner -->
				</div><!-- /.box -->

				<div class="box">
					<div class="box-inner">
						<h3><?php echo esc_html__( 'Google Maps', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Support for displaying submitted listings in directory on the Google Map.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.box-inner -->
				</div><!-- /.box -->

				<div class="box">
					<div class="box-inner">
						<h3><?php echo esc_html__( 'Inquire Form', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Quick form allowing users to contact listing owner from your directory website.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.box-inner -->
				</div><!-- /.box -->

				<div class="box">
					<div class="box-inner">
						<h3><?php echo esc_html__( 'Favorite Listings', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Functionality for authenticated users to collect their favorite listings.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.box-inner -->
				</div><!-- /.box -->

				<div class="box">
					<div class="box-inner">
						<h3><?php echo esc_html__( 'Claim Listing', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Allows users to easily claim their listing from the front end with required admin approval.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.box-inner -->
				</div><!-- /.box -->

				<div class="box">
					<div class="box-inner">
						<h3><?php echo esc_html__( 'Report Listing', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Quickly find listings which are breaking your directory terms and conditions.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.box-inner -->
				</div><!-- /.box -->

				<div class="box">
					<div class="box-inner">
						<h3><?php echo esc_html__( 'Locations &amp; Amenities', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Custom taxonomies implementation for better directory listings classification.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.box-inner -->
				</div><!-- /.box -->
			</div><!-- /.box-wrapper -->
			<!--
			<div class="rule">
				<span></span>
				<strong><?php echo esc_html__( 'Do you have any troubles with plugin?', 'listing-manager-front' ); ?></strong>
				<span></span>
			</div>

			<div class="center">
				<a href="#" class="button button-primary"><?php echo esc_html__( 'Get In Touch', 'listing-manager-front' ); ?></a>
			</div>
			-->
		</div><!-- /.block-inner -->
	</div><!-- /.block -->
</div><!-- /.block-wrapper -->

<div id="page-navigation-listing-manager-front" class="block-wrapper">
	<div class="block block-light">
		<div class="block-inner">
			<div class="page-header">
				<h2><?php echo esc_html__( 'Listing Manager Front Theme', 'listing-manager-front' ); ?></h2>

				<p>
					<?php echo esc_html__( 'To bring the best directory user experience Listing Manager is incorporated in Listing Manager Front WordPress Theme which is available for all customers.', 'listing-manager-front' ); ?>
				</p>		
			</div><!-- /.page-header -->	

			<div class="feature">
				<div class="feature-inner">
					<div class="image left">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-image-1-device.png" alt="">
					</div><!-- /.image -->

					<div class="description last">
						<h3><?php echo esc_html__( 'Clean &amp; Beautiful Listings', 'listing-manager-front' ); ?> </h3>

						<p>
							<?php echo esc_html__( 'Beautifully crafted listings archive page to bring best user experience. For the listings page is used standard WooCommerce shop page with the proper styling.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.description -->
				</div><!-- /.feature-inner -->
			</div><!-- /.feature -->	

			<div class="feature">
				<div class="feature-inner">
					<div class="description">
						<h3><?php echo esc_html__( 'Easily Understandable Packages', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'Offer users simple packages. These packages are still WooCommerce products which can be purchased through WooCommerce checkout so you can use all WooCommerce payment gateways.', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.description -->

					<div class="image right last">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-image-2-device.png" alt="">
					</div><!-- /.image -->
				</div><!-- /.feature-inner -->
			</div><!-- /.feature -->

			<div class="feature">
				<div class="feature-inner">
					<div class="image left">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-image-3-device.png" alt="">
					</div><!-- /.image -->

					<div class="description last">
						<h3><?php echo esc_html__( 'Full Featured Listing Details', 'listing-manager-front' ); ?></h3>

						<p>
							<?php echo esc_html__( 'WooCommerce product detail pages are extended to show all required information about the listing. Did you purchased other WooCommerce product? No problem at all. It should be working as expected. ', 'listing-manager-front' ); ?>
						</p>
					</div><!-- /.description -->
				</div><!-- /.feature-inner -->
			</div><!-- /.feature -->			
		</div><!-- /.block-inner -->
	</div><!-- /.block -->
</div><!-- /.block-wrapper -->

<div id="page-navigation-download-theme" class="block-wrapper image-background">
	<div class="block block-dark subscribe">
		<div class="block-inner">
			<h2><?php echo esc_html( 'Get the Listing Manager Front', 'listing-manager-front' ); ?></h2>

			<p><?php echo esc_html__( 'Subscribe and get a copy of Listing Manager Front. Theme specially made for directory &amp; listings.', 'listing-manager-front' ); ?></p>

			<?php echo do_shortcode( '[email-download download_id="132" contact_form_id="128"]' ); ?>

			<p class="small"><?php echo esc_html__( '* We promise that we will not send you spam.', 'listing-manager-front' ); ?></p>
		</div><!-- /.block-inner -->
	</div><!-- /.block -->
</div><!-- /.block-wrapper -->

<div id="page-navigation-faq" class="block-wrapper">
	<div class="block">
		<div class="block-inner">
			<div class="page-header">
				<h2>
					<?php echo esc_html__( 'Frequently Asked Questions', 'listing-manager-front' ); ?>
				</h2>
			</div><!-- /.page-header -->

			<div class="faq-wrapper">
				<div class="faq-item">
					<h3><?php echo esc_html__( 'Is Listing Manager compatible with WooCommerce?', 'listing-manager-front' ); ?></h3>

					<p>
						<?php echo esc_html__( 'Yes, Listing Manager is completely build upon the WooCommerce plugin. You will create new listings in the exact same way how you created the product but you will just change the product type to "Listing".', 'listing-manager-front'); ?>
					</p>
				</div><!-- /.faq-item -->

				<div class="faq-item">
					<h3><?php echo esc_html__( 'Does Listing Manager support front end submission?', 'listing-manager-front' ); ?></h3>

					<p>
						<?php echo esc_html__( 'Plugin is incorporating basic front end submission system but adding new front end field requires some coding skills. You can of course use third party plugins for adding new listings from the front end.', 'listing-manager-front' ); ?>
					</p>
				</div><!-- /.faq-item -->			

				<div class="faq-item">
					<h3><?php echo esc_html__( 'How the package system works?', 'listing-manager-front' ); ?></h3>

					<p>
						<?php echo esc_html__( 'Plugin creates new product type obviously called "Package". This product type defines new special package fields which are used in submission system.', 'listing-manager-front' ); ?>
					</p>
				</div><!-- /.faq-item -->

				<div class="faq-item">
					<h3><?php echo esc_html__( 'Which payment gateways are supported?', 'listing-manager-front' ); ?></h3>

					<p>
						<?php echo esc_html__( 'For purchasing the package plugin is using standard WooCommerce checkout so all payment gateways which are supported in WooCommerce will be working.', 'listing-manager-front' ); ?>
					</p>
				</div><!-- /.faq-item -->
			</div><!-- /.faq-wrapper -->
		</div><!-- /.block-inner -->
	</div><!-- /.block -->
</div><!-- /.block-wrapper -->

<div class="footer-promo">
		<?php echo date('Y'); ?> <?php echo esc_html__( 'Created by Code Vision. All rights reserved.', 'listing-manager-front' ); ?>
</div><!-- /.footer-promo -->

<?php get_footer( 'simple' ); ?>