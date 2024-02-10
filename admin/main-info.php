<?php

/**
 * Template part for displaying information about Block Icons.
 *
 * @package     Block Icons
 * @author      Yuky Hendiawan <yukyhendiawan1998@gmail.com>
 * @link        https://developer.wordpress.org/reference/functions/add_theme_page/
 * @since       1.0.0
 */

?>
<section class="wrap mytheme-information mytheme">
    <!-- Header top theme info -->
    <header class="top-theme-info">
        <div class="mycontainer">
            <div class="myrow">
                <div class="col-left">
                    <h2>
                        <?php echo esc_html( 'Goblog Free' ); ?>
                        <span><?php echo esc_html( '3.1.9' ); ?></span>
                    </h2>
                    <p><?php esc_html_e('Goblog Free is a WordPress theme with a clean design and a fully responsive layout, tailor-made for bloggers and personal web needs.', 'goblog-free'); ?></p>
                </div>
                <div class="col-right">
                    <a href="https://www.buymeacoffee.com/yukyhendiawan" target="_blank" class="donate">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="M441-120v-86q-53-12-91.5-46T293-348l74-30q15 48 44.5 73t77.5 25q41 0 69.5-18.5T587-356q0-35-22-55.5T463-458q-86-27-118-64.5T313-614q0-65 42-101t86-41v-84h80v84q50 8 82.5 36.5T651-650l-74 32q-12-32-34-48t-60-16q-44 0-67 19.5T393-614q0 33 30 52t104 40q69 20 104.5 63.5T667-358q0 71-42 108t-104 46v84h-80Z" />
                        </svg>
                        <?php esc_html_e('Donate', 'goblog-free'); ?>
                    </a>
                    <a href="https://www.upwork.com/freelancers/~01559dc6ef8a329c82" target="_blank" class="hire-developer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="M320-240 80-480l240-240 57 57-184 184 183 183-56 56Zm320 0-57-57 184-184-183-183 56-56 240 240-240 240Z" />
                        </svg>
                        <?php esc_html_e('Hire Developer!', 'goblog-free'); ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation tabs -->
    <nav class="tabs">
        <div class="mycontainer">
            <div class="myrow">
                <div class="box-menu">
                    <ul>
                        <li><a myid="report" href="#report" class="active"><?php esc_html_e('Report ', 'goblog-free'); ?></a></li>
                        <li><a myid="changelog" href="#changelog"><?php esc_html_e('Changelog ', 'goblog-free'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bug Report -->
    <section class="content report data-content">
        <div class="mycontainer">
            <div class="myrow">
                <div class="col-left">
                    <h2><?php esc_html_e('Bug Report', 'goblog-free'); ?></h2>
                    <?php
                    $text_report1 = sprintf(
                        /* translators: %s: Theme name */
                        __('If you encounter any bugs or issues while using the Plugin, we encourage you to promptly report them to us. Reporting bugs is a crucial step in ensuring quick updates and fixes, allowing you to continue experiencing optimal performance with our WordPress Plugin.', 'goblog-free'),
                    );
                    ?>

                    <p><?php echo esc_html($text_report1); ?></p>

                    <br />

                    <p><?php esc_html_e('Below are the steps to report a bug:', 'goblog-free'); ?></p>

                    <br />

                    <ol>
                        <li>
                            <strong><?php esc_html_e( 'Identify the Bug:', 'goblog-free' ); ?></strong>
                            <?php esc_html_e('Please try to identify and understand the issue or bug you encounter. Ensure to record details on how the bug manifests and its impact on the use of the Plugin.', 'goblog-free'); ?>
                        </li>

                        <li>
                            <strong><?php esc_html_e( 'Provide Detailed Explanation:', 'goblog-free' ); ?></strong>
                            <?php esc_html_e('When reporting the bug to us, offer a clear and detailed explanation of the problem you are facing.', 'goblog-free'); ?>
                        </li>

                        <li>
                            <strong><?php esc_html_e( 'Report the Bug:', 'goblog-free' ); ?></strong>
                            <?php echo esc_html__('Kindly report the bug through ', 'goblog-free'); ?> 
                            <a href="https://wordpress.org/support/theme/goblog-free/" target="_blank">
                                <?php esc_html_e('The Goblog Free WordPress Theme forum', 'goblog-free'); ?>
                            </a> 
                            <?php echo esc_html__(' or via ', 'goblog-free'); ?>
                            <a href="https://github.com/yukyhendiawan/goblog-free/issues" target="_blank">
                                <?php esc_html_e('GitHub Issues.', 'goblog-free'); ?>
                            </a>
                            <?php echo esc_html__('Include the information you have gathered about the bug in your report.', 'goblog-free'); ?>
                        </li>

                    </ol>

                    <br />

                    <p><?php esc_html_e('Your support and cooperation in reporting the bug are highly appreciated. We will make every effort to address the bug as quickly as possible so that you can continue enjoying the use of the Plugin without disruption.', 'goblog-free'); ?></p>

                    <br />

                    <p>
                        <?php esc_html_e('Best regards,', 'goblog-free'); ?> <br />
                        <?php esc_html_e('Yuky Hendiawan', 'goblog-free'); ?>
                    </p>
                </div>
                <div class="col-right ads">
                    <?php get_template_part( 'admin/sidebar', 'info' ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Changelog -->
    <section class="content changelog data-content hide">
        <div class="mycontainer">
            <div class="myrow">
                <div class="col-left">
                    <h2><?php esc_html_e('Changelog', 'goblog-free'); ?></h2>
                    <div class="changelog-info">
                        <ul>
                            <li>
                                <span class="new"></span>
                                <?php esc_html_e('New', 'goblog-free'); ?>
                            </li>
                            <li>
                                <span class="update"></span>
                                <?php esc_html_e('Update', 'goblog-free'); ?>
                            </li>
                            <li>
                                <span class="fix"></span>
                                <?php esc_html_e('Fix', 'goblog-free'); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="changelog-list">
                        <section>
                            <h2><?php esc_html_e('Version: 3.1.9', 'goblog-free'); ?><span><?php esc_html_e('Released on February 09, 2024', 'goblog-free'); ?></span></h2>
                            <div class="release">
                                <ul>
                                    <li>
                                        <span class="update"></span>
                                        <?php esc_html_e('Refactor Clean Code', 'goblog-free'); ?>
                                    </li>
                                    <li>
                                        <span class="new"></span>
                                        <?php esc_html_e('Add Page Information', 'goblog-free'); ?>
                                    </li>
                                    <li>
                                        <span class="fix"></span>
                                        <?php esc_html_e('Check Compatibility WordPress', 'goblog-free'); ?>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-right ads">
                    <?php get_template_part( 'admin/sidebar', 'info' ); ?>
                </div>
            </div>
        </div>
    </section>
</section>