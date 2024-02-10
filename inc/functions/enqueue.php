<?php
/**
 * Enqueues scripts and styles.
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 */

/**
 * Register and enqueue scripts and styles.
 */
function goblog_free_enqueue_scripts() { 
	// Enqueue main stylesheet
	wp_enqueue_style( 'goblog-free-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Enqueue responsive styles based on screen width
	wp_enqueue_style( 'goblog-free-responsive-992', get_template_directory_uri() . '/assets/css/responsive-992.css', array(), '1.0.0', '(max-width: 992px)' );
	wp_enqueue_style( 'goblog-free-responsive-768', get_template_directory_uri() . '/assets/css/responsive-768.css', array(), '1.0.0', '(max-width: 768px)' );
	wp_enqueue_style( 'goblog-free-responsive-600', get_template_directory_uri() . '/assets/css/responsive-600.css', array(), '1.0.0', '(max-width: 600px)' );
	wp_enqueue_style( 'goblog-free-responsive-480', get_template_directory_uri() . '/assets/css/responsive-480.css', array(), '1.0.0', '(max-width: 480px)' );
	wp_enqueue_style( 'goblog-free-responsive-400', get_template_directory_uri() . '/assets/css/responsive-400.css', array(), '1.0.0', '(max-width: 400px)' );

	// Enqueue Font Awesome
	wp_enqueue_style( 'goblog-free-font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/all.min.css', array(), '5.15.4', 'all' );

	// Remove WP Block Library styles
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );

	// Enqueue myscripts
	wp_enqueue_script( 'goblog-free-myscripts', get_template_directory_uri() . '/assets/js/myscripts.js', array(), '1.0.0', true );

	// Enqueue skip link focus fix script
	wp_enqueue_script( 'goblog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20200827', true );

	// Enqueue comment-reply script if applicable
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Load the html5 shiv script for older versions of Internet Explorer
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'goblog_free_enqueue_scripts' );

/**
 * Enqueue custom admin styles for the 'goblog-free' appearance page.
 */
function goblog_free_admin_enqueue_scripts( $hook ) {
	// Enqueue style.
	wp_enqueue_style( 'goblog-free-style-admin-global', get_template_directory_uri() . '/assets/css/admin-global.min.css', array(), '1.0.0', 'all' );

	// Enqueue script.
	wp_enqueue_script( 'goblog-free-script-admin-global', get_template_directory_uri() . '/assets/js/admin-global.js', array( 'jquery' ), '1.0.0', true );

	wp_localize_script( 'goblog-free-script-admin-global', 'ajax_object', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	));	

    // Check if the current admin page is the 'goblog-free' appearance page.
    if ( 'appearance_page_goblog-free' === $hook ) {
        // Enqueue style.
        wp_enqueue_style( 'goblog-free-style-submenu', get_template_directory_uri() . '/assets/css/admin-submenu.min.css', array(), '1.0.0', 'all' );

        // Enqueue script.
		wp_enqueue_script( 'goblog-free-script-submenu', get_template_directory_uri() . '/assets/js/admin-submenu.min.js', array( 'jquery' ), '1.0.0', true );		
    }
}
add_action( 'admin_enqueue_scripts', 'goblog_free_admin_enqueue_scripts' );

/**
 * Enqueues styles for the block-based editor.
 */
function goblog_free_block_editor_styles() {
	// Enqueue block editor styles
	wp_enqueue_style( 'goblog-free-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ), array(), '1.0' );
}
add_action( 'enqueue_block_editor_assets', 'goblog_free_block_editor_styles' );
