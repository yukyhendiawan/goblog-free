<?php

/**
 * Goblog Free Add Customizer typography.
 *
 * @package Goblog Free
 * @since 1.0.0
 */

/**
 * Register customizer settings and controls for typography.
 *
 * @param WP_Customize_Manager $wp_customize WordPress Customizer Manager.
 */
function goblog_free_customizer_typography( $wp_customize ) {

	// Section
	$wp_customize->add_section(
		'typography',
		array(
			'title'    => __( 'Typography', 'goblog-free' ),
			'priority' => 230,
		)
	);

	// =================== Typography ===================
	// Setting
	$wp_customize->add_setting(
		'google_font',
		array(
			'default'           => 'Roboto',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_html',
		)
	);

	// Control
	$wp_customize->add_control(
		'google_font',
		array(
			'label'       => __( 'Select Font Type: ', 'goblog-free' ),
			'section'     => 'typography',
			'type'        => 'text',
			'input_attrs' => array(
				'disabled'    => '',
				'readonly'    => '',
				'class'       => 'type-input-text',
				'style'       => 'border: 1px solid #f5f5f5',
				'placeholder' => __( 'Select Font', 'goblog-free' ),
			),
		)
	);

	// =================== Color H1 ===================
	// Setting
	$wp_customize->add_setting(
		'color_h1',
		array(
			'default'           => '#3a444d',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_h1',
			array(
				'label'    => __( 'Color H1', 'goblog-free' ),
				'section'  => 'typography',
				'settings' => 'color_h1',
			)
		)
	);

	// =================== Color H2 ===================
	// Setting
	$wp_customize->add_setting(
		'color_h2',
		array(
			'default'           => '#3a444d',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_h2',
			array(
				'label'    => __( 'Color H2', 'goblog-free' ),
				'section'  => 'typography',
				'settings' => 'color_h2',
			)
		)
	);

	// =================== Color H3 ===================
	// Setting
	$wp_customize->add_setting(
		'color_h3',
		array(
			'default'           => '#3a444d',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_h3',
			array(
				'label'    => __( 'Color H3', 'goblog-free' ),
				'section'  => 'typography',
				'settings' => 'color_h3',
			)
		)
	);

	// =================== Color H4 ===================
	// Setting
	$wp_customize->add_setting(
		'color_h4',
		array(
			'default'           => '#3a444d',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_h4',
			array(
				'label'    => __( 'Color H4', 'goblog-free' ),
				'section'  => 'typography',
				'settings' => 'color_h4',
			)
		)
	);

	// =================== Color H5 ===================
	// Setting
	$wp_customize->add_setting(
		'color_h5',
		array(
			'default'           => '#3a444d',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_h5',
			array(
				'label'    => __( 'Color H5', 'goblog-free' ),
				'section'  => 'typography',
				'settings' => 'color_h5',
			)
		)
	);

	// =================== Color H6 ===================
	// Setting
	$wp_customize->add_setting(
		'color_h6',
		array(
			'default'           => '#3a444d',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_h6',
			array(
				'label'    => __( 'Color H6', 'goblog-free' ),
				'section'  => 'typography',
				'settings' => 'color_h6',
			)
		)
	);
}
add_action( 'customize_register', 'goblog_free_customizer_typography' );
