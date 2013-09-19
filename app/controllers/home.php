<?php

class home extends c_controller
{
    public function index ()
    {
        $posts = new Posts_model();
        $binds = array();

        $to_scroll = false;

        $posts->where_implode = ' OR ';

        if( post_set() ) {

            foreach( $_POST['category'] as $cat ) {
                
                //$posts->where('('.DB_SUFFIX.'_posts.category LIKE :'.$cat.' OR '.DB_SUFFIX.'_posts.category LIKE :'.$cat.'_2 OR '.DB_SUFFIX.'_posts.category LIKE :'.$cat.'_3)', null, true);


                $posts->where('( FIND_IN_SET( "'.$cat.'", '.DB_SUFFIX.'_posts.category) )', null, true);

                /*
                $binds[$cat] = "%".$cat."%";
                $binds[$cat.'_2'] = "".$cat."%";
                $binds[$cat."_3"] = "%".$cat."";
                */

            }

            if( !!$_POST['posts']['search'] ) {
                $posts->where('posts.title LIKE :title');
                $binds['title'] = '%'.$_POST['posts']['search'].'%';
            }

            $posts_list = $posts->order('rating')->all($binds);

        } else {

            $posts->order('rating');

            if( !!$_GET['name'] ) {
                $posts->where('posts.authors_id LIKE :name');
                $binds['name'] = $_GET['name'];
            } elseif( isset($_GET['today']) ) { 
                $posts->order('create_date');
                $posts->where('DATE('.DB_SUFFIX.'_posts.create_date) = CURDATE()', null, true);
            } elseif( !isset($_GET['all']) ) {
                //$posts->where('posts.rating >= 1');
                $posts->limit(10);
            } else {

                $to_scroll = false;
            }

            $posts_list = $posts->all($binds);    
        }

        $this->addTag('to_scroll', $to_scroll);
        $this->addTag('posts_list', $posts_list);
        $this->addTag('title', 'Home');
        $this->addTag('meta_keywords', 'Saidit - the resource of useful links');
        $this->addTag('meta_desc', 'An archive of links');

        $this->addStyle('home');
        $this->setView('home/index');
    }

    public function test()
    {
        $this->plain();
        
        $mail = new Mail('new-post');

        $mail->to = 'ash@stormcreative.co.uk';
        $mail->from = 'test@stormcreative.co.uk';
        $mail->subject = 'Test email';
        $mail->send();
        
        die ( $mail->to );
    }
}
