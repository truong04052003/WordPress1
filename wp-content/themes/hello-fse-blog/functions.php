<?php
/**
 * Hello FSE functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hello FSE
 */

if ( ! defined( 'HELLO_FSE_BLOG_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'HELLO_FSE_BLOG_VERSION', wp_get_theme()->get( 'Version' ) );
	
}

if ( ! function_exists( 'hello_fse_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hello_fse_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Hello FSE, use a find and replace
		 * to change 'hello-fse-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hello-fse-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'align-wide' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		// add_editor_style( 'style.css' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Experimental support for adding blocks inside nav menus
		add_theme_support( 'block-nav-menus' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Register nav menus.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Navigation', 'hello-fse-blog' ),
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'hello_fse_blog_setup' );

/**
 * Theme default options.
 *
 * @return array
 */
function hello_fse_blog_default_options() {
	return array(
		'site_primary_color'     => '#00A9A4',
		'global_primary_font'    => 'Oswald',
	);
}

if ( ! function_exists( 'hello_fse_blog_fonts_url' ) ) :
	/**
	 * Register Google fonts for Hello FSE
	 *
	 * Create your own hello_fse_blog_fonts_url() function to override in a child theme.
	 *
	 * @since 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function hello_fse_blog_fonts_url() {
		$fonts_url = '';

		/* Translators: If there are characters in your language that are not
		* supported by Poppins, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$font_families = array( 
				'Oswald:wght@200;300;400;500;600;700&display=swap',
				'Oxygen:wght@300;400;700&display=swap',
				'Arizonia&display=swap',
			 );

		if ( ! empty( $font_families ) ) {

			$query_args = array(
				'family' => implode( '&family=', $font_families ), 
				'display' => 'swap',
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
		}

		if ( ! class_exists( 'WPTT_WebFont_Loader' ) ) {
			// Load Google fonts from Local.
			require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		}

		return esc_url( wptt_get_webfont_url( $fonts_url ) );
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function hello_fse_blog_scripts() {
	$min  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// Register theme stylesheet.
	$theme_version = wp_get_theme()->get( 'Version' );


	$deps = array( 'dashicons' );
	global $wp_styles;
	if ( in_array( 'wc-blocks-vendors-style', $wp_styles->queue ) ) {
		$deps[] = 'wc-blocks-vendors-style';
	}

	wp_enqueue_style( 'hello-fse-blog-fonts', hello_fse_blog_fonts_url(), array(), null );
	wp_enqueue_style( 'hello-fse-blog-style', get_stylesheet_uri(), $deps, date( 'Ymd-Gis', filemtime( get_theme_file_path( 'style.css' ) ) ) );
	wp_style_add_data( 'hello-fse-blog-style', 'rtl', 'replace' );

}
add_action( 'wp_enqueue_scripts', 'hello_fse_blog_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function hello_fse_blog_admin_scripts() {
	$min  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// Register theme stylesheet.
	$theme_version = wp_get_theme()->get( 'Version' );

	$deps = array();

	// FontAwesome.
	wp_enqueue_style( 'hello-fse-blog-admin-style', get_stylesheet_directory_uri() . '/css/admin-style.css', $deps, date( 'Ymd-Gis', filemtime( get_theme_file_path( 'style.css' ) ) ) );

}
add_action( 'admin_enqueue_scripts', 'hello_fse_blog_admin_scripts' );

function hello_fse_blog_block_assets() {
	
}
add_action( 'enqueue_block_assets', 'hello_fse_blog_block_assets' );

add_action( 'hello-fse-blog-pro-link', function() {
	return "https://sparklewpthemes.com/wordpress-themes/hello-fse/";
} );
/**
 *
 * Enqueue scripts and styles.
 */
function hello_fse_blog_editor_styles() {
	// Enqueue editor styles.
	add_editor_style(
		array(
			hello_fse_blog_fonts_url(),
		)
	);
}
add_action( 'admin_init', 'hello_fse_blog_editor_styles' );

/**
 * Load core file.
 */
require_once get_template_directory() . '/inc/core/init.php';
/**
 * Welcome Page.
 */
require get_template_directory() . '/inc/welcome/welcome.php';