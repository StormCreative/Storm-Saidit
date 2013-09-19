<?php

class Notifications_model extends Activerecord
{
    public function __Construct($attributes=array())
    {
        parent::__Construct($attributes);

        $this->has_one = array('authors');

        $this->validates = array( array( "not_empty", "body" ) );
    }

    public static function add($users_id, $authors_id, $content)
    {       
        if( $users_id != $authors_id ) {

            $name = Users_model::get_name($users_id);

            $content = htmlspecialchars('<a href="'.DIRECTORY.'?name='.urlencode($users_id).'">'.$name.'</a> '.str_replace(' ', '+', $content));
            
            $notifi = new Notifications_model(array('content' => $content, 'authors_id' => $authors_id));  

            $result = $notifi->save();

        } else {
            $result = false;
        }

        return $result;
    }

    public static function get($id, $status = 0)
    {
        $notifi = new Notifications_model();

        if( $status == 0 ) {
            $notifi->where('notifications.status = 0');    
        }

        $notifi->order('status', 'ASC');

        $result = $notifi->where('notifications.authors_id = :authors_id')
                         ->all(array('authors_id' => $id));

        if(count($result) == 0) {
            $result = false;
        }
        
        return $result;
    }

    public static function set_to_read($id)
    {
        $not = new Notifications_model();

        $output = $not->table()->query->plain('UPDATE '.$not->full_table().' SET status = 1 WHERE authors_id = :authors_id', array('authors_id' => $id));
        
        return $output;
    }
}
?>  