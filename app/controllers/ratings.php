<?php

class Ratings 
{
    public function add()
    {
        if( post_set() ) {

            $authors_id = $_SESSION['user']['id'];
            $posts_id = $_POST['posts_id'];
            $rating = $_POST['rating'];

            $ratings = new Ratings_model();

            $ratings->where('ratings.authors_id = :authors_id');
            $ratings->where('ratings.posts_id = :posts_id');
            //$ratings->where('ratings.rating = :rating');

            $ratings->find(array('authors_id' => $authors_id, 
                                 'posts_id' => $posts_id
                                 
                           ));

            //'rating' => $rating

            if($ratings->id == "") {

                $ratings->posts_id = $posts_id;
                $ratings->rating = $rating;
                $ratings->authors_id = $authors_id;

                $output = $ratings->save();

            } else {
                $output = false;

                if( $rating != $ratings->rating) {
                    $_rating = new Ratings_model();
                    $_rating->posts_id = $posts_id;
                    $_rating->rating = $rating;
                    $_rating->authors_id = $authors_id;

                    $output = $_rating->save();

                    if( $output ) {
                        $output = '202';
                    }
                }

                $ratings->delete();
            }

            if ($output != false) {
                $result = '201';

                if($output == '202') {
                    $result = '202';
                }
            } else {
                $result = '400';
            }

            exit($result);
        }
    }
}

?>