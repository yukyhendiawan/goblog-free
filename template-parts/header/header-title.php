<?php
/**
 * Template part for displaying title and description on the front page.
 *
 * This template part is used to display the site title and description on the front page.
 * It also includes optional customization for the header image if it is set.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 * @version 1.0.0
 */

// Get the header text color from theme customization
$header_textcolor = get_theme_mod( 'header_textcolor' );

// Check if it is the front page
if ( is_front_page() ) : ?>

	<section class="container-header-title">
		<div class="header-name">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
		<div class="header-description">
			<p><?php bloginfo( 'description' ); ?></p>
		</div>
	</section>

	<?php // Check if a custom header image is set ?>
	<?php if ( get_header_image() ) : ?>
		<section class="header-custome-image">
			<?php the_custom_header_markup(); ?>
		</section>
	<?php endif; ?>

<?php endif; ?>
