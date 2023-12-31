(function ($) {
    $(document).ready(function () {
        $('.form-oiderby-sort').on('change', function (e) {
            e.preventDefault();
            var typeSort = $('.form-choise-type-sort').find('option:selected').val();
            var sort_order = $(this).find('option:selected').val();
            $.ajax({
                url: wpAjax.ajaxUrl,
                data: {
                    action: 'ajax_example_request',
                    typeSort : typeSort,
                    sort_order : sort_order,
                    tourSearch : tourSearch,
                    destination : destination,
                    duration : duration,
                    minPrice : minPrice,
                    maxPrice : maxPrice,
                    minAge : minAge,
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

        $('.form-choise-type-sort').on('change', function (e) {
            e.preventDefault();
            var typeSort = $(this).find('option:selected').val();
            var sort_order = $('.form-oiderby-sort').find('option:selected').val();
            $.ajax({
                url: wpAjax.ajaxUrl,
                data:{
                    action: 'ajax_example_request',
                    typeSort : typeSort,
                    sort_order : sort_order,
                    tourSearch : tourSearch,
                    destination : destination,
                    duration : duration,
                    minPrice : minPrice,
                    maxPrice : maxPrice,
                    minAge : minAge,
                },
                type: 'post',
                success: function (result) {
                    $('.tourmaster-tour-item-holder').html(result);
                },
                error: function (result) {
                    console.warn(result)
                }
            })
        })
    });

})(jQuery);