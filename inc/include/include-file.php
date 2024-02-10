<?php

/**
 * Include additional breadcrumbs.
 */
require_once get_parent_theme_file_path( '/inc/breadcrumb/breadcrumb.php' );

/**
 * Include additional content classes.
 */
require_once get_parent_theme_file_path( '/inc/content/content-class.php' );

/**
 * Include additional content functions.
 */
require_once get_parent_theme_file_path( '/inc/content/content-function.php' );

/**
 * Include additional customization.
 */
require_once get_parent_theme_file_path( '/inc/customize/include/include-customize.php' );

/**
 * Include additional theme filters.
 */
require_once get_parent_theme_file_path( '/inc/functions/theme-filter.php' );

/**
 * Include additional theme support.
 */
require_once get_parent_theme_file_path( '/inc/functions/theme-support.php' );

/**
 * Include additional meta author.
 */
require_once get_parent_theme_file_path( '/inc/meta/author.php' );

/**
 * Include additional meta description.
 */
require_once get_parent_theme_file_path( '/inc/meta/description.php' );

/**
 * Include additional meta Facebook settings.
 */
require_once get_parent_theme_file_path( '/inc/meta/facebook.php' );

/**
 * Include additional meta keywords.
 */
require_once get_parent_theme_file_path( '/inc/meta/keywords.php' );

/**
 * Include additional meta Twitter settings.
 */
require_once get_parent_theme_file_path( '/inc/meta/twitter.php' );

/**
 * Include additional about widget.
 */
require_once get_parent_theme_file_path( '/inc/widgets/widget-about.php' );

/**
 * Include additional ads widget.
 */
require_once get_parent_theme_file_path( '/inc/widgets/widget-ads.php' );

/**
 * Include additional fans page widget.
 */
require_once get_parent_theme_file_path( '/inc/widgets/widget-fanspage.php' );

/**
 * Include additional posts widget.
 */
require_once get_parent_theme_file_path( '/inc/widgets/widget-posts.php' );

/**
 * Include additional widget builder for posts grids by categories.
 */
require_once get_parent_theme_file_path( '/inc/widgets/builder/by-categories/by-categories.php' );

/**
 * Include additional widget builder for posts grids by order.
 */
require_once get_parent_theme_file_path( '/inc/widgets/builder/by-order/by-order.php' );

/**
 * Include additional widget builder for posts grids by tags.
 */
require_once get_parent_theme_file_path( '/inc/widgets/builder/by-tags/by-tags.php' );

/**
 * Register widgets.
 */
require_once get_parent_theme_file_path( '/inc/widgets/widget-register.php' );

/**
 * Enqueue scripts and styles.
 */
require_once get_parent_theme_file_path( '/inc/functions/enqueue.php' );

/**
 * Include additional file admin init.
 */
require_once get_parent_theme_file_path( '/admin/init.php' );