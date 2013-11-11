<?php

class Posts_model extends Activerecord 
{
    public function __Construct($attributes=array())
    {
        parent::__Construct($attributes);

        $this->has_one = array('authors');
        $this->has_many = array('comments', 'ratings', 'image', 'uploads');

        $this->validates = array( array( "not_empty", "title" ) );
    }

    /**
     * Retrieve top posters of the current day
     */
    public static function top_posters($by_month = false)
    {
        $post = new Posts_model();

        $post->group_by = 'authors_id';

        if($by_month) {
            $post->where('MONTH('.DB_SUFFIX.'_posts.create_date) = MONTH(CURDATE())', null, true);
        }

        $posts = $post->column('count(*) as posts_total')
                      //->where('DATE('.DB_SUFFIX.'_posts.create_date) = CURDATE()', null, true)
                      ->all(null, false);

        if( count($posts) > 0 ) {
            $result = $posts;
        } else {
            $result = false;
        }

        return $result;
    }

    public function tag_notification($comment, $message)
    {
        $doc = new DOMDocument();
        @$doc->loadHTML($comment);

        $filtered = $doc->getElementsByTagName('a'); 
        $tags_count = $filtered->length;
        
        if( $tags_count > 0 ) {

            for ( $i = 0; $i < $tags_count; $i++ ) 
            {
                $node = $filtered->item( $i );
                $result = $node->getAttribute( 'href' );

                $result = str_replace(DIRECTORY.'?name=', '', $result);

                Notifications_model::add($_SESSION['user']['id'], $result, $message);
            }

        } else {
            return false;
        }
    }

    public static function get_posts_count($id)
    {
        $post = new Posts_model();

        $posts = $post->column('count(*) as posts_total')
                      ->where('posts.authors_id = :authors_id')
                      ->find(array('authors_id' => $id));

        return $posts->posts_total;
    }
}

?>