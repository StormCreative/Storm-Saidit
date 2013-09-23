define(['jquery'], function($){

	$('.js-decide').on('click', function(e) {

		var elem = $(e.target);
		var action = elem.attr('data-action');
		var post_id = elem.parent().parent().parent().attr('data-id');
		var status = elem.attr('data-status');

		/*
		if (action == 'accept') {
			status = 1;
		} else {
			status = 2;
		}
		*/

		$.ajax({
            type: 'POST',
            url: window.site_path + "post/ajax_descision",
            data: {post_id: post_id, status: status},
            dataType: 'json'
        }).done(function(data) {
           	
            if (data.status == 201) {
            	
            	$("#js-post-item-"+post_id).fadeOut();
            }

        });

        e.preventDefault();

	});

});