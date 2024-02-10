<?php

/**
 * Goblog Free Custom Header Style Customizer.
 *
 * @package Goblog Free
 * @since 1.0.0
 */

/**
 * Enqueue styles for custom header.
 */
function goblog_free_style_custom_header() {
	// Enqueue main stylesheet.
	wp_enqueue_style( 'goblog-free-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Set default color for site title.
	$color_site_title = ( get_header_textcolor() == 'blank' ) ? '#3a444d' : '#' . sanitize_hex_color_no_hash( get_header_textcolor() );

	// Custom header styles.
	$custom_header = "section.container-header-title h1 a, section.container-header-title h1, section.container-header-title p { color: $color_site_title; }";

	// Add inline styles.
	wp_add_inline_style( 'goblog-free-style', $custom_header );
}

// Hook to enqueue custom header styles.
add_action( 'wp_enqueue_scripts', 'goblog_free_style_custom_header' );
