<?php

class Users_model extends Activerecord
{
    public function __Construct($attributes=array())
    {
        parent::__Construct($attributes);

        $this->has_one = array('authors');

        $this->validates = array( array( "not_empty", "username" ),
                                  array( 'not_empty', 'password' ) );
    }

    public static function get_name($id)
    {
        $users = new Users_model();
        $users->find_where_authors_id(array('authors_id' => $id));
        
        return $users->authors_name;
    }
}
?>  