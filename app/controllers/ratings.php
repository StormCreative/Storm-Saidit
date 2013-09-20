<?php

class Ratings 
{
    public function add()
    {
        if( post_set() ) {

            $users_id = $_SESSION['user']['id'];
            $posts_id = $_POST['posts_id'];

            $ratings = new Ratings_model();

            $ratings->where('ratings.users_id = :users_id');
            $ratings->where('ratings.posts_id = :posts_id');

            $ratings->find(array('users_id' => $users_id, 'posts_id' => $posts_id));

            if($ratings->id == "") {

                $ratings->posts_id = $posts_id;
                $ratings->rating = $_POST['rating'];
                $ratings->users_id = $users_id;

                $output = $ratings->save();

            } else {
                $output = false;
            }

            if ($output != false) {
                $result = '201';
            } else {
                $result = '400';
            }

            exit($result);
        }
    }
}

?>