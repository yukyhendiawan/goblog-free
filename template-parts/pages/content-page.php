<?php
/**
 * Template part for displaying page content.
 *
 * This template part is used to display the content of individual pages.
 * It includes the page title, breadcrumb, and content.
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
		<?php the_title( '<h1 class="title-page">', '</h1>' ); ?>
	</header>
	<section class="the-content the-content-page">
		<?php the_content(); ?>
		<?php goblog_free_display_pagination_page(); ?>
	</section>
</article>
