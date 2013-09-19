define(['../utils/hogan', 'Backbone'], function(hogan){

    return Backbone.View.extend({

        initialize: function(){ 

            this.data_results;

            this.append_data = [];

            this.limit = 10;
            
            this.offset = 0;
            this.container = $('.js-infi-scroll');
            this.trigger = 9999;

            // API Script to call for the ajax
            this.script = 'post';

            this.window_height = $(window).height();

            this.retrieve_results();

            this.set_first_data_set();

            this.total_items = this.data_results.length;  
            this.total_pages = Math.ceil(this.total_items/this.limit);

            if (this.total_items > this.limit) {
                this.scroll();
            }

        },
        
        //The view element itself
        el: $('#container'),
        
        // Selectors are scoped to the parent element
        events: {
        },

        retrieve_results: function() {
            
            $.ajax({ url: window.site_path + this.script + '/ajax_all',
                 data: { offset: this.offset, limit: this.limit },
                 dataType: 'JSON',
                 type: 'POST',
                 async: false,
                 success: _.bind( function(data) {
                    
                    if(data.status == 200) {
                        this.set_results_data(data.results);
                        
                    }

                 }, this )
            });

            //this.append_results();

        },

        set_first_data_set: function() {
            this.offset = 0;

            this.set_display_data();

            this.offset = this.limit+this.offset;
        },

        set_results_data: function(data) {
            this.data_results = data;
        },
        

        scroll: function() {

            $(window).scroll( _.bind(function() {

                var to_scroll = $(window).scrollTop() + $(window).height();
                var trigger = $(document).height() - this.trigger;

                if (to_scroll > trigger) {
                    
                    if (this.offset < total_items) {
                        
                        this.set_display_data();

                        this.offset += this.limit;
                        


                        this.trigger = this.trigger/1.4;    
                    }
                    
                }

            }, this));
            
        },

        set_display_data: function() {
            
            this.append_data = [];
            var items = this.append_data;

            for(var i=this.offset; i<=this.limit+this.offset; i++) {
                
                items.push(this.data_results[i]);
            }

            this.set_append_data(items);

            this.append_results(items);

        },

        set_append_data: function(items) {
            this.append_data = items;
        },

        append_results: function() {

            var new_data = this.append_data;

            $.ajax({ url: window.site_path + 'assets/templates/post-listing.txt',
                 dataType: 'html',
                 success: _.bind( function (tmp) {
                     this.template = hogan.compile(tmp);
                     this.template = this.template.render({ directory: window.site_path, posts: new_data });
                     this.container.append(this.template);

                 }, this )
            });

        }
        /*
        ,

        retrieve_results: function() {

            $.ajax({ url: window.site_path + this.script + '/all',
                 data: { offset: this.offset, limit: this.limit },
                 dataType: 'JSON',
                 type: 'POST',
                 async: false,
                 success: _.bind( function(data) {
                    
                    if(data.status == 200) {
                        this.set_results_data(data.results);
                        this.offset+=this.limit;
                    }

                 }, this )
            });

            this.append_results();

        },

        set_results_data: function(data) {
            this.data_results = data;
        },

        append_results: function() {

            console.log(this.offset);

            var new_data = this.data_results;

            $.ajax({ url: window.site_path + 'assets/templates/post-listing.txt',
                 dataType: 'html',
                 success: _.bind( function (tmp) {
                     this.template = hogan.compile(tmp);
                     this.template = this.template.render({ directory: window.site_path, posts: new_data });
                     this.container.append(this.template);



                 }, this )
            });

        }
        */
        
    });
});
