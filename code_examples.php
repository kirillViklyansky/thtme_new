// AJAX
<?php
    // AJAX Localize (insert after global.js)
    wp_localize_script( 'global', 'ajax', array(
        'url'   => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'project_nonce' )
    ) );

    // AJAX Action
    add_action( 'wp_ajax_action_name', 'action_name_callback' );
    add_action( 'wp_ajax_nopriv_action_name', 'action_name_callback' );

    // AJAX Function Callback
    function action_name_callback() {
        $response = array();

        $response['some_data'] = 'Some data';

        wp_send_json( $response );
    }

?>

// Ajax JS Code
<script>
    $(document).on('click', '.button', function (e) {
        e.preventDefault();
        var $this = $(this);

        let data = $('#form').serialize() + '&action=action_name'

        $.ajax({
            url: ajax.url,
            type: 'POST',
            data: data,
            beforeSend: function () {
                $this.addClass('loading');
            },
            success: function (resp) {
                $this.removeClass('loading');
                console.log(resp);
            },
            complete: function () {
                $this.data('requestRunning', false);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
</script>


