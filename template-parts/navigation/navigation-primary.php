<?php
/**
 * Displays the primary navigation.
 *
 * This template part is responsible for rendering the primary navigation menu.
 * It includes the site logo, navigation menus, search functionality, and burger menu toggle.
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 * @version 1.0.0
 */
?>

<nav id="primary1" class="primary1" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<div id="container-primary1" class="container-primary1">

		<div id="box-menu" class="box-menu">
			<!-- Box Menu -->

			<!-- Logo Nav Desktop -->
			<div class="logo-nav logo-nav-desktop">
				<?php the_custom_logo(); ?>
			</div>

			<!-- Toggle Burger -->
			<button id="toggle-burger-mobile" class="toggle-burger-mobile">
				<span class="screen-reader-text"><?php esc_html_e( 'burger', 'goblog-free' ); ?></span>
				<i id="font-nav-bar" class="fas fa-bars"></i>
			</button>

			<!-- Menus -->
			<?php 
			if ( has_nav_menu( 'goblog-free-primary' ) ) :
				wp_nav_menu(
					array(
						'container'      => false,
						'theme_location' => 'goblog-free-primary',
					)
				);
			endif; 
			?>

			<!-- Logo Nav Mobile -->
			<div class="logo-nav logo-nav-mobile">
				<?php the_custom_logo(); ?>
			</div>

			<!-- Toggle Search -->
			<button class="toggle-icon-search box-search-open">
				<span class="screen-reader-text"><?php esc_html_e( 'search', 'goblog-free' ); ?></span>
				<i class="fas fa-search"></i>
			</button>

		</div> <!-- End Box Menu -->

		<div class="container-search-full">
			<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="box-search-close">
					<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
				</div>
				<div class="box-search-btn">
					<input type="text" class="search-input" placeholder="<?php echo esc_attr_x( 'Search Here...', 'placeholder', 'goblog-free' ); ?>" value="<?php echo esc_html( get_search_query() ); ?>" name="s">
					<div class="btn-group">
						<button type="submit" class="search-submit">
							<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'goblog-free' ); ?></span>
							<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
						</button>
					</div>
				</div>
			</form>
		</div>

	</div> <!-- End container-primary1 -->
</nav> <!-- End primary1 -->
