<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'vosio_setup_theme' );
add_action( 'after_setup_theme', 'vosio_load_default_hooks' );


function vosio_setup_theme() {

	load_theme_textdomain( 'vosio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'post', 'page-attributes' );
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'vosio_370x280', 370, 280, true ); //vosio_370x280 Our services
	add_image_size( 'vosio_373x400', 373, 400, true ); //vosio_373x400 Our Team
	add_image_size( 'vosio_878x570', 878, 570, true ); //vosio_878x570 Our Project V2
	add_image_size( 'vosio_354x296', 354, 296, true ); //vosio_354x296 Our Project V3
	add_image_size( 'vosio_329x488', 329, 488, true ); //vosio_329x488 Our Project V4
	add_image_size( 'vosio_79x79', 79, 79, true ); //vosio_79x79 Our Project V7 Thumb Image
	add_image_size( 'vosio_681x595', 681, 595, true ); //vosio_681x595 Our Project V8
	add_image_size( 'vosio_700x568', 700, 568, true ); //vosio_700x568 Our Project Detail
	add_image_size( 'vosio_376x266', 376, 266, true ); //vosio_376x266 Latest News
	add_image_size( 'vosio_87x87', 87, 87, true ); //vosio_87x87 Sidebar Blog Posts
	add_image_size( 'vosio_524x349', 524, 349, true ); //vosio_524x349 Sidebar Blog Gallery Posts
	add_image_size( 'vosio_1170x395', 1170, 395, true ); //vosio_1170x395 Blog Single
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'vosio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'vosio_admin_init', 2000000 );
}

/**
 * [vosio_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function vosio_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [vosio_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function vosio_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'vosio' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'vosio' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'vosio' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title"><h5><span>',
		'after_title'   => '</span></h5></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'vosio'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'vosio'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="sidebar-title"><h5><span>',
		'after_title' => '</span></h5></div>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'vosio' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'vosio' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h5><span>',
	  'after_title' => '</span></h5></div>'
	));
	}
	if ( ! is_object( vosio_WSH() ) ) {
		return;
	}

	$sidebars = vosio_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( vosio_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-title"><h5><span>',
			'after_title'   => '</span></h5></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'vosio_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function vosio_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'vosio' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'vosio' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'vosio' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'vosio' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'vosio' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'vosio' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'vosio' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'vosio' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'vosio' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'vosio_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function vosio_enqueue_scripts() {
	$options = vosio_WSH()->option();
	
	if( $options->get( 'main_color_scheme' ) ){
		$maincolor = str_replace( '#', '' , $options->get( 'main_color_scheme' ));
		
	}else{
		$maincolor = str_replace( '#', '' , '#F68A0A' );
	}
	if( $options->get( 'secondary_color_scheme' ) ){
		$secondcolor = str_replace( '#', '' , $options->get( 'secondary_color_scheme' ));
	}
	else{
		$secondcolor = str_replace( '#', '' , '#171818' );	
	}
	
    //styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'vosio-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
	wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/css/simple-line-icons.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'smooth-scrollbar', get_template_directory_uri() . '/assets/css/smooth-scrollbar.css' );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/assets/css/scrollbar.css' );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'vosio-main', get_stylesheet_uri() );
	wp_enqueue_style( 'vosio-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'vosio-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'vosio-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_style( 'vosio-tut', get_template_directory_uri() . '/assets/css/tut.css' );
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri().'/assets/js/mixitup.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'smooth-scrollbar', get_template_directory_uri().'/assets/js/smooth-scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'vosio-cursor-script', get_template_directory_uri().'/assets/js/cursor-script.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bxslider', get_template_directory_uri().'/assets/js/bxslider.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'mousewheel', get_template_directory_uri().'/assets/js/mousewheel.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'vosio-main-custom-script', get_template_directory_uri().'/assets/js/custom-script.js', array('jquery'), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'vosio_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function vosio_fonts_url() {
	
	$fonts_url = '';
	
		
		$font_families['Cairo']      = 'Cairo:wght@300,400,500,600,700,800,900&display=swap';
		$font_families['Khula']      = 'Khula:wght@300,400,600,700,800&display=swap';
		$font_families['Montserrat'] = 'Montserrat:ital,wght@300,400,500,600,700,800&display=swap';
		
		$font_families = apply_filters( 'VOSIO/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function vosio_theme_styles() {
    wp_enqueue_style( 'vosio-theme-fonts', vosio_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'vosio_theme_styles' );
add_action( 'admin_enqueue_scripts', 'vosio_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) vosio_set function

/**
 * [vosio_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'vosio_set' ) ) {
	function vosio_set( $var, $key, $def = '' ) {

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) vosio_add_editor_styles function

function vosio_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'vosio_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = vosio_WSH()->option(); 
if( vosio_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}
