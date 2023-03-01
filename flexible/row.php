<?php
    $w_container = ( $columns === 'w-block' ) ? ' rkt-container' : ( $columns === 'w-fluid' ? ' rkt-fluid' : ' rkt-custom' );
    $w_custom = $columns === 'w-custom' ? 'style="max-width:' . $custom_width / 16 . 'rem"' : null;
?>
<div class="rkt-row<?php echo $w_container ?>" <?php echo $w_custom ?>>
    <?php if ( $flexible = $blocks ) {
        foreach ( $flexible as $key => $section ) {
            show_template( $section['acf_fc_layout'], $section, 'flexible' );
        }
    } ?>
</div>