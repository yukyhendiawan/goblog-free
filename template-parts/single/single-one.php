<?php

/**
 * Template part for displaying single posts
 *
 * This template part is responsible for displaying the content of single posts.
 * It includes the post title, breadcrumb, featured image, content, tags, and pagination.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 * @version 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php echo esc_html( goblog_free_breadcrumb() ); ?>
		<?php the_title( '<h1 class="single">', '</h1>' ); ?>
		<div class="single-info">
			<?php goblog_free_display_content_info_single(); ?>
		</div>
	</header>
	<section class="container-content">
		<div class="thumbnail-single">
			<?php goblog_free_display_featured_image1(); ?>
		</div>
		<div class="the-content">
			<?php the_content(); ?>
			<div class="tags">
				<?php the_tags( '<span class="tags-title">Tags: </span>', '', '' ); ?>
			</div>
		</div>
		<?php goblog_free_display_pagination_single(); ?>
		<?php echo '<hr>'; ?>
		<?php get_template_part( 'inc/parts/social', 'share' ); ?>
	</section>
	<footer class="single">
		<?php get_template_part( 'inc/parts/author', 'info' ); ?>
	</footer>
</article>
