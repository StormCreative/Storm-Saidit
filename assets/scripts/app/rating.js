define(['jquery', '../utils/api-caller'], function($, api){

    var api = api;

    $('.js-rating').on('click', function(e) {

        var elem = $(e.target);
        var action = elem.attr('data-action');
        var parent = $(elem.parent());
        var rating = parseInt(parent.attr('data-rating'));
        var post_id = parent.attr('data-post-id');

        if( action == 'up' ) {
            rating += 1;
        } else {
            rating -= 1;
        }   

        parent.attr('data-rating', rating);
        $('#js-post-rating-'+post_id).html(rating);

        $.ajax({
            type: 'POST',
            url: window.site_path + "ratings/add",
            data: {posts_id:post_id, rating:rating}
        }).done(function( data ) {
            
        });

    });

});