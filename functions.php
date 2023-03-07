<?php
    // Include files
    require_once get_stylesheet_directory() . '/inc/recommended-plugins.php';
    require_once get_stylesheet_directory() . '/inc/helper-functions.php';
    require_once get_stylesheet_directory() . '/inc/RKT-core.php';

    // Remove Submenu pages and pages from admin menu
    add_action( 'admin_menu', 'rkt_remove_admin_pages', 999 );
    function rkt_remove_admin_pages() {
        global $submenu;
        unset( $submenu['themes.php'][6] ); // Remove Customize

        remove_submenu_page( 'plugins.php', 'plugin-editor.php' ); // Remove Plugin Editor
        remove_submenu_page( 'options-general.php', 'options-discussion.php' ); // Remove Discussion
        remove_menu_page( 'edit-comments.php' ); // Remove Comments

        //        remove_menu_page( 'edit.php?post_type=acf-field-group' ); // Remove Custom Fields
    }

    // Load in header
    add_action( 'wp_enqueue_scripts', 'rkt_scripts_header' );
    function rkt_scripts_header() {
        // Disable gutenberg built-in styles
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'classic-theme-styles' );
        wp_dequeue_style( 'global-styles' );
    }

    // Load in footer
    add_action( 'get_footer', 'rkt_scripts_footer' );
    function rkt_scripts_footer() {
        $theme_version = wp_get_theme()->get( 'Version' );

        if ( ! is_admin() ) {
            // Custom CSS
            wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', null, $theme_version );
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

    // Add Image Sizes
    // add_image_size( 'name', width, height, array('center','center'));
?>











