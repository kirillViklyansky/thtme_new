<?php get_header();

    if ( $flexible = get_field( 'flexible_content' ) ) {
        foreach ( $flexible as $key => $section ) {
            show_template( $section['acf_fc_layout'], $section, 'flexible' );
        }
    }

    get_footer(); ?>