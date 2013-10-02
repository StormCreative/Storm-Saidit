<?php

class Ratings_model extends Activerecord
{
    public static function get_ratings($id, $direction=1)
    {
    	$ratings = new Ratings_model();

    	$ratings->column('count(*) as rating_total');
    	$ratings->where('ratings.posts_id = :posts_id');
    	$ratings->where('ratings.rating = :rating');

    	$ratings->find(array('posts_id' => $id, 'rating' => $direction));

    	return $ratings->rating_total;
    }

    //public static function get_user_rating($post_id, )
}

?>