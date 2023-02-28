<?php
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

    // Remove Unnecessary Code in WordPress Header
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
    remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

    // Disable Gutenberg
    add_filter( 'use_block_editor_for_post_type', '__return_false' );
    add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
    add_filter( 'use_widgets_block_editor', '__return_false' );

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

?>











