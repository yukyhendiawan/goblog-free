<?php

/**
 * Goblog Free Navigasi Primary Style Customizer.
 *
 * @package Goblog Free
 * @since 1.0.0
 */

/**
 * Enqueue styles for Navigasi Primary.
 */
function goblog_free_style_navigasi_primary() {
	 // Enqueue main stylesheet.
	wp_enqueue_style( 'goblog-free-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Get styles from theme mods.
	$backgroundColor = sanitize_hex_color( get_theme_mod( 'bg_navigasi_primary', '#092228' ) );
	$colorLink       = sanitize_hex_color( get_theme_mod( 'color_navigasi_primary', '#ccc' ) );
	$colorLinkHover  = sanitize_hex_color( get_theme_mod( 'color_link_hover_navigasi_primary', '#278cf1' ) );
	$colorIcon       = sanitize_hex_color( get_theme_mod( 'color_icon_navigasi_primary', '#fff' ) );

	// Define Navigasi Primary styles.
	$navigasi_primary = "nav.primary1, nav.primary1 .box-menu, nav.primary1 .primary1-sticky-js, nav.primary1 .toggle-burger-mobile, nav.primary1 .show-box-menu>ul, nav.primary1 .box-menu .sub-menu { background: $backgroundColor; } .primary1 .box-menu > ul > li > a, nav.primary1 .box-menu .sub-menu li, nav.primary1 .box-menu .sub-menu li a, nav.primary1 .toggle-burger-mobile i { color: $colorLink; } nav.primary1 .toggle-burger-mobile i { border-color: $colorLink; } .primary1 .box-menu ul li:hover > a { color: $colorLinkHover} nav.primary1 .toggle-icon-search i {color: $colorIcon}";

	// Add inline styles.
	wp_add_inline_style( 'goblog-free-style', $navigasi_primary );
}

// Hook to enqueue Navigasi Primary styles.
add_action( 'wp_enqueue_scripts', 'goblog_free_style_navigasi_primary' );
