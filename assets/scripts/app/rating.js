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


        elem.addClass((action=='up'?'green':'red')+'-thumb'); 

        $.ajax({
            type: 'POST',
            url: window.site_path + "ratings/add",
            data: {posts_id:post_id, rating:(action=='up'?1:2)}
        }).done(function( data ) {
            
            // This status is for first time voters
            if (data == '201') {
                current_vote_elem.text(new_vote);
                elem.addClass((action=='up'?'green':'red')+'-thumb');    
            } else {
                
                // First remove the current selections amount from the original amount
                if (current_vote != 0) {
                    var new_vote_val = parseInt(new_vote-2);
                    current_vote_elem.text(new_vote_val);
                }

                // If it's a 202 response it is a vote that it replacing a previous vote
                // So we need to unmark and remark the new vote and change the values
                // As this happens if someone has pressed up and then pressed down after - they can alternative
                if (data == '202') {
                    
                    current_vote_elem.text(new_vote);
                    
                    var current_class = (action=='up'?'red':'green')+'-thumb';

                    if (elem.hasClass(current_class)) {
                        elem.removeClass(current_class);    
                    }

                    elem.addClass((action=='up'?'green':'red')+'-thumb');
                    
                    var new_elem;

                    if (action == 'down') {
                        new_elem = 'js-up-'+post_id;
                    } else {
                        new_elem = 'js-down-'+post_id;
                    }

                    new_elem = $('#'+new_elem);

                    var new_elem_num = new_elem.parent().next();
                    var new_elem_num_val = parseInt(new_elem_num.text());

                    new_elem_num.html(new_elem_num_val-1);

                    if ((new_elem_num_val-1) == 0) {
                        new_elem.removeClass((action=='up'?'red':'green')+'-thumb');
                    }
                    
                } 
                // Otherwise it's been clicked itself and we just need to turn off the colour.
                else {
                    if (new_vote_val == 0) {
                        elem.removeClass((action=='up'?'green':'red')+'-thumb');
                    }
                }
                
            }

        });

        e.preventDefault();

    });

});