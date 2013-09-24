define(['jquery'], function($){

    $('.js-controls-action').on('click', function(e) {
        $('.js-controls').toggle();
    });

    $('.js-filter-tags').bind('click', function(e) {
        $('.filter_tags--dropdown').toggle();
    });

});