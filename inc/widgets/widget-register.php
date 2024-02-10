<?php
/**
 * Register widget areas and widgets.
 *
 * @link https://developer.wordpress.org/themes/functionality/
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 */
function goblog_free_widgets_register() { 
	// Front Page
	register_sidebar(
		array(
			'name'          => __( 'Front Page', 'goblog-free' ),
			'id'            => 'goblog-free-front',
			'description'   => __( 'Valid only for light blue widgets', 'goblog-free' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-tilte-sidebar">',
			'after_title'   => '</h4>',
		)
	);

	// Sidebar
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'goblog-free' ),
			'id'            => 'goblog-free-sidebar1',
			'description'   => __( 'This is to display the sidebar on the blog', 'goblog-free' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-tilte-sidebar">',
			'after_title'   => '</h4>',
		)
	);

	// Footer 1
	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'goblog-free' ),
			'id'            => 'goblog-free-footer1',
			'description'   => __( 'Footeer section #1', 'goblog-free' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title-footer">',
			'after_title'   => '</h4>',
		)
	);

	// Footer 2
	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'goblog-free' ),
			'id'            => 'goblog-free-footer2',
			'description'   => __( 'Footeer section #2', 'goblog-free' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title-footer">',
			'after_title'   => '</h4>',
		)
	);

	// Footer 3
	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'goblog-free' ),
			'id'            => 'goblog-free-footer3',
			'description'   => __( 'Footeer section #3', 'goblog-free' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title-footer">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'goblog_free_widgets_register' );

// Register widgets
function goblog_free_widgets_init() {
	// Categories Grid
	register_widget( 'Goblog_Free_Grids_Categories' );
	
	// Order Grid
	register_widget( 'Goblog_Free_Grids_Order' );

	// Tags Grid
	register_widget( 'Goblog_Free_Grids_Tags' );

	// About Me
	register_widget( 'Goblog_Free_Aboutme_Widget' );

	// Ads
	register_widget( 'Goblog_Free_Widget_Ads' );

	// Fans Page
	register_widget( 'Goblog_Free_Fans_Page' );

	// Blog Posts Order
	register_widget( 'Goblog_Free_Widget_Blog_Posts_Order' );
}
add_action( 'widgets_init', 'goblog_free_widgets_init' );

