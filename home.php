<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 * @version 1.0.0
 */

get_header();
?>

<main class="main-home main-layout">
	<div class="container-home container-layout">
		<?php get_template_part( 'template-parts/home/post', get_post_format() ); ?>
	</div>
	<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
