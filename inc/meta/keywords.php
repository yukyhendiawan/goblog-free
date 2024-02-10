<?php

/**
 * Adds information meta.
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 */

/**
 * Adds meta property information for the title.
 */
function goblog_free_meta_title() {
	 // Checks if it is the front page.
	if ( is_front_page() ) {
		echo "<meta property='keywords' content='" . esc_html( get_bloginfo( 'title' ) ) . "'>";
	} elseif ( is_archive() ) {
		// Checks if it is an archive page.
		echo "<meta property='keywords' content='Archive'>";
	} elseif ( is_single() || is_page() ) {
		// Checks if it is a single post or a page.
		echo "<meta property='keywords' content='" . esc_html( get_the_title() ) . "'>";
	} else {
		// Default case.
		echo "<meta property='keywords' content='" . esc_html( get_bloginfo( 'title' ) ) . "'>";
	}
}
add_action( 'wp_head', 'goblog_free_meta_title' );
