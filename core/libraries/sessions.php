<?php

class sessions
{
    private static $sess;

    public function __Construct()
    {
        self::$sess = $_SESSION;
    }

    public static function create( $name, $message )
    {
        self::$sess[$name] = $message;
    }

    public static function get( $name )
    {
        return self::$sess[$name];
    }

    public static function check_access()
    {
        if (!isset($_SESSION['user']['id'])) {
            session_destroy();
            header('location: '.DIRECTORY.'users/login');
        }
    }

    public static function check_admin_access($status = 1) 
    {
        $output = false;

        if ($_SESSION['user']['level'] == $status) {
            $output = true;
        }

        return $output;
    }
}
