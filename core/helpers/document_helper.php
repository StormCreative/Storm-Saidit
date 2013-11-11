<?php

class Document_helper
{
	/**
	 * Method to save a document to the database and move it onto the server
	 * 
	 *
	 * @access static public
	 */
	static public function save( $id = "" )
	{
		$uploads = new Uploads_model();

		//Need this to handle the two different uploaders
        if (!!$_POST[ 'downloads' ]) {
            $doc_name = $_POST[ 'downloads' ][ $_POST[ 'document_name' ] ][ 'name' ];
            $doc_title = $_POST[ 'downloads' ][ $_POST[ 'document_name' ] ][ 'title' ];
        } else {
            $doc_name = $_POST[ 'upload_name' ][ 'actual' ];
            $doc_title = $_POST[ 'upload_name' ][ 'user' ];
        }

        //Just incase the document title isnt set
        //This should only happen when the user is updating a record with a document already associated with it
        if ( !$doc_title )
            $doc_title = $_POST[ 'uploads' ][ 'title' ];

        //Just incase the document name isnt set
        //This should only happen when the user is updating a record with a document already associated with it
        if ( !$doc_name )
            $doc_name = $_POST[ 'uploads' ]['name'];

        $fileinfo = pathinfo( !!$doc_name ? $doc_name : $doc_title );

        if( !!$_FILES[ 'uploads' ][ 'tmp_name' ][ 0 ] ) {
            //Prepare to save the upload
            //Generate a random name
            $new_name = random_string ( 10 ) . '.' . $fileinfo[ 'extension' ];

            //Move the file from the temporary location to the assets/upload/documents directory
            move_uploaded_file( $_FILES[ 'uploads' ][ 'tmp_name' ][ 0 ] , PATH . 'assets/uploads/documents/' . $new_name );
        }

        //Save the record and then return the ID of the row so it can be saved into the parent table
        if ( $uploads->save( array( 'id' => $_POST[ 'posts' ][ 'uploads_id' ], 'title' => ( !!$doc_title ? $doc_title : $doc_name ), 'name' => ( !!$new_name ? $new_name : $doc_name ), "posts_id" => $id ) ) ) {
             return $uploads->attributes[ 'id' ];
        }
           
	}

    public static function save_many( $id = "" )
    {
        $uploads = new Uploads_model();

        $name = array_filter( $_POST[ 'upload_name' ][ 'actual' ] );
        $title = array_filter( $_POST[ 'upload_name' ][ 'user' ] );

        $c = count( $name );

        for( $i = 0; $i < $c; $i++ ) {

            //Move
            if( !!$_FILES[ 'uploads' ][ 'tmp_name' ][ $i ] ) {

                $fileinfo = pathinfo( !!$name[ $i ] ? $name[ $i ] : $title[ $i ] );

                //Prepare to save the upload
                //Generate a random name
                $new_name = random_string ( 10 ) . '.' . $fileinfo[ 'extension' ];

                //Move the file from the temporary location to the assets/upload/documents directory
                move_uploaded_file( $_FILES[ 'uploads' ][ 'tmp_name' ][ $i ], PATH . 'assets/uploads/documents/' . $new_name );
            }

            $r = $uploads->save( array( 'id' => $_POST[ 'posts' ][ 'uploads_id' ],
                                        'title' => ( !!$title[ $i ] ? $title[ $i ] : $name[ $i ] ),
                                        'name' => ( !!$new_name ? $new_name : $name[ $i ] ),
                                        "posts_id" => $id ) );
        }
    }

    public static function save_frontend()
    {
        $doc_title = $_FILES[ 'uploads' ][ 'name' ][0];

        $fileinfo = pathinfo($doc_title);

        //Prepare to save the upload
        //Generate a random name
        $new_name = random_string ( 10 ) . '.' . $fileinfo[ 'extension' ];

        //Move the file from the temporary location to the assets/upload/documents directory
        move_uploaded_file( $_FILES[ 'uploads' ][ 'tmp_name' ][ 0 ] , PATH . 'assets/uploads/documents/' . $new_name );

        $uploads = new Uploads_model();
        
        //Save the record and then return the ID of the row so it can be saved into the parent table
        if ( $uploads->save ( array ( 'title' => $doc_title, 'name' => $new_name ) ) )
            return $uploads->attributes[ 'id' ];
    }
}

?>