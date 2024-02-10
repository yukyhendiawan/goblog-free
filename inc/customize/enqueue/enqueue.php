<?php

/**
 * Enqueues scripts and styles for theme customization.
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 */

/**
 * Enqueue script for customizer preview.
 */
function goblog_free_customize_preview() {
	// Enqueue the customize-preview.js script.
	wp_enqueue_script( 'goblog-free-customize-preview', get_theme_file_uri( '/inc/customize/assets/js/customize-preview.js' ), array( 'customize-preview' ), '20200627', true );
}
add_action( 'customize_preview_init', 'goblog_free_customize_preview' );

/**
 * Enqueue custom styles for the customizer controls.
 */
function goblog_free_customize_controls_css() {
	 // Enqueue the customize.css stylesheet.
	wp_enqueue_style( 'goblog-free-customize', get_theme_file_uri( '/inc/customize/assets/css/customize.css' ) );
}
add_action( 'customize_controls_print_styles', 'goblog_free_customize_controls_css' );
