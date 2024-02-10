<?php

/**
 * Adds information meta.
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 */

/**
 * Adds meta description for the front page.
 */
function goblog_free_meta_description() {
	// Checks if it is the front page or the home page.
	if ( is_front_page() || is_home() ) {
		echo "<meta name='description' content='" . esc_html( get_bloginfo( 'description' ) ) . "'>";
	}
}
add_action( 'wp_head', 'goblog_free_meta_description' );

/**
 * Adds meta description for archive pages.
 */
function goblog_free_meta_description_archive() {
	if ( is_archive() ) :
		if ( ! empty( get_the_archive_description() ) ) {
			$content = get_the_archive_description(); ?>
			<meta name="description" content="<?php echo strip_tags( $content ); ?>">
			<?php
		} elseif ( empty( get_the_archive_description() ) ) {
			$content = __( 'There is no description in the archive', 'goblog-free' );
			?>
			<meta name="description" content="<?php echo esc_html( $content ); ?>">
			<?php 
		}
	endif;
}
add_action( 'wp_head', 'goblog_free_meta_description_archive' );

/**
 * Adds meta description for single posts.
 */
function goblog_free_meta_description_single() {
	if ( is_single() ) :
		if ( ! empty( get_the_excerpt() ) ) {
			$content = substr( get_the_excerpt(), 0, 158 );
		} elseif ( ! empty( get_the_content() ) ) {
			$content = substr( get_the_content(), 0, 158 );
		} elseif ( empty( get_the_excerpt() ) && empty( get_the_content() ) ) {
			$content = __( 'There are no quotes and content', 'goblog-free' );
		} 
		?>
		<meta name="description" content="<?php echo esc_html( $content ); ?>">
		<?php 
endif;
}
add_action( 'wp_head', 'goblog_free_meta_description_single' );
