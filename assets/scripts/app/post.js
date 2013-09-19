requirejs.config({
    paths: {
        jquery: '../utils/jquery',
        jqueryui: '../utils/jqueryui'
    }
});

require(['tagger', 'menu']);
