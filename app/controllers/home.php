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

        // Filtering the categories seperately - by either the post or the get
        // The GET is only if the POST has been set previously and an additional action
        // has been set like flipping the ratings round - so a get variable to keep the posts 
        // needs to be made
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

            // Looping through and building up the where string as the conditions rely on an OR
            // Did not use FIND_IN_SET as this is for more specific finds
            // Want to bring up multiple results that match any of the categories not restricting to an entire math
            // Which seemingly FIND_IN_SET does, which it shouldn't do?
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

            // Implode the strings up with an OR and wrap with another set of parameters
            // as without these it treats it as an additional OR and can not have other specific AND requirements
            $posts->where('('.implode(' OR ', $where).')', null, true);

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

        // Posts 99 is only there to check wether to put a posts query string
        // into a href - so we want to ignore picking it up and treating it as anything
        // if posts has been set.
        if( !!$_GET['posts'] && $_GET['posts'] != '99' ) {
            
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

            $posts_type = $_GET['posts'];
            
            
        } else {
            /*
            $posts->where('posts.status = 0');
            $show_decide = true;
            $accept_status = 1;
            $decline_status = 2;
            */
            
            // If query string of posts is 0 - as it's not being picked up as a string at all
            // We manually set it
            if( $_GET['posts'] == '0' ) {

                $posts_type = 0;
                $posts->where('posts.status = 0');
            }

            // Only if the admin is top level do we show the ability to approve as management only
            // However if archiving is set - then we don't want to have the ability to approve/decline
            // As we are grouping them all as one - to save confusing of actions

            if( (Sessions::check_admin_access() || Sessions::check_admin_access(2)) && $_GET['archive'] == "" ) {

                $posts_type = 0;
                $show_decide = true;
                $accept_status = 1;
                $decline_status = 2;
            } else {

                if( $_GET['posts'] == '0' ) {
                    $posts_type = 0;
                } else {
                // Turn posts_type to false as we don't want to filter when filtering in the main archive
                    $posts_type = '99';
                }
            }


        }

        if( !!$_GET['order'] ) {
            $order = $_GET['order'];
        } else {
            $order = false;
        }

        // This GET category is only for the individual category that would be in a listing
        if( !!$_GET['category'] ) {
            $posts = $this->filter_by_category($_GET['category'], $posts);
        }

        $order_by = 'create_date';

        $order_by_month = false;

        // Handle the order by filter within the top nav - Week/Day/Month
        if( !!$_GET['order_by'] ) {
            
            if( $_GET['order_by'] == 'today' ) {

                $posts->where('DAY('.DB_SUFFIX.'_posts.create_date) = DAY(CURDATE())', null, true);
            } elseif( $_GET['order_by'] == 'week' ) {

                $posts->where('WEEKOFYEAR('.DB_SUFFIX.'_posts.create_date)=WEEKOFYEAR(NOW())', null, true);
            } else {

                // If order_by is all then we don't want to do any filtering
                if( $_GET['order_by'] != 'all' ) {
                    //$posts->where('MONTH('.DB_SUFFIX.'_posts.create_date) = MONTH('.$_GET['order_by'].')', null, true);
                    $posts->where('MONTH('.DB_SUFFIX.'_posts.create_date) = '.$_GET['order_by'].'', null, true);
                    $order_by_month = true;
                    $order_by_month_value = date('F', strtotime('1-'.$_GET['order_by'].'-2012'));
                }
            }
        }

        // Setup up the configurations for the pagination
        $posts_list = $posts->order('create_date')->all($binds);
        $config['total_items'] = count($posts_list);
        $config['page_no'] = $page;
        $config['url'] = 'home/index';
        $config['per_page'] = 20;

        $paginater = new Paginater($config);
        $posts->limit( $config['per_page'], $paginater->offset );

        $posts_list = $posts->order('create_date')->all($binds);
        
        // Handles the ordering of the posts by their rating
        $posts_list = $this->order_by_rating($posts_list, $order);

        if(!!$_GET['archive']) {
            $archive = '&archive=1';
        }

        // Set all of the page attributes
        $this->addTag('archive', $archive);
        $this->addTag('order_by_month', $order_by_month);
        $this->addTag('order_by_month_value', $order_by_month_value);
        $this->addTag('page_no', $paginater->page_no);
        $this->addTag('total_pages', $paginater->total_pages);
        $this->addTag('next_button', $paginater->get_next_btn());
        $this->addTag('back_button', $paginater->get_back_btn());
        $this->addTag('current_page', str_replace(DIRECTORY, '', $_SERVER['REDIRECT_URL']));
        
        $this->addTag('posts_category', (!!$_POST['posts']['category']?implode(',', $_POST['posts']['category']):''));
        if(!!$_GET['posts_category']) {
            $this->addTag('posts_category', $_GET['posts_category']);
        }

        $this->addTag('order_by_string', (!!$_GET['order_by']?'&order_by='.$_GET['order_by']:''));
        $this->addTag('accept_status', $accept_status);
        $this->addTag('decline_status', $decline_status);
        $this->addTag('show_decide', $show_decide);
        $this->addTag('show_header_filter', true);
        $this->addTag('order', ($order=='desc'?'asc':'desc'));
        $this->addTag('posts_type', $posts_type);
        $this->addTag('to_scroll', $to_scroll);
        $this->addTag('posts_list', $posts_list);
        $this->addTag('title', 'Home');
        $this->addTag('meta_keywords', 'Saidit - the resource of useful links');
        $this->addTag('meta_desc', 'An archive of links');

        $this->addStyle('home');
        $this->setView('home/index');
    }

    /**
     * Orders posts by their rating - ASC or DESC
     * 
     * @param array $posts - the database results of the posts
     * @param mixed bool/string - if false no ordering is made
     *                            as we only reorder if an action is set
     */
    public function order_by_rating($posts, $order="desc")
    {
        $_posts = array();
        foreach( $posts as $post ) {
            $total_rating = 0;

            // Build up the rating for every post - as we will be ordering the 
            // array by the first associated key
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
        } elseif( $order == 'asc') {
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
