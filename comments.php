<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 * @version 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password, we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<p class="comments-title">
			<?php
			$comments_number = absint( get_comments_number() );
			if ( '1' === $comments_number ) {
				echo '<p class="comment-title">' . __( 'Comment ', 'goblog-free' ) . $comments_number . '</p>';
			} else {
				echo _nx(
					'Comment ',
					'Comments ',
					$comments_number,
					'comments title',
					'goblog-free'
				) . $comments_number;
			}
			?>
		</p>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 60,
				)
			);
			?>
		</ol>
		<?php
		the_comments_navigation();
	endif; // end have comments
	?>

	<?php
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments">
			<?php esc_html_e( 'Comments are closed.', 'goblog-free' ); ?>
		</p>
		<?php
	endif;
	comment_form();
	?>
</div>
