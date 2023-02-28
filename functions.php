<?php
    function foundation_scripts_and_styles() {
        if ( ! is_admin() ) {

            // Disable gutenberg built-in styles
            wp_dequeue_style( 'wp-block-library' );

            // Load Stylesheets
            //core

            //system
            wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', null, null );/*2rd priority*/
            wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', null, null );/*1st priority*/

            // Load JavaScripts
            //core
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_script( 'jquery-ui-selectmenu' );


            //plugins
            wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/assets/js/plugins/jquery.matchHeight-min.js', null, '0.7.2', true );

            //custom javascript
            wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.js', null, null, true ); /* This should go first */

        }
    }


    function include_acf_placeholder() {
        include_once get_stylesheet_directory() . '/inc/acf-placeholder.php';
    }


?>











