define(['jquery'], function($){

    $('.js-controls-action').on('click', function(e) {
        $('.js-controls').toggle();
    });

    /**
     * On mouseover open the menus
     */
    $('.js-filter-tags').bind('mouseover', function(e) {
        $('.filter_tags--dropdown').toggle();
    });

    $('.js-date_filter').bind('mouseover', function(e) {
        $('.date_filter--dropdown').toggle();
    });

    /**
     * Close the menus on mouseover
     */
    $('.js-main-container').bind('mouseover', function(e) {
        $('.date_filter--dropdown').hide();
        $('.filter_tags--dropdown').hide();
    });

});