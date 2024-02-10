<?php
/**
 * Goblog Free Add Customizer single.
 *
 * @package Goblog Free
 * @since 1.0.0
 */

/**
 * Register customizer settings and controls for single post layout.
 *
 * @param WP_Customize_Manager $wp_customize WordPress Customizer Manager.
 */
function goblog_free_customizer_single( $wp_customize ) {

	// Section
	$wp_customize->add_section(
		'single',
		array(
			'title'    => __( 'Single', 'goblog-free' ),
			'priority' => 240,
		)
	);

	// =================== Display Breadcrumb ===================
	// Setting
	$wp_customize->add_setting(
		'display_breadcrumb',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goblog_free_sanitize_switch',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Toggle_Switch(
			$wp_customize,
			'display_breadcrumb',
			array(
				'label'   => __( 'Display Breadcrumb', 'goblog-free' ),
				'section' => 'single',
			)
		)
	);

	// =================== Display Author ===================
	// Setting
	$wp_customize->add_setting(
		'display_author',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goblog_free_sanitize_switch',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Toggle_Switch(
			$wp_customize,
			'display_author',
			array(
				'label'   => __( 'Display Author', 'goblog-free' ),
				'section' => 'single',
			)
		)
	);

	// =================== Display Category ===================
	// Setting
	$wp_customize->add_setting(
		'display_category',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goblog_free_sanitize_switch',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Toggle_Switch(
			$wp_customize,
			'display_category',
			array(
				'label'   => __( 'Display Category', 'goblog-free' ),
				'section' => 'single',
			)
		)
	);

	// =================== Display Date ===================
	// Setting
	$wp_customize->add_setting(
		'display_date',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goblog_free_sanitize_switch',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Toggle_Switch(
			$wp_customize,
			'display_date',
			array(
				'label'   => __( 'Display Date', 'goblog-free' ),
				'section' => 'single',
			)
		)
	);

	// =================== Display Comments ===================
	// Setting
	$wp_customize->add_setting(
		'display_comments',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goblog_free_sanitize_switch',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Toggle_Switch(
			$wp_customize,
			'display_comments',
			array(
				'label'   => __( 'Display Comments', 'goblog-free' ),
				'section' => 'single',
			)
		)
	);

	// =================== Display Featured Image ===================
	// Setting
	$wp_customize->add_setting(
		'display_featured_image',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goblog_free_sanitize_switch',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Toggle_Switch(
			$wp_customize,
			'display_featured_image',
			array(
				'label'   => __( 'Display Featured Image', 'goblog-free' ),
				'section' => 'single',
			)
		)
	);

	// =================== Display Social Share ===================
	// Setting
	$wp_customize->add_setting(
		'display_social_share',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goblog_free_sanitize_switch',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Toggle_Switch(
			$wp_customize,
			'display_social_share',
			array(
				'label'   => __( 'Display Social Media Share', 'goblog-free' ),
				'section' => 'single',
			)
		)
	);

	// =================== Layout Single ===================
	// Setting
	$wp_customize->add_setting(
		'layout_single',
		array(
			'default'           => 'layout1',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goblog_free_sanitize_radio_image',
		)
	);

	// Control
	$wp_customize->add_control(
		new Goblog_Free_Customize_Radio_Image(
			$wp_customize,
			'layout_single',
			array(
				'label'   => __( 'Layout Single', 'goblog-free' ),
				'section' => 'single',
				'choices' => array(
					'layout1' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customize/assets/images/single/single1.png',
						'name'  => __( 'post1', 'goblog-free' ),
						'readonly',
						'disabled',
					),
					'layout2' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customize/assets/images/single/single2.png',
						'name'  => __( 'post2', 'goblog-free' ),
						'readonly',
						'disabled',
					),
					'layout3' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customize/assets/images/single/single3.png',
						'name'  => __( 'post3', 'goblog-free' ),
						'readonly',
						'disabled',
					),
					'layout4' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customize/assets/images/single/single4.png',
						'name'  => __( 'post4', 'goblog-free' ),
						'readonly',
						'disabled',
					),
					'layout5' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customize/assets/images/single/single5.png',
						'name'  => __( 'post5', 'goblog-free' ),
						'readonly',
						'disabled',
					),
				),
			)
		)
	);
}
add_action( 'customize_register', 'goblog_free_customizer_single' );
