<?php
    function rk_scripts() {
        if ( ! is_admin() ) {
            // Disable gutenberg built-in styles
            wp_dequeue_style( 'wp-block-library' );

            // Custom CSS
            wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.min.css', null, null );
            wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', null, null );

            // Load Core JavaScripts
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_script( 'jquery-ui-selectmenu' );


            // Plugins
            wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/assets/js/plugins/jquery.matchHeight-min.js', null, '0.7.2', true );

            // Custom Javascript
            wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.min.js', null, null, true );
        }
    }

    add_action( 'wp_enqueue_scripts', 'foundation_scripts_and_styles' );

?>











