<?php

if ( class_exists ( "query_builder" ) != TRUE )
    include "cmd/query_builder.php";

if ( class_exists ( "base_build" ) != TRUE )
    include "cmd/base_build.php";

class build_testtwo extends base_build
{
    private $_builder;

    protected $_schema = array ( "id" => array ( "name" => "id",
                                           "type" => "int",
                                           "limit" => "11" ),
                           "create_date" => array ( "name" => "create_date",
                                                    "type" => "timestamp",
                                                    "limit" => "" ),
                           "approved" => array ( "name" => "approved",
                                                 "type" => "int",
                                                 "limit" => "11" ),
                  "image_id" => array ( "name" => "image_id",
                                              "type" => "int",
                                              "limit" => "11" ),"uploads_id" => array ( "name" => "uploads_id",
                                                "type" => "int",
                                                "limit" => "255" ), );

    public function __Construct ( $db_name, $tablename )
    {
        $this->_tablename = $tablename;
        $this->_db_name = $db_name;

        $this->_build = new query_builder ( $db_name, "testtwo" );
    }

    public function put ()
    {
        $this->_build->create_table ( "testtwo" );

                    $this->_build->int ( "image_id", "11");
                    $this->_build->int ( "upoad_id", "11");
        $this->_build->timestamp ( "create_date" );
        $this->_build->run ();
    }


    /**
     * Method to decide whether to create the whole table or to send it to the method so it can be altered
     *
     * @access public
     */
    public function desc ()
    {
        $table_exists = mysql_query ( "SHOW TABLES LIKE 'pegisis_testtwo'" );

        if ( mysql_num_rows ( $table_exists ) == 0 )
            $this->put ();

        else
            $this->alter ();
    }
}

$build = new build_testtwo ( $this->_db_name, "testtwo" );
$build->desc ();

?>