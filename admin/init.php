<?php

/**
 * Adds a submenu page.
 */
function goblog_free_register_submenu()
{
    add_submenu_page(
        'themes.php',
        __( 'Goblog Free', 'goblog-free' ),
        __( 'Goblog Free', 'goblog-free' ),
        'manage_options',
        'goblog-free',
        'goblog_free_page_callback'
    );
}
add_action( 'admin_menu', 'goblog_free_register_submenu' );

/**
 * Display callback for the submenu page.
 */
function goblog_free_page_callback()
{
    get_template_part( 'admin/main', 'info' );
}

/**
 * Hide all notifications only on specific pages.
 */
function goblog_free_disable_admin_notices_on_specific_pages()
{
    global $plugin_page;

    // Check if the current page is in the WordPress admin area
    if ( is_admin() ) {
        if ( 'goblog-free' === $plugin_page ) {
            remove_all_actions( 'admin_notices' );
        }
    }
}
add_action( 'admin_init', 'goblog_free_disable_admin_notices_on_specific_pages', 999 );

/**
 * Function to be executed after the theme is activated
 */
function goblog_freetheme_activation_redirect() {
    if( isset( $_GET['activated'] ) ) {
        wp_safe_redirect( admin_url( 'themes.php?page=goblog-free' ) );
        exit;
    }
}
add_action( 'after_switch_theme', 'goblog_freetheme_activation_redirect' );

/**
 * Display admin notice.
 */
function goblog_free_display_admin_notice()
{
    // Check if the 'goblog_free_dismiss' cookie is not set or its value is an empty string
    if ( !isset( $_COOKIE['goblog_free_dismiss'] ) || $_COOKIE['goblog_free_dismiss'] === '') : ?>
        <div class="notice notice-success notice-goblog-free is-dismissible">
            <h2><?php esc_html_e( 'Welcome to the Goblog Free Theme!', 'hendky' ); ?></h2>
            <p><?php esc_html_e( 'Thank you for installing the Goblog Free theme! We hope this theme proves beneficial to many users.', 'hendky' ); ?></p>
            <p><?php esc_html_e( 'If you require assistance from a WordPress developer, please feel free to contact us.', 'hendky' ); ?></p>
            <p><?php esc_html_e( 'We are ready to help you develop and customize your WordPress site according to your needs.', 'hendky' ); ?></p>
            <div class="box-btn">
                <a href="https://www.upwork.com/freelancers/~01559dc6ef8a329c82" class="hire-developer" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M320-240 80-480l240-240 57 57-184 184 183 183-56 56Zm320 0-57-57 184-184-183-183 56-56 240 240-240 240Z"></path>
                    </svg>
                    <?php esc_html_e( 'Hire Developer!', 'hendky' ); ?>
                </a>
            </div>
        </div>
    <?php endif;
}
add_action( 'admin_notices', 'goblog_free_display_admin_notice' );

/**
 * Ajax notice dismiss.
 */	
function call_ajax_notice_dismiss() {
    // Set a cookie with a 7-day expiration time
    setcookie( 'goblog_free_dismiss', 'active', time() + (7 * 24 * 60 * 60) );

    wp_die();
}
add_action( 'wp_ajax_action-notice-dismiss', 'call_ajax_notice_dismiss' );