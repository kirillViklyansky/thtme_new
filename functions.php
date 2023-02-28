<?php
    // Include files
    require_once get_stylesheet_directory() . '/inc/recommended-plugins.php';

    // Remove Submenu pages and pages from admin menu
    add_action( 'admin_menu', 'wpdocs_adjust_the_wp_menu', 999 );
    function wpdocs_adjust_the_wp_menu() {
        global $submenu;
        unset($submenu['themes.php'][6]); // Remove Customize

        remove_submenu_page( 'plugins.php', 'plugin-editor.php' ); // Remove Plugin Editor
        remove_menu_page( 'edit-comments.php' ); // Remove Comments
    }

    // Remove Unnecessary Code in WordPress Header
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
    remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

    // Disable Emoji
    add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    function disable_wp_emojis_in_tinymce( $plugins ) {
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

    // Load in header
    add_action( 'wp_enqueue_scripts', 'rk_scripts_header' );
    function rk_scripts_header() {
        // Disable gutenberg built-in styles
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'classic-theme-styles' );
        wp_dequeue_style( 'global-styles' );
    }

    // Load in footer
    add_action( 'get_footer', 'rk_scripts_footer' );
    function rk_scripts_footer() {
        $theme_version = wp_get_theme()->get( 'Version' );

        if ( ! is_admin() ) {
            // Custom CSS
            wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.min.css', null, $theme_version );
            wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', null, null );

            // Load Core JavaScripts
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_script( 'jquery-ui-selectmenu' );


            // Plugins
            wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/assets/js/plugins/jquery.matchHeight-min.js', null, '0.7.2', true );

            // Custom Javascript
            wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.min.js', null, $theme_version, true );
        }
    }

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


?>











