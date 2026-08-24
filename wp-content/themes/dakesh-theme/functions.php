<?php
/**
 * Dakesh Theme - Child of Hello Elementor
 *
 * A zero-override child theme that inherits Hello Elementor's
 * blank-slate architecture for perfect Elementor compatibility.
 *
 * @package DakeshTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue parent theme stylesheet.
 */
function dakesh_theme_enqueue_styles() {
	wp_enqueue_style(
		'hello-elementor',
		get_template_directory_uri() . '/style.css',
		[],
		wp_get_theme( 'hello-elementor' )->get( 'Version' )
	);

	wp_enqueue_style(
		'dakesh-theme',
		get_stylesheet_uri(),
		[ 'hello-elementor' ],
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'dakesh_theme_enqueue_styles' );
