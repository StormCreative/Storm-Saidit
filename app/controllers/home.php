<?php

class home extends c_controller
{
    public function filter_by_category($cats, $obj)
    {
        if (!is_array($cats)) {
            $_cats = $cats;
            $cats = array();
            $cats[] = $_cats;
        }

        foreach( $cats as $cat ) {
                
            //$posts->where('('.DB_SUFFIX.'_posts.category LIKE :'.$cat.' OR '.DB_SUFFIX.'_posts.category LIKE :'.$cat.'_2 OR '.DB_SUFFIX.'_posts.category LIKE :'.$cat.'_3)', null, true);

            $obj->where('( FIND_IN_SET( "'.$cat.'", '.DB_SUFFIX.'_posts.category) )', null, true);

            /*
            $binds[$cat] = "%".$cat."%";
            $binds[$cat.'_2'] = "".$cat."%";
            $binds[$cat."_3"] = "%".$cat."";
            */

        }

        return $obj;
    }

    public function index($page="")
    {
        Sessions::check_access();
        
        $posts = new Posts_model();
        $binds = array();

        $to_scroll = false;

        $posts->where_implode = ' AND ';

        if( post_set() || $_GET['posts_category'] ) {

            $categories = $_POST['posts']['category'];

            if( !!$_GET['posts_category'] ) {
                $categories = $_GET['posts_category'];                

                if( !is_array($categories) ) {
                    $_categories = explode(',', $categories);
                    $categories = array();

                    foreach($_categories as $cat) {
                        $categories[] = $cat;
                    }
                }
            }
            
            $where = array();

            foreach( $categories as $cat ) {
                
                $_cat = str_replace('-', '_', $cat);
                //$posts->where('('.DB_SUFFIX.'_posts.category LIKE :'.$_cat.' OR '.DB_SUFFIX.'_posts.category LIKE :'.$_cat.'_2 OR '.DB_SUFFIX.'_posts.category LIKE :'.$_cat.'_3)', null, true);
                
                // Build up and implode later - as we don't want to have it appended by and AND and be very specific
                // Needs to be loose with an OR so it can find the differences within the comma seperated string
                $where[] = '('.DB_SUFFIX.'_posts.category LIKE :'.$_cat.' OR '.DB_SUFFIX.'_posts.category LIKE :'.$_cat.'_2 OR '.DB_SUFFIX.'_posts.category LIKE :'.$_cat.'_3)';
                //$posts->where('( FIND_IN_SET( "'.$cat.'", '.DB_SUFFIX.'_posts.category) )', null, true);
                
                $binds[$_cat] = "%,".$cat.",%";
                $binds[$_cat.'_2'] = "%".$cat.",%";
                $binds[$_cat."_3"] = "%".$cat."%";

            }

            $posts->where(implode(' OR ', $where), null, true);

                //$posts = $this->filter_by_category($_POST['category'], $posts);

            if( !!$_POST['posts']['search'] ) {
                $posts->where('posts.title LIKE :title');
                $binds['title'] = '%'.$_POST['posts']['search'].'%';
            }

            //$posts_list = $posts->order('rating')->all($binds);
            //$posts_list = $this->order_by_rating($posts_list);
        } 

        $posts->order('rating');

        if( !!$_GET['name'] ) {
            $posts->where('posts.authors_id LIKE :name');
            $binds['name'] = $_GET['name'];

        } elseif( isset($_GET['today']) ) { 

            $posts->order('create_date');
            $posts->where('DATE('.DB_SUFFIX.'_posts.create_date) = CURDATE()', null, true);

        } else {

            $to_scroll = false;
        }

        if( !!$_GET['posts'] ) {
            
            $posts->where('posts.status = :status');
            $binds['status'] = $_GET['posts'];
            $show_decide = false;

            if( Sessions::check_admin_access() ) {

                if($_GET['posts'] == '1') {
                    $show_decide = true;
                    $accept_status = 3;
                    $decline_status = 4;
                } elseif($_GET['posts'] == '4') {
                    $show_decide = true;
                    $accept_status = 3;
                    $decline_status = 2;
                }
            }
            
            
        } else {
            /*
            $posts->where('posts.status = 0');
            $show_decide = true;
            $accept_status = 1;
            $decline_status = 2;
            */
            
            if( $_GET['posts'] == '0' ) {
                $posts->where('posts.status = 0');
            }

            if( Sessions::check_admin_access() ) {
                $show_decide = true;
                $accept_status = 1;
                $decline_status = 2;
            }
        }

        $order = 'asc';

        if( !!$_GET['order'] ) {
            $order = $_GET['order'];
        }

        if( !!$_GET['category'] ) {
            $posts = $this->filter_by_category($_GET['category'], $posts);
        }

        $order_by = 'create_date';

        if( !!$_GET['order_by'] ) {
            
            if( $_GET['order_by'] == 'today' ) {
                $posts->where('DAY('.DB_SUFFIX.'_posts.create_date) = DAY(CURDATE())', null, true);
            } elseif( $_GET['order_by'] == 'week' ) {

                $posts->where('WEEKOFYEAR('.DB_SUFFIX.'_posts.create_date)=WEEKOFYEAR(NOW())', null, true);
            } else {
                $posts->where('MONTH('.DB_SUFFIX.'_posts.create_date) = MONTH(CURDATE())', null, true);
            }
        }

        $posts_list = $posts->order('create_date')->all($binds);


        // Handle the pagination
        $config['total_items'] = count($posts_list);
        $config['page_no'] = $page;
        $config['url'] = 'home/index';
        $config['per_page'] = 20;

        $paginater = new Paginater($config);

        $posts->limit( $config['per_page'], $paginater->offset );

        $posts_list = $posts->order('create_date')->all($binds);
        
        $posts_list = $this->order_by_rating($posts_list, $order);

        $this->addTag('page_no', $paginater->page_no);
        $this->addTag('total_pages', $paginater->total_pages);
        $this->addTag('next_button', $paginater->get_next_btn());
        $this->addTag('back_button', $paginater->get_back_btn());
        $this->addTag('current_page', str_replace(DIRECTORY, '', $_SERVER['REDIRECT_URL']));
        $this->addTag('posts_category', (!!$_POST['posts']['category']?implode(',', $_POST['posts']['category']):''));
        $this->addTag('order_by_string', (!!$_GET['order_by']?'&order_by='.$_GET['order_by']:''));
        $this->addTag('accept_status', $accept_status);
        $this->addTag('decline_status', $decline_status);
        $this->addTag('show_decide', $show_decide);
        $this->addTag('show_header_filter', true);
        $this->addTag('order', ($order=='desc'?'asc':'desc'));
        $this->addTag('posts_type', (!!$_GET['posts'] ? $_GET['posts'] : 0));
        $this->addTag('to_scroll', $to_scroll);
        $this->addTag('posts_list', $posts_list);
        $this->addTag('title', 'Home');
        $this->addTag('meta_keywords', 'Saidit - the resource of useful links');
        $this->addTag('meta_desc', 'An archive of links');

        $this->addStyle('home');
        $this->setView('home/index');
    }

    public function order_by_rating($posts, $order="desc")
    {
        $_posts = array();
        foreach( $posts as $post ) {
            $total_rating = 0;

            foreach( $post['ratings'] as $rating ) {
                if( $rating['rating'] == 1) {
                    $total_rating++;
                }
            }

            $_posts[] = array('rating' => $total_rating,
                              'post'   => $post
                              );

        }

        if( $order == 'desc' ) {
            array_multisort($_posts, SORT_DESC);
        } else {
            array_multisort($_posts, SORT_ASC);
        }

        return $_posts;
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
