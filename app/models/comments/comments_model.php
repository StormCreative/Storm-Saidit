<?php

class Comments_model extends Activerecord
{
    public function __Construct($attributes=array())
    {
        parent::__Construct($attributes);

        $this->has_one = array('authors');

        $this->validates = array( array( "not_empty", "body" ) );
    }
}

?>