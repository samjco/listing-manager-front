<?php

/**
 * Libraries
 */
require_once get_template_directory() . '/assets/libraries/class-tgm-plugin-activation.php';

/**
 * Register fonts
 *
 * Translators: If there are characters in your language that are not supported
 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
 *
 * @see https://gist.github.com/kailoon/e2dc2a04a8bd5034682c
 * @return string
 */
function listing_manager_front_fonts() {	
	$font_url = '';

	if ( 'off' !== _x( 'on', 'Google font: on or off', 'listing-manager-front' ) ) {
		$font_url = add_query_arg( 'family', urlencode(  'Handlee|Open Sans:400,600,700&subset=latin,latin-ext' ), '//fonts.googleapis.com/css' );
	}	
	return $font_url;
}

/**
 * Enqueue scripts & styles
 *
 * @see wp_enqueue_scripts
 * @return void
 */
function listing_manager_front_enqueue() {
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css' );
	wp_enqueue_style( 'listing-manager-front-fonts', listing_manager_front_fonts(), array(), '1.0.0' );
	wp_enqueue_style( 'listing-manager-front', get_template_directory_uri() . '/assets/css/listing-manager-front.css' );

	wp_enqueue_script( 'listing-manager-front', get_template_directory_uri() . '/assets/js/listing-manager-front.js', array( 'jquery' ) );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'scrollTo', get_template_directory_uri() . '/assets/js/jquery.scrollTo.min.js', array( 'jquery' ) );

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}
}
add_action( 'wp_enqueue_scripts', 'listing_manager_front_enqueue' );

/**
 * Custom widget areas
 *
 * @see widgets_init
 * @return void
 */
function listing_manager_front_sidebars() {
	$sidebars = array(
		'sidebar-1' 			=> esc_html__( 'Primary', 'listing-manager-front' ),
		'content-top' 			=> esc_html__( 'Content Top', 'listing-manager-front' ),
		'product' 				=> esc_html__( 'Product', 'listing-manager-front' ),
		'footer-left' 		    => esc_html__( 'Footer Left ', 'listing-manager-front' ),
		'footer-right' 		    => esc_html__( 'Footer Right ', 'listing-manager-front' ),
	);

	foreach ( $sidebars as $key => $value ) {
		register_sidebar( array( 
			'name' 			=> $value, 
			'id' 			=> $key, 
			'before_widget' => '<div id="%1$s" class="widget %2$s">', 
			'after_widget' 	=> '</div>'
		 ) );
	}	
}
add_action( 'widgets_init', 'listing_manager_front_sidebars' );

/**
 * Comments template
 *
 * @param string $comment Comment message.
 * @param array  $args Arguments.
 * @param int    $depth Depth.
 * @return void
 */
function listing_manager_front_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	extract( $args, EXTR_SKIP );
	include get_template_directory() . '/templates/content-comment.php';
}

/**
 * Body classes
 *
 * @hook body_class
 * @param array $body_class
 * @return array
 */
function listing_manager_front_body_classes( $body_class ) {
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$body_class[] = 'has-sidebar';
	}

	if ( class_exists( 'WooCommerce' ) ) {
		$body_class[] = 'woocommerce';

		if ( is_cart() && 0 === count( WC()->cart->cart_contents ) ) {			
			$body_class[] = 'empty-cart';
		}
	}

	return $body_class;
}
add_filter( 'body_class', 'listing_manager_front_body_classes' );

/**
 * Additional after theme setup functions
 *
 * @see after_setup_theme
 * @return void
 */
function listing_manager_front_after_theme_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'listing_manager_front_after_theme_setup' );

/**
 * Enable shortcodes in text widgets
 *
 * @see after_setup_theme
 * @return void
 */
function listing_manager_front_enable_shortcodes_in_text_widget() {
	add_filter( 'widget_text', 'do_shortcode' );
}
add_action( 'after_setup_theme', 'listing_manager_front_enable_shortcodes_in_text_widget' );

/**
 * Enable theme translation
 *
 * @see after_setup_theme
 * @return void
 */
function listing_manager_front_load_textdomain() {
	load_theme_textdomain( 'listing-manager-front', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'listing_manager_front_after_theme_setup' );

/**
 * Register navigations
 *
 * @action init
 * @return void
 */
function listing_manager_front_menu() {
	register_nav_menu( 'primary', esc_html__( 'Primary', 'listing-manager-front' ) );
	register_nav_menu( 'authenticated', esc_html__( 'Authenticated', 'listing-manager-front' ) );
}
add_action( 'init', 'listing_manager_front_menu' );

/**
 * Custom excerpt length
 *
 * @param int $length String length.
 * @filter excerpt_length
 * @return int
 */
function listing_manager_front_excerpt_length( $length ) {
	global $post;

	if ( $post->post_type == 'post' ) {
		return 20;
	} 

	return $length;
}
add_filter( 'excerpt_length', 'listing_manager_front_excerpt_length' );

/**
 * Custom read more
 *
 * @param string $more Read more string.
 * @filter excerpt_more
 * @return string
 */
function listing_manager_front_excerpt_more( $more ) {
	return '<a href="' . get_the_permalink(). '" class="button button-primary read-more">' . esc_html__( 'Read More', 'listing-manager-front' ) . '</a>';
}
add_filter( 'excerpt_more', 'listing_manager_front_excerpt_more' );


/**
 * Disable admin's bar top margin
 *
 * @see get_header
 * @return void
 */
function listing_manager_front_disable_admin_bar_top_margin() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'listing_manager_front_disable_admin_bar_top_margin' );

/**
 * Adds wrapper around content and sidebar
 *
 * @see listing_manager_front_before_main
 * @return void
 */
function listing_manager_front_add_main_before() {
	if ( is_page_template( 'page-promo-page.php') ) {
		return;
	}

	get_template_part( 'templates/main-before' );
}
add_action( 'listing_manager_front_before_main', 'listing_manager_front_add_main_before' );

/**
 * Adds wrapper around content and sidebar
 *
 * @see listing_manager_front_after_main
 * @return void
 */
function listing_manager_front_add_main_after() {
	if ( is_page_template( 'page-promo-page.php') ) {
		return;
	}

	get_template_part( 'templates/main-after' );
}
add_action( 'listing_manager_front_after_main', 'listing_manager_front_add_main_after' );

/**
 * Adds woocommerce_after_main_content
 *
 * @see listing_manager_front_before_main
 * @return void
 */
function listing_manager_front_woocommerce_before_main_content() {
	echo '<div class="content">';
}
add_action( 'woocommerce_before_main_content', 'listing_manager_front_woocommerce_before_main_content', 1 );

/**
 * Adds wrapper around content
 *
 * @see woocommerce_after_main_content
 * @return void
 */
function listing_manager_front_woocommerce_after_main_content() {
	echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'listing_manager_front_woocommerce_after_main_content', 1);

/**
 * Change the breadcrumb position
 *
 * @see init
 * @return void
 */
function listing_manager_front_woocommerce_breadcrumb() {	
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_action( 'init', 'listing_manager_front_woocommerce_breadcrumb' );

/**
 * Change WooCommerce breadcrumb values
 *
 * @see woocommerce_breadcrumb_defaults
 * @param array $args
 * @return array
 */
function listing_manager_front_woocommerce_breadcrumb_defaults( $args ) {
	$args['delimiter'] = '<span class="separator">/</span>';
	return $args;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'listing_manager_front_woocommerce_breadcrumb_defaults' );

/**
 * Removes add to cart button from the loop page
 *
 * @see init
 * @return void
 */
function listing_manager_front_woocommerce_remove_loop_button(){
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action( 'init','listing_manager_front_woocommerce_remove_loop_button' );

/**
 * Removes WooCommerce title
 *
 * @see woocommerce_show_page_title
 * @return bool
 */
function listing_manager_front_woocommerce_show_page_title() {
	return false;
}
add_filter( 'woocommerce_show_page_title', 'listing_manager_front_woocommerce_show_page_title' );

/**
 * Adds location after shop title in loop
 *
 * @see woocommerce_after_shop_loop_item_title
 * @return void
 */
function listing_manager_front_woocommerce_loop_add_location() {
	echo '<div class="product-location">' . Listing_Manager_Product_Listing::get_location_name() . '</div>';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'listing_manager_front_woocommerce_loop_add_location' );

/**
 * Adds favorite button after title
 *
 * @see woocommerce_after_shop_loop_item_title
 * @return void
 */
function listing_manager_front_woocommerce_loop_add_favorite() {
	if ( has_term( 'listing', 'product_type' ) ) {
		Listing_Manager_Favorites::render_button( get_the_ID() );
	}	
}
add_action( 'woocommerce_after_shop_loop_item_title', 'listing_manager_front_woocommerce_loop_add_favorite' );

/**
 * Adds excerpt after shop title in loop
 *
 * @see woocommerce_after_shop_loop_item_title
 * @return void
 */
function listing_manager_front_woocommerce_loop_add_excerpt() {
	the_excerpt();
}
add_action( 'woocommerce_after_shop_loop_item_title', 'listing_manager_front_woocommerce_loop_add_excerpt' );

/**
 * Adds event after product in loop
 *
 * @see woocommerce_after_shop_loop_item_title
 * @return void
 */
function listing_manager_front_woocommerce_loop_add_event() {
	$date = get_post_meta( get_the_ID(), LISTING_MANAGER_LISTING_PREFIX . 'event_date', true );

	if ( ! empty( $date ) ) {
		echo '<div class="event-countdown" data-date="' . esc_attr( $date ) . '"></div>';
	}
}
add_action( 'woocommerce_after_shop_loop_item_title', 'listing_manager_front_woocommerce_loop_add_event' );

/**
 * Adds image wrapper for product images in loop
 *
 * @see woocommerce_before_shop_loop_item_title
 * @return string
 */
function listing_manager_front_product_loop_thumbnail( ) {
    global $post, $woocommerce;

    $default = '<img src="' . get_template_directory_uri() . '/assets/img/placeholder.jpg" alt="' . $post->post_title . '">';
    $output = '<div class="product-image-wrapper">';

    if ( has_post_thumbnail() ) {
    	$image= get_the_post_thumbnail( $post->ID, 'shop_catalog' );

    	if ( empty( $image ) ) {
    		$output .= $default;
    	} else {
			$output .= $image;
    	}        
    } else {
    	$output .= $default;
    }

    $output .= '</div>';
    echo $output;
}
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'listing_manager_front_product_loop_thumbnail', 10 );

/**
 * Custom rating formatting
 *
 * @param string $rating_html
 * @param float $rating
 * @return string
 */
function listing_manager_front_product_rating_html( $rating_html, $rating ) {
	return wc_get_template_html( 'templates/product-rating.php', array(
		'rating_html' 	=> $rating_html,
		'rating'		=> $rating,
	) );
}
add_filter( 'woocommerce_product_get_rating_html', 'listing_manager_front_product_rating_html', 10, 2 );

/**
 * Reorder rating stars in product loop
 */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating' );

/**
 * Change WooCommerce pagination values
 *
 * @see woocommerce_pagination_args
 * @param array $args
 * @return array
 */
function listing_manager_front_woocommerce_pagination_args( $args ) {
	$args['prev_text'] = '<i class="fa fa-chevron-left"></i>';
	$args['next_text'] = '<i class="fa fa-chevron-right"></i>';
	return $args;
}
add_filter( 'woocommerce_pagination_args', 'listing_manager_front_woocommerce_pagination_args' );

/**
 * Return back on product detail
 *
 * @see woocommerce_single_product_summary
 * @return void
 */
function listing_manager_front_woocommerce_return_back() {
	echo '<div class="product-return-back"><a href="' . get_permalink( wc_get_page_id( 'shop' ) ) . '"><i class="fa fa-long-arrow-left"></i></a></div>';
}
add_action( 'woocommerce_single_product_summary', 'listing_manager_front_woocommerce_return_back', 11 );

/**
 * Adds share buttons
 *
 * @see woocommerce_single_product_summary
 * @return void
 */
function listing_manager_front_woocommerce_share() {
	get_template_part( 'templates/share' );
}
add_action( 'woocommerce_single_product_summary', 'listing_manager_front_woocommerce_share', 100 );

/**
 * Add inquire form on product detail page
 *
 * @see woocommerce_after_single_product_summary
 * @return void
 */
function listing_manager_front_woocommerce_add_inquire_form() {
	get_template_part( 'templates/inquire-form' );
}
add_action( 'woocommerce_after_single_product_summary', 'listing_manager_front_woocommerce_add_inquire_form', 11 );

/**
 * Adds next/prev posts links
 *
 * @see woocommerce_after_single_product_summary
 * @return void
 */
function listing_manager_front_woocommerce_add_next_prev() {
	get_template_part( 'templates/next-prev-links' );
}
add_action( 'woocommerce_after_single_product_summary', 'listing_manager_front_woocommerce_add_next_prev', 100 );

/**
 * Limits max number of related products
 *
 * @see woocommerce_output_related_products_args
 * @param array $args
 * @return array
 */
function listing_manager_front_max_number_of_related( $args ) {
	$args['posts_per_page'] = 3; 
	$args['columns'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'listing_manager_front_max_number_of_related' );

/**
 * Register plugins
 *
 * @hook tgmpa_register
 * @return void
 */
function listing_manager_front_register_required_plugins() {
	$plugins = array(
		array(
			'name'      			=> 'WooCommerce',
			'slug'      			=> 'woocommerce',
			'is_automatic'          => true,
			'required'  			=> false,
		),											
	);

	tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'listing_manager_front_register_required_plugins' );

/**
 * Define product actions
 */
add_action( 'listing_manager_front_product_actions', array( 'Listing_Manager_Reports', 'render_button' ) );
add_action( 'listing_manager_front_product_actions', array( 'Listing_Manager_Claims', 'render_button' ) );
add_action( 'listing_manager_front_product_actions', array( 'Listing_Manager_Favorites', 'render_button' ) );

remove_action( 'woocommerce_after_single_product', array( 'Listing_Manager_Reports', 'render_button' ) );
remove_action( 'woocommerce_after_single_product', array( 'Listing_Manager_Claims', 'render_button' ) );