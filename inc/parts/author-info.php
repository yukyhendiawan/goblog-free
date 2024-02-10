<?php

/**
 * Template part for displaying the author template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 * @version 1.0
 */

?>
<div class="author-box">
	<div class="author-img">
		<?php // Display the author avatar. ?>
		<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
	</div>
	<div class="author-info">
		<h4>
			<?php 
			// Get the author posts URL and display the author name as a link.
			$author = get_author_posts_url( get_the_author_meta( 'ID' ) );
			echo '<a class="author" href="' . esc_url( $author ) . '">' . esc_html( get_the_author() ) . '</a>';
			?>
		</h4>
		<?php // Display the author's description. ?>
		<p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
	</div>
</div>
