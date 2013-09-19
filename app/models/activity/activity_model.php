<?php

class Activity_model extends Activerecord
{
    public function __Construct($attributes=array())
    {
        parent::__Construct($attributes);

        $this->validates = array( array( "not_empty", "content" ) );
    }

    public static function add($users_id, $content)
    {
        $name = Users_model::get_name($users_id);

        $content = htmlspecialchars('<a href="'.DIRECTORY.'?name='.urlencode($users_id).'">'.$name.'</a> '.str_replace(' ', '+', $content));
        
        $activity = new Activity_model(array('content' => $content));  

        $result = $activity->save();

        return $result;
    }

    public static function latest()
    {
        $activity = new Activity_model();

        $result = $activity->where('activity.create_date <= NOW()')
                           ->order('create_date', 'DESC')
                           ->limit(10)
                           ->all();

        if(count($result) == 0) {
            $result = false;
        }

        return $result;
    }
}

?>