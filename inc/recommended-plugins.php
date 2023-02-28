<?php

    require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

    add_action( 'tgmpa_register', 'rkt_required_plugins' );
    function rkt_required_plugins() {
        $plugins = array(
            //        array(
            //            'name'     => '// The plugin name', // The plugin name
            //            'slug'     => '// The plugin slug (typically the folder name)',
            //            'source'   => '// The plugin source',
            //            'required' => false,
            //        )
            array(
                'name'     => 'Advanced Custom Fields Pro (b3JkZXJfaWQ9NTU1MDd8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE1LTA1LTA2IDExOjUzOjM1)',
                'slug'     => 'advanced-custom-fields-pro',
                'source'   => 'http://ready-for-feedback3.com/plugins/advanced-custom-fields-pro.zip',
                'required' => true,
            ),
            array(
                'name' => 'WooCommerce',
                'slug' => 'woocommerce',
            ),
            array(
                'name'     => 'Custom Post Type UI',
                'slug'     => 'custom-post-type-ui',
                'required' => false,
            ),
            array(
                'name'     => 'Gravity Forms (86a265e9644d0b79e4ccce71a582fc7e)',
                'slug'     => 'gravityforms',
                'source'   => 'http://ready-for-feedback3.com/plugins/gravityforms.zip',
                'required' => false,
            ),
            array(
                'name'     => 'Robin image optimizer',
                'slug'     => 'robin-image-optimizer',
                'required' => false,
            ),
        );

        $config = array(
            'id'           => 'rkt',
            'default_path' => '',
            'menu'         => 'install-plugins',
            'parent_slug'  => 'plugins.php',
            'capability'   => 'edit_theme_options',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => true,
            'message'      => '',
        );

        tgmpa( $plugins, $config );
    }
