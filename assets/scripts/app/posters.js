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

        $.ajax({
            type: 'POST',
            url: window.site_path + "authors/order",
            data: {order:action},
            dataType: 'json'

        }).done(function( data ) {
            
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
            }
        });

    });

});