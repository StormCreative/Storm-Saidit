<?php

class Post extends C_Controller 
{
    public function __Construct()
    {
        parent::__Construct();

        $this->addStyle('posts');

        Sessions::check_access();
    }

    public function add()
    {
        if( post_set() ) {
            // Arrange the addition post data that is not within the form
            $_POST['posts']['category'] = (!!$_POST['posts']['category']?implode(',', $_POST['posts']['category']):"");
            $_POST['posts']['authors_id'] = (!!$_SESSION['user']['id']?$_SESSION['user']['id']:2);
            
            $image = get_website_first_image($_POST['posts']['link']);
            $_POST['posts']['image_url'] = ($image != false ? $image : "");
            $_POST['posts']['status'] = 0;
            $post = new Posts_model($_POST['posts']);
            $output = $post->save();

            if($output != false) {

                $images = Image_helper::multi_image_move();

                if( !!$images ) {
                    Image_model::save_multi( $images, $post->attributes[ 'id' ] );
                }

                Activity_model::add($_SESSION['user']['id'], 'created new post <a href="'.DIRECTORY.'post/view/'.$output.'">'.$post->title.'</a>');

                header('location: '.DIRECTORY.'?posts=0&new_post=true');
            } else {
                $this->addTag('errors', $post->errors);
            }
        }

        $this->setScript( 'post' );
    }

    public function view($id)
    {
        $post = new Posts_model();
        $post->find($id);

        if( post_set() ) {

            // Set foreign keys for comments
            $_POST['comments']['authors_id'] = $_SESSION['user']['id'];
            $_POST['comments']['posts_id'] = $id;

            $comment = $_POST['comments']['body'];

            Posts_model::tag_notification($comment, 'tagged you in a response on <a href="'.DIRECTORY.'post/view/'.$id.'">'.$post->title.'</a>');

            $comments = new Comments_model($_POST['comments']);

            $result = $comments->save();

            if( $result != false ) {

                // Fires off an email to the author to let them know a coment has been made
                $content = 'commented on the post <a href="'.SITE.DIRECTORY.'post/view/'.$post->id.'">'.$post->title.'</a> you posted on Saidit.';
                
                Activity_model::add($_SESSION['user']['id'], $content);
                
                Notifications_model::add($_SESSION['user']['id'], $post->authors_id, $content);
                
                header('location: '.DIRECTORY.'post/view/'.$id.'#comment-'.$result);
            }
        }

        $comments = new Comments_model();

        $output = $comments->where('comments.posts_id = :id')->order('create_date', 'ASC')->all(array('id' => $id));

        $this->addTag('post', $post->attributes);
        $this->addTag('comments', $output);

        $this->addStyle('jqueryui');
        $this->setScript('post');
        $this->addStyle('comments');
    }

    public function all()
    {
        $posts = new Posts_model();

        $posts = $posts->where('posts.authors_id = :authors_id')->all(array('authors_id' => $_SESSION['user']['id']));

        $this->addTag('posts', $posts);
    }

    public function ajax_all()
    {
        $this->plain();

        $limit = $_POST['limit'];
        $offset = $_POST['offset'];

        $cacher = new Cacher('posts-archive');

        if( $cacher->check_cache_time() ) {

            $posts = new Posts_model();

            //->limit($offset, $limit)

            $posts_list = $posts->order('rating')->all($binds);   

            $filtered_posts = array();

            foreach( $posts_list as $post ) {
                $post['comments'] = count($post['comments']);
                $post['create_date'] = tidy_time_posted($post['create_date']);
                $filtered_posts[] = $post;
            }

            $posts_list = $filtered_posts;
            
            $cacher->cache_data( $posts_list );

        } else {
            $posts_list = $cacher->get_cache_data();
        }


        if( count($posts_list) > 0 ) {
            $result = array( 'status' => 200, 'results' => $posts_list );
        } else {
            $result = array('status' => 201);
        }

        die(json_encode($result));
    }

    public function ajax_descision()
    {
        $this->plain();

        $status = $_POST['status'];
        $post_id = $_POST['post_id'];
        
        $posts = new Posts_model();

        $posts->find($post_id);

        $posts->status = $status;
        $posts->approved_by = $_SESSION['user']['id'];

        $output = $posts->save();

        $result = array('status' => 401);

        if($output) {

            if($status == 1) {

                $data['link'] = SITE.DIRECTORY.'post/view/'.$post_id;

                $mail = new Mail('post-approved', $data);
                $mail->to = Users_model::get_admins();
                $mail->from = 'no-reply@saidit.co.uk';
                $mail->subject = 'Saidit - New post has been approved.';
                $mail->send();
            }

            $result = array('status' => 201);
        }

        exit(json_encode($result));
    }

}

?>