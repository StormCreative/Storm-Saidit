<?php
class Comments extends C_Controller {

    public function __Construct()
    {
        parent::__Construct();

        $this->addStyle('comments');
    }

    public function add($id="") 
    {   
        $posts = new Posts_model();
        $posts->find($id);

        if( post_set() ) {

            // Set foreign keys for comments
            $_POST['comments']['authors_id'] = 2;
            $_POST['comments']['posts_id'] = $id;

            $comments = new Comments_model($_POST['comments']);

            $result = $comments->save();

            if( $result != false ) {

                Activity_model::add($_SESSION['user']['id'], 'commented on post <a href="'.$posts->link.'">'.$posts->title.'</a>');
                
                header('location: '.DIRECTORY.'post/view/'.$id);
            }
        }

        $this->setScript('post');
        $this->addTag('post', $posts->attributes);
    } 

    public function view() {} 

    public function edit() {} 
}