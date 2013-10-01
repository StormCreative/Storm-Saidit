define(['jquery', '../utils/hogan'], function($, hogan){

    $('.js-posters-rating').on('click', function(e) {

        var elem = $(e.target);
        var action = elem.attr('data-action');
        
        if (action == 'desc') {
            action = 'asc';
        } else {
            action = 'desc';
        }

        elem.attr('data-action', action);

        var data = {order:action};
        
        if (elem.attr('data-when') == 'month') {
            data.when = true;
        }

        get_posters(data);
        e.preventDefault();
    });

    $(".js-posters-rating-month").on('click', function(e) {
        var elem = $(e.target);
        set_active(elem);
        set_rating_data('month');
        get_posters({when:true});

        e.preventDefault();
    });

    $(".js-posters-rating-ever").on('click', function(e) {
        var elem = $(e.target);
        set_active(elem);
        set_rating_data('ever');
        get_posters({order:'asc'});
        e.preventDefault();
    });

    function set_rating_data(value) {
        var rating = $('.js-posters-rating');

        rating.attr('data-when', value);
        rating.children().attr('data-when', value);
        rating.children().attr('data-action', 'asc');
    }

    function set_active(elem) {
        $(".js-posters-options").removeClass('active');
        elem.addClass('active');
    }

    function get_posters(data) {
        $.ajax({
            type: 'POST',
            url: window.site_path + "authors/order",
            data: data,
            dataType: 'json'
        }).done(function(data) {
            
            if (data.status == 201) {
                var posters = data.data;

                $.ajax({
                    url: window.site_path + 'assets/tmpls/posters-aside.tmpl',
                    dataType: 'html',
                    async: true,

                    success: _.bind (function (tmp) {
                        
                        posters = {data:posters};

                        template = hogan.compile(tmp);
                        
                        template = template.render(posters);

                        $(".js-posters-list").html(template);
                        

                    }, this)
                });
            } else {
                $(".js-posters-list").html('');
            }
        });
    }

});