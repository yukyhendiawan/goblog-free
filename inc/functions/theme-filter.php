<?php
/**
 * Add filters theme.
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 */

/**
 * Filter the categories count widget.
 */
function goblog_free_count_widgets( $links ) {
	// Add span with class 'count' around the category count in widget
	$links = str_replace( '</a> (', '</a> <span class="count">', $links );
	$links = str_replace( ')', '</span>', $links );
	return $links;
}
add_filter( 'wp_list_categories', 'goblog_free_count_widgets' );

/**
 * Replaces "[...]" with a 'Continue reading' link.
 *
 * @since Goblog Free 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function goblog_free_excerpt_more( $link ) {
	// Add 'Continue reading' link to the excerpt with an ellipsis
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Post title. */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'goblog-free' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'goblog_free_excerpt_more' );

/**
 * Filter the cloud widget to set tag cloud size and format.
 */
function goblog_free_tagcloud_size( $args ) {
	// Set tag cloud size and format
	$args['largest']  = 15;
	$args['smallest'] = 15;
	$args['unit']     = 'px';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'goblog_free_tagcloud_size' );

/**
 * Filter archive title based on archive type.
 */
function goblog_free_arhive_title( $title ) {
	// Customize archive title based on archive type
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'goblog-free' ), '<span>' . single_cat_title( '', false ) . '</span>' );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'goblog-free' ), '<span>' . single_tag_title( '', false ) . '</span>' );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'goblog-free' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'goblog-free' ), '<span>' . post_type_archive_title( '', false ) . '</span>' );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'goblog_free_arhive_title' );

/**
 * Disable the use of block editor for widgets.
 */
add_filter( 'use_widgets_block_editor', '__return_false', 9999 );
