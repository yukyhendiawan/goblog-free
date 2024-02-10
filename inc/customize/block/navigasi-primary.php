<?php
/**
 * Goblog Free Add Customizer navigasi primary.
 *
 * @package Goblog Free
 * @since 1.0.0
 */

/**
 * Register customizer settings and controls for primary navigation.
 *
 * @param WP_Customize_Manager $wp_customize WordPress Customizer Manager.
 */
function goblog_free_customizer_navigasi_primary( $wp_customize ) {

	// Section
	$wp_customize->add_section(
		'navigasi_primary',
		array(
			'title'           => __( 'Navigasi Primary', 'goblog-free' ),
			'priority'        => 210,
			'active_callback' => 'goblog_free_callback_navigasi_primary',
		)
	);

	// Callback
	function goblog_free_callback_navigasi_primary() {
		if ( has_nav_menu( 'goblog-free-primary' ) ) {
			return true;
		}
	}

	// =================== Background Color ===================
	// Setting
	$wp_customize->add_setting(
		'bg_navigasi_primary',
		array(
			'default'           => '#092228',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bg_navigasi_primary',
			array(
				'label'    => __( 'Background Color', 'goblog-free' ),
				'section'  => 'navigasi_primary',
				'settings' => 'bg_navigasi_primary',
			)
		)
	);

	// =================== Color Link ===================
	// Setting
	$wp_customize->add_setting(
		'color_navigasi_primary',
		array(
			'default'           => '#ccc',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_navigasi_primary',
			array(
				'label'    => __( 'Color Link', 'goblog-free' ),
				'section'  => 'navigasi_primary',
				'settings' => 'color_navigasi_primary',
			)
		)
	);

	// =================== Color Link Hover ===================
	// Setting
	$wp_customize->add_setting(
		'color_link_hover_navigasi_primary',
		array(
			'default'           => '#278cf1',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_link_hover_navigasi_primary',
			array(
				'label'    => __( 'Color Link Hover', 'goblog-free' ),
				'section'  => 'navigasi_primary',
				'settings' => 'color_link_hover_navigasi_primary',
			)
		)
	);

	// =================== Color Icon Search ===================
	// Setting
	$wp_customize->add_setting(
		'color_icon_navigasi_primary',
		array(
			'default'           => '#fff',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_icon_navigasi_primary',
			array(
				'label'    => __( 'Color Icon Search', 'goblog-free' ),
				'section'  => 'navigasi_primary',
				'settings' => 'color_icon_navigasi_primary',
			)
		)
	);

	// =================== Height ===================
	// Setting
	$wp_customize->add_setting(
		'height_navigasi_primary',
		array(
			'default'           => 31,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Range(
			$wp_customize,
			'height_navigasi_primary',
			array(
				'label'   => __( 'Height: ( 31 )', 'goblog-free' ),
				'min'     => 20,
				'max'     => 70,
				'step'    => 1,
				'section' => 'navigasi_primary',
			)
		)
	);

	// =================== Font Size ===================
	// Setting
	$wp_customize->add_setting(
		'font_size_link_navigasi_primary',
		array(
			'default'           => 17,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Range(
			$wp_customize,
			'font_size_link_navigasi_primary',
			array(
				'label'   => __( 'Font Size: ( 17 )', 'goblog-free' ),
				'min'     => 13,
				'max'     => 25,
				'step'    => 1,
				'section' => 'navigasi_primary',
			)
		)
	);

	// =================== Font Size Icon Search ===================
	// Setting
	$wp_customize->add_setting(
		'font_size_icon_search_navigasi_primary',
		array(
			'default'           => 20,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Range(
			$wp_customize,
			'font_size_icon_search_navigasi_primary',
			array(
				'label'   => __( 'Font Size Icon Search: ( 20 )', 'goblog-free' ),
				'min'     => 13,
				'max'     => 25,
				'step'    => 1,
				'section' => 'navigasi_primary',
			)
		)
	);
}
add_action( 'customize_register', 'goblog_free_customizer_navigasi_primary' );
