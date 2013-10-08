/*
requirejs.config({
    paths: {
        Backbone: '../utils/backbone',
        jquery: '../utils/jquery',
        jqueryui: '../utils/jqueryui'
    },
    shim: {
        'Backbone': {
            deps: ['../utils/lodash', 'jquery'], // load dependencies
            exports: 'Backbone' // use the global 'Backbone' as the module value
        }
    }
});

require(['tagger', 'menu']);
*/

requirejs.config({
    paths: {
        Backbone: '../utils/backbone',
        jquery: '../utils/jquery'
    },
    shim: {
        'Backbone': {
            deps: ['../utils/lodash', 'jquery'], // load dependencies
            exports: 'Backbone' // use the global 'Backbone' as the module value
        }
    }
});

require(['../views/scroller', 'menu', 'selectivizr-min', 'image-handler', 'css_browser_selector'], function(Scroller) {
    
    $(".js-back").on('click', function(e) {
        var amount = -1;
        
        if (window.location.hash) {
            amount = -2;
        }
        
        window.history.go(amount);

        e.preventDefault();
    });

    if(window.scroll == 1 ) {
        //var scroller = new Scroller();    

        require(['rating']);
    }
    
    require(['rating']);

    require(['posters']);

    require(['posts']);

    $( '#js-posts-form' ).submit( function( e ) {
        $( '.js-ajax-loader' ).removeClass('hide');
    });
    
});
