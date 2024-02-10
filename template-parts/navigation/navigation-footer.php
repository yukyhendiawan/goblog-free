<?php
/**
 * Displays the footer navigation menu.
 *
 * This template part is responsible for rendering the footer navigation menu.
 * It uses the 'goblog-free-footer' theme location to retrieve the menu items.
 *
 * @package Goblog Free
 * @since Goblog Free 1.0.0
 * @version 1.0.0
 */
?>
<div class="footer-menu">
	<?php
	wp_nav_menu(
		array(
			'container'      => false,
			'depth'          => 1,
			'theme_location' => 'goblog-free-footer',
		)
	);
	?>
</div>
