<?php
    /**
     * Output HTML markup of template with passed args
     *
     * @param string $file File name without extension (.php)
     * @param array $args Array with args ($key=>$value)
     * @param string $default_folder Requested file folder
     *
     * */
    function show_template( $file, $args = null, $default_folder = 'parts' ) {
        echo return_template( $file, $args, $default_folder );
    }

    /**
     * Return HTML markup of template with passed args
     *
     * @param string $file File name without extension (.php)
     * @param array $args Array with args ($key=>$value)
     * @param string $default_folder Requested file folder
     *
     * @return string template HTML
     * */
    function return_template( $file, $args = null, $default_folder = 'parts' ) {
        $file = $default_folder . '/' . $file . '.php';
        if ( $args ) {
            extract( $args );
        }
        if ( locate_template( $file ) ) {
            ob_start();
            include( locate_template( $file ) ); //Theme Check free. Child themes support.
            $template_content = ob_get_clean();

            return $template_content;
        }

        return '';
    }

    /**
     * Return ACF image or image url
     *
     * @param $field string - custom field name
     * @param $size string - 'thumbnail', 'medium', 'large', 'full', '360x360'
     * @param $type string - 'html', 'src'
     * @param $attr string|array - 'html', 'src'
     */
    function rkt_get_image( $field, $size = 'full-hd', $type = 'html', $attr = '' ) {
        $image = '';

        if ( is_string( $field ) === true ) {
            $field = get_field( $field );
        }

        if ( $field ) {
            if ( $type === 'html' ) {
                $image = wp_get_attachment_image( $field['ID'], $size, false, $attr );
            } else if ( $type === 'src' ) {
                $image = wp_get_attachment_image_src( $field['ID'], $size, false )[0];
            }
        }

        return $image;
    }
