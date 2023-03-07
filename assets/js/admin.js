(function ($) {
    // Auto width for Flexible blocks
    function blockWidth(el) {
        $.each(el, function (i, v) {
            let blockWidth = $(v).val();
            let closet = $(v).closest('.layout');

            closet.css('--block-width', blockWidth + '%');
        })

    }

    let inputWidth = $('.acf-field[data-name="width"] input[type="range"]')
    $(document).on('ready', function () {
        blockWidth(inputWidth)
    })


    inputWidth.on('change', function () {
        blockWidth($(this))
    })

}(jQuery));