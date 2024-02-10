<?php
/**
 * Template part for displaying the layout of posts and pages.
 *
 * This template part is responsible for rendering the layout used in displaying recent posts.
 * It includes the post title, categories, publication information, excerpt, and thumbnail.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 * @version 1.0.0
 */
?>

<div class="grids grids1">
	<div class="name-post">
		<h2 class="title-home"><?php echo __( 'Recent Post', 'goblog-free' ); ?></h2>
	</div>
	<?php if ( have_posts() ) : ?>
		<?php 
		while ( have_posts() ) :
			the_post(); 
			?>
			<div class="box-content">
				<div class="content">
					<div class="categoris">
						<?php goblog_free_display_category(); ?>
					</div>
					<?php goblog_free_display_title_post(); ?>
					<div class="box-content-info">
						<?php goblog_free_display_content_info(); ?>
					</div>
					<p><?php echo goblog_free_get_excerpt(); ?></p>
				</div>
				<div class="content-gambar">
					<?php goblog_free_display_thumbnail_post(); ?>
				</div>
			</div>
			<?php
		endwhile;
		goblog_free_display_pagination_default();
	else :
		get_template_part( 'template-parts/none/no', 'post' );
	endif; 
	?>
</div>
