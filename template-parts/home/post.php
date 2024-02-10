<?php
/**
 * Template part for displaying layout of posts and pages.
 *
 * This template part is used to determine the layout for displaying posts and pages.
 * It checks if the 'goblog-free-front' sidebar is active and displays its content,
 * otherwise, it falls back to the default layout for blog posts based on the post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 * @version 1.0.0
 */

// Check if the 'goblog-free-front' sidebar is active
if ( is_active_sidebar( 'goblog-free-front' ) ) {
	// Display the content of the 'goblog-free-front' sidebar
	dynamic_sidebar( 'goblog-free-front' );
} else {
	// If the sidebar is not active, fall back to the default layout for blog posts
	get_template_part( 'template-parts/layout/blog/default', get_post_format() );
}
