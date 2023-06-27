(function ($) {
    $(document).ready(function () {
        $('.form-oiderby-sort').on('change', function (e) {
            e.preventDefault();
            var sort_order = $(this).find('option:selected').val();
            $.ajax({
                url: wpAjax.ajaxUrl,
                data: {
                    action: 'ajax_example_request',
                    sort_order : sort_order,
                    tourSearch : tourSearch,
                    destination : destination,
                    duration : duration,
                },
                type: 'post',
                success: function (result) {
                    $('.tourmaster-tour-item-holder').html(result);
                },
                error: function (result) {
                    console.warn(result)
                }
            });
        });
    });
})(jQuery);