<?php

class Authors_model extends Activerecord
{
    public function __Construct()
    {
        parent::__Construct();

        $this->validates = array( array( "not_empty", "name" ) );
    }
}
?>  