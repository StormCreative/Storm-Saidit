<?php
/**
 * API
 * Slowly building up an API that uses simplified CRUD
 * for any given model.
 * Be used/useful for quick AJAX calls.
 */

class API {

    private static $table;
    private static $request_method;
    private static $process_method;
    private static $value;
    private static $model = NULL;

    public function __call($table, $method)
    {
        self::setup();

        $model = model_factory::load( $table );

        self::$request_method = self::set_request();

        if( $model )
        {
            self::$model = $model;
            
            if( method_exists( __CLASS__, $method[0] ) )
            {
                $response = $this->{$method[0]}();   
            }
            else
            {
                $response['message'] = 'BAD REQUEST: Method attempting to access does not exist';

                $response['status'] = 400;
            }
        }
        else
        {
            $response['message'] = 'BAD REQUEST: Table supplied not found!';

            $response['status'] = 400;
        }

        die( self::handle_response( $response ) );
    }


    /**
     * Sets up the table, method and value to action
     */
    private static function setup()
    {
        $router = new router();

        $uri = $router->_uri;

        unset( $uri[0] );

        self::$table = $uri[1];
        self::$process_method = $uri[2];
        self::$value = $uri[3];
    }


    /**
     * Formats and handles the API's response/output
     * @param mixed $data - the data to display as the data key
     * @return $response
     */
    private static function handle_response( $data )
    {
        switch( $_SERVER['CONTENT_TYPE'] )
        {
            case 'JSON':
                $response = json_encode( $data );
                break;
            default:
                $response = json_encode($data);
                break;
        }   

        return $response;
    }


    /**
     * Set the incoming request
     */
    private static function set_request()
    {
        switch( $_SERVER['REQUEST_METHOD'] )
        {
            case 'POST':
                $request = $_POST;
                break;
            case 'GET':
                $request = $_GET;  
                break;
        }
        
        return $request;
    }


    /**
     * Sets a where to the active instantiated model
     * @return false if where is not set
     */
    private static function add_where()
    {   
        $data = self::$request_method;
        
        $where = $data['where'];

        if( !!$where )
            self::$model->where( $where );
        else
            return false;
    }


    /**
     * Arranges the binds - in case of a password we hash it
     */
    private static function sort_binds()
    {
        $binds = self::$request_method['binds'];

        foreach( $binds as $key => $value )
            if( $key == 'password' )
                $binds[$key] = sha1($value);

        return $binds;
    }


    /**
     * Retrieve one set of data
     * @return assoc array $data
     */
    private function get()
    {
        self::add_where();

        $data = self::$model->find( (!!self::$value ? self::$value : self::sort_binds()) );

        if( $data !== false )
        {   
            //I commented this out because I needed the join data as well
            //$data = $data->_data;

            $callback = array( 'data' => $data, 'message' => 'OK', 'status' => '200' );
        }
        else
        {
            $callback = array( 'data' => $data, 'message' => 'No data found, error occurred', 'status' => '400' );
        }

        return $callback;
    }


    /**
     * Retrieve all data for a table
     * @return assoc $data
     */
    private function all() 
    {
        self::add_where();
        
        $data = self::$model->all( self::sort_binds() );

        return array( 'data' => $data, 'message' => 'OK', 'status' => '200' );
    }


    private static function arrange_data( $data ) 
    {
        for( $i = 0; $i<=count($data); $i++ )
        {
            if( is_array($data[$i]) )
                $data[$i] = implode(',', $data[$i] );
        }

        return $data;
    }


    /**
     * Creates an row in the table. Put method
     * @return int id - the id of the item inserted
     */
    private function create()
    {
        $data = self::$request_method;

        $data = self::arrange_data($data);

        $callback = self::$model->save( $data );

        if( $callback )
        {
            return array( 'data' => $callback, 'message' => 'OK', 'status' => '201', 'inserted_id' => self::$model->id );    
        }
        else
        {      
            if( !!self::$model->errors )
            {
                foreach( self::$model->errors as $error )
                    $errors[] = $error['message'];

                $message = 'Errors occurred when inserting:';    
                $errors = json_encode(self::$model->errors);
            }
            else
                $message = 'Item was not inserted for unknown reason. Its broke!';

            return array('message' => $message, 'status' => '400', 'errors' => $errors);
        }
    }

    private function session()
    {
        $data = self::$request_method;

        if( !!$data['session_name'] && !!$data['session_value'] )
        {
            $_SESSION[ self::$table ][ $data['session_name'] ] = $data['session_value'];

            $callback = array( 'message' => 'Session has been set', 'status' => '200' );
        }
        else
        {
            $callback = array( 'message' => 'Must provide session name and value to set a session', 'status' => '404' );
        }

        return $callback;
        
    }


    /**
     * Updates a given row in the table
     * @return boolean
     */
    private function update()
    {
        $data = self::$request_method;

        self::$model->find( self::$value );

        $callback = self::$model->save( $data );

        if( $callback )
        {
            $callback = array( 'data' => $callback, 'message' => 'Item updated OK', 'status' => '200' );
        }
        else
        {
            $callback = array( 'data' => $callback, 'message' => 'Item updated was not updated OK', 'status' => '401' );   
        }

        return $callback;
    }


    /**
     * Deletes an entry by the value
     * @return count
     */
    private function destroy()
    {
        $data = self::$request_method;
       
        if( $data['auth'] == true ) 
        {
            $data = self::$model->find( self::$value )->delete();

            if( $data )
                $callback = array( 'data' => $data, 'message' => 'Item deleted OK', 'status' => '200' );
            else
                $callback = array( 'data' => $data, 'message' => 'Item was not deleted. May not exist?', 'status' => '400' );
        }
        else
        {
            $callback = array( 'message' => 'Denied! - must be authenticated to delete an entry', 'status' => '400' );   
        }

        return $callback;
    }

    /**
     * Calls the email library to send a email
     * @return bool
     */
    private function email ()
    {
        $data = self::$request_method;
        $data = self::arrange_data($data);

        $users = new Users_model();
        $user_data = $users->where ( 'id = :id' )->all ( array ( 'id' => $data[ 'id' ] ) );
        $email = $user_data[0][ 'email' ];

        foreach ( $user_data[0]['user_details'][0] as $key => $value )
        {
            $data['params'][$key] = $value;
        }

        $mail = new mail ( $email, $data[ 'template' ], $data[ 'subject' ], $data['params'] );

        if ( $mail )
            $callback = array ( 'message' => 'Email has been sent successfully', 'status' => '200' );
        
        else
            $callback = array ( 'message' => 'The email could not be sent at this time', 'status' => '400' );
        
    }
}

?>