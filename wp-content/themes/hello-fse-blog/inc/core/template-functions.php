<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Hello FSE
 */

/**
 * Add customizer default values.
 *
 * @param array $default_options
 * @return array
 */
function hello_fse_blog_customizer_add_defaults( $default_options) {
	$defaults = array(
		// Excerpt Options
		'hello_fse_blog_excerpt_length'    => 30,
	);


	$updated_defaults = wp_parse_args( $defaults, $default_options );

	return $updated_defaults;
}
add_filter( 'hello_fse_blog_customizer_defaults', 'hello_fse_blog_customizer_add_defaults' );

/**
 * Returns theme mod value saved for option merging with default option if available.
 * @since 1.0
 */
function hello_fse_blog_gtm( $option ) {
	// Get our Customizer defaults
	$defaults = apply_filters( 'hello_fse_blog_customizer_defaults', true );

	return isset( $defaults[ $option ] ) ? get_theme_mod( $option, $defaults[ $option ] ) : get_theme_mod( $option );
}

if ( ! function_exists( 'hello_fse_blog_excerpt_length' ) ) :
	/**
	 * Sets the post excerpt length to n words.
	 *
	 * function tied to the excerpt_length filter hook.
	 * @uses filter excerpt_length
	 */
	function hello_fse_blog_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		// Getting data from Theme Options
		$length	= hello_fse_blog_gtm( 'hello_fse_blog_excerpt_length' );

		return absint( $length );
	} // hello_fse_blog_excerpt_length.
endif;
add_filter( 'excerpt_length', 'hello_fse_blog_excerpt_length', 999 );

if ( ! function_exists( 'hello_fse_blog_footer_copyright' ) ){

    /**
     * Footer Copyright Information
     *
     * @since 1.0.0
     */
    function hello_fse_blog_footer_copyright() {

        echo esc_html( apply_filters( 'hello_fse_blog_copyright_text', $content = esc_html__('Copyright  &copy; ','hello-fse-blog') . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) .' - ' ) );

         printf( ' WordPress Theme : by %1$s', '<a href=" ' . esc_url('https://sparklewpthemes.com/') . ' " rel="designer" target="_blank">'.esc_html__('Sparkle Themes','hello-fse-blog').'</a>' );
    }
}
add_action( 'hello_fse_blog_footer_copyright', 'hello_fse_blog_footer_copyright', 5 );
