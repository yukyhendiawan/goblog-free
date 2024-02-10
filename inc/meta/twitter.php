<?php

/**
 * Adds information meta.
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 */

/**
 * Adds meta property information for Twitter.
 */
function goblog_free_meta_sosmed_twitter() {
	// Checks if it is the front page or the home page.
	if ( is_front_page() || is_home() ) :

		$args = array(
			'posts_per_page' => 1,
		);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) :

			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				// Checks if it is the first post in the loop.
				if ( $the_query->current_post == 0 ) {
					$url = get_the_post_thumbnail_url();
					?>
					<meta name="twitter:card" content="summary">
					<meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>">
					<meta name="twitter:title" content="<?php bloginfo( 'name' ); ?>">
					<meta name="twitter:image" content="<?php echo esc_url( $url ); ?>">
					<?php
				}
			endwhile;
			wp_reset_postdata();

		endif;
	endif;
}
add_action( 'wp_head', 'goblog_free_meta_sosmed_twitter' );

/**
 * Adds meta property information for Twitter on single posts.
 */
function goblog_free_meta_sosmed_twitter_single() {
	 // Checks if it is a single post.
	if ( is_single() ) : 
		?>
		<meta name="twitter:card" content="summary">
		<meta name="twitter:description" content="<?php echo esc_html( goblog_free_get_excerpt() ); ?>">
		<meta name="twitter:title" content="<?php the_title(); ?>">
		<meta name="twitter:image" content="<?php goblog_free_content_thumbnail_sosmed(); ?>">
		<?php 
endif;
}
add_action( 'wp_head', 'goblog_free_meta_sosmed_twitter_single' );
