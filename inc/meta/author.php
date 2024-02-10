<?php

/**
 * Adds meta information.
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 */

/**
 * Adds meta property information for the author.
 */
function goblog_free_meta_author() {
	// Checks if it is a single post or a page.
	if ( is_single() || is_page() ) {

		global $post;
		$author_id = $post->post_author;

		// Outputs the meta property for the author.
		echo "<meta property='author' content='" . get_the_author_meta( 'display_name', $author_id ) . "'>";
	}
}
add_action( 'wp_head', 'goblog_free_meta_author' );
