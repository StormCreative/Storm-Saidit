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

require(['../views/scroller', 'menu'], function(Scroller) {
    
    

    if(window.scroll == 1 ) {
        //var scroller = new Scroller();    

        require(['rating']);
    }
    
    require(['rating']);

    require(['posters']);
    
});
