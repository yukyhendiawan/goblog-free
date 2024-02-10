<?php

/**
 * Goblog Free Theme Customizer.
 *
 * @package Goblog Free
 * @since 1.0.0
 */

/**
 * Register Theme Customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function goblog_free_default_customize_register( $wp_customize ) {
	// Enable live preview for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add selective refresh for site title.
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.header-name h1',
			'render_callback' => 'goblog_free_customize_partial_blogname',
		)
	);

	// Add selective refresh for site description.
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.header-description p',
			'render_callback' => 'goblog_free_customize_partial_blogdescription',
		)
	);
}

// Hook to customize_register action.
add_action( 'customize_register', 'goblog_free_default_customize_register' );

/**
 * Render site title for selective refresh partial.
 *
 * @since Goblog Free 1.0.0
 * @see goblog_free_default_customize_register()
 *
 * @return void
 */
function goblog_free_customize_partial_blogname() {
	 bloginfo( 'name' );
}

/**
 * Render site tagline for selective refresh partial.
 *
 * @since Goblog Free 1.0.0
 * @see goblog_free_default_customize_register()
 *
 * @return void
 */
function goblog_free_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
