<?php

class Ratings 
{
    public function add()
    {
        if( post_set() ) {

            $authors_id = $_SESSION['user']['id'];
            $posts_id = $_POST['posts_id'];

            $ratings = new Ratings_model();

            $ratings->where('ratings.authors_id = :authors_id');
            $ratings->where('ratings.posts_id = :posts_id');

            $ratings->find(array('authors_id' => $authors_id, 'posts_id' => $posts_id));

            if($ratings->id == "") {

                $ratings->posts_id = $posts_id;
                $ratings->rating = $_POST['rating'];
                $ratings->authors_id = $authors_id;

                $output = $ratings->save();

            } else {
                $output = false;
                $ratings->delete();
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