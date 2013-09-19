<?php

class Ratings 
{
    public function add()
    {
        if( post_set() ) {
            $ratings = new Posts_model();

            $ratings->find($_POST['posts_id']);
            
            $ratings->rating = $_POST['rating'];

            $output = $ratings->save();

            exit($output);
        }
    }
}

?>