<?php
    // Remove Unnecessary Code in WordPress Header
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
    remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

    // Disable Emoji
    add_filter( 'tiny_mce_plugins', 'rkt_remove_emoji' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    function rkt_remove_emoji( $plugins ) {
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
    }

    // Disable Gutenberg
    add_filter( 'use_block_editor_for_post_type', '__return_false' );
    add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
    add_filter( 'use_widgets_block_editor', '__return_false' );

    // Set website icon
    $icon_url = get_field( 'site_icon', 'options' );
    $new_icon_id = attachment_url_to_postid( $icon_url );
    update_option( 'site_icon', $new_icon_id );

    // Add Theme Options
    if ( function_exists( 'acf_add_options_page' ) ) {

        acf_add_options_page( array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect'   => false
        ) );

        acf_add_options_sub_page( array(
            'page_title'  => 'Theme Header Settings',
            'menu_title'  => 'Header',
            'parent_slug' => 'theme-general-settings',
        ) );

        acf_add_options_sub_page( array(
            'page_title'  => 'Theme Footer Settings',
            'menu_title'  => 'Footer',
            'parent_slug' => 'theme-general-settings',
        ) );

    }

    // Add Style and Scripts to Admin
    add_action( 'admin_enqueue_scripts', 'RKT_admin' );
    function RKT_admin() {
        $theme_version = wp_get_theme()->get( 'Version' );

        wp_enqueue_style( 'rkt-admin-css', get_template_directory_uri() . '/assets/css/admin.css', null, $theme_version );
        wp_enqueue_script( 'rkt-admin-js', get_template_directory_uri() . '/assets/js/admin.js', null, $theme_version, true );
    }

    // Root Vars
    function root_vars() { ?>
        <style type="text/css">
            :root {
                --main-color-1: <?php echo get_field('main_color_1', 'options') ?: '#000' ?>;
                --main-color-2: <?php echo get_field('main_color_2', 'options') ?: '#000' ?>;
                --main-color-3: <?php echo get_field('main_color_3', 'options') ?: '#000' ?>;
                --main-color-4: <?php echo get_field('main_color_4', 'options') ?: '#000' ?>;
                --main-color-5: <?php echo get_field('main_color_5', 'options') ?: '#000' ?>;
                --main-color-6: <?php echo get_field('main_color_6', 'options') ?: '#000' ?>;
                --rkt-container: <?php echo get_field('global_container_width', 'options') / 16 .'rem' ?: '90rem' ?>;
            }
        </style>
    <?php }

    // Preloader Styles
    function preloader_css() { ?>
        <style type="text/css">
            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #fff;
            }

            #loader {
                display: block;
                position: relative;
                left: 50%;
                top: 50%;
                width: 150px;
                height: 150px;
                margin: -75px 0 0 -75px;
                border-radius: 50%;
                border: 3px solid transparent;
                border-top-color: var(--main-color-1);
                -webkit-animation: spin 2s linear infinite;
                animation: spin 2s linear infinite;
            }

            #loader:before {
                content: "";
                position: absolute;
                top: 5px;
                left: 5px;
                right: 5px;
                bottom: 5px;
                border-radius: 50%;
                border: 3px solid transparent;
                border-top-color: var(--main-color-2);
                -webkit-animation: spin 3s linear infinite;
                animation: spin 3s linear infinite;
            }

            #loader:after {
                content: "";
                position: absolute;
                top: 15px;
                left: 15px;
                right: 15px;
                bottom: 15px;
                border-radius: 50%;
                border: 3px solid transparent;
                border-top-color: var(--main-color-3);
                -webkit-animation: spin 1.5s linear infinite;
                animation: spin 1.5s linear infinite;
            }

            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }

            @keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
        </style>
    <?php }
