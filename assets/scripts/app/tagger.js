define(['jquery', 'jqueryui'], function($){

    $('.js-comment').on('keyup', function(e) {
        var elem = $(e.target);
        var value = elem.val();
        var auto_box = $('.js-auto-suggest');

        var match = value.match(/^([^-]*) @(.*)/);

        if(match) {
            
            auto_box.show();

            var match_name = value.match(/(\@[a-z]+)/);

            if( match_name ) {
                var name = match_name[1];    

                $.ajax({
                    type: 'POST',
                    url: window.site_path + "users/get",
                    data: {name:name}
                }).done(function( data ) {
                    
                    data = $.parseJSON(data);
                    var content = '<ul>';

                    $.each(data.results, function(index, value) {
                        if( !!value.name ) {
                            content += '<li><a class="js-auto-selection" data-name="'+value.name+'" data-id="'+value.id+'">'+value.name+'</a></li>';
                        }
                    });

                    content += '</ul>';

                    
                    auto_box.html(content);

                    $('.js-auto-selection').on('click', function(e){

                        var item = $(e.target);

                        item = '<a href="'+window.site_path+'?name='+item.attr('data-id')+'">'+item.attr('data-name')+'</a>';

                        var string = value.replace(name, item);

                        $('.js-comment').val(string);

                        auto_box.hide();
                        
                    });

                });
            }


        }

        var match = value.match(/^([^-]*) @ /);
        var match2 = value.match(/^([^-]*) @(.*) /);

        if(match || match2) {
            $('.js-auto-suggest').hide();
        }
    });



});