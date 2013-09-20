define(['jquery', '../utils/api-caller'], function($, api){

    var api = api;

    $('.js-rating').on('click', function(e) {

        var elem = $(e.target);
        var action = elem.attr('data-action');
        var parent = $(elem.parent().parent().parent());
        var rating = parseInt(parent.attr('data-rating'));
        var post_id = parent.attr('data-id');
        var current_vote_elem = $('#js-'+action+'-amount-'+post_id);
        var current_vote = current_vote_elem.text();

        var new_vote = parseInt(current_vote)+1;

        $.ajax({
            type: 'POST',
            url: window.site_path + "ratings/add",
            data: {posts_id:post_id, rating:(action=='up'?1:2)}
        }).done(function( data ) {
        
            if (data == '201') {
                current_vote_elem.text(new_vote);
                elem.addClass((action=='up'?'green':'red')+'-thumb');    
            } else {
                current_vote_elem.text(parseInt(new_vote-2));
                elem.removeClass((action=='up'?'green':'red')+'-thumb');
            }
        });

    });

});