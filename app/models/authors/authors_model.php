<?php

class Authors_model extends Activerecord
{
    public function __Construct()
    {
        parent::__Construct();
        $this->has_many = array('ratings', 'posts');
        $this->validates = array( array( "not_empty", "name" ) );
    }

    public static function get_all()
    {
    	$authors = new Authors_model();
    	$result = $authors->all();

    	return $result;
    }
}
?>  