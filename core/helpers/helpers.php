<?php

function encryptData($value){ 
   $key = "top secret key"; 
   $text = $value; 
   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB); 
   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND); 
   $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv); 
   return $crypttext; 
} 

function decryptData($value){ 
   $key = "top secret key"; 
   $crypttext = $value; 
   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB); 
   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND); 
   $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv); 
   return trim($decrypttext); 
}

/*
// As the server doesn't support DateTime class can not use it
function tidy_time_posted($date)
{
    // Create two new DateTime-objects...
    $date1 = new DateTime($date);
    $date2 = new DateTime(date('d-m-Y H:i:s'));

    // The diff-methods returns a new DateInterval-object...
    $diff = $date2->diff($date1);


    if( !!$diff->d ) {
        $time = $diff->d . ' days and ';
    }
    
    $time .= ($diff->h <= 1 ? 'less than ' : '' ) . $diff->h . ' hour'.($diff->h > 1 ? 's' : "");

    return $time;
}
*/

function tidy_time_posted($date)
{
    return date('d/m/Y H:i', strtotime($date));
}

function get_website_first_image($img)
{
    if( substr(str_replace(array('http://www.', 'https://www.'), '', $img), 0, 7) == 'youtube' ) {
        $key = get_youtube_key($img);
        $result = 'http://img.youtube.com/vi/'.$key.'/2.jpg';
    } else {
        $html = file_get_contents($img);

        $doc = new DOMDocument();
        @$doc->loadHTML($html);

        $tags = $doc->getElementsByTagName('img');

        if( $tags->length > 0 ) {

            $c = 0;
            foreach ($tags as $tag) {

                if( $c == 2 ) {
                   $result = $tag->getAttribute('src');
                }

                $c++;
            }
        } else {
            $result = false;
        }
    }
    
    return $result;
}

function get_youtube_key( $video )
{
    preg_match ( '/v=([^&]+)/', $video, $vid );
    
    if ( count ( $vid ) > 0 )
    {   
        // The correct match is the second item in array
        return $vid[ 1 ];
    }
    else
    {
        $video = explode ( '.be/', $video );
        
        return $video[1];
    }
}


function post_set()
{
    if( !!$_POST ) {
        return true;
    } else {
        return false;
    }
}

function checked_array($name, $value)
{
    foreach( $_POST[$name] as $item ) {
        if( $item == $value ) {
            $result = 'checked="checked"';
        } 
    }

    return $result;
}

function friendly_url ( $string )
{
    $string = preg_replace( "`\[.*\]`U", "", $string );
    $string = preg_replace( '`&(amp;)?#?[a-z0-9]+;`i', '-', $string );
    $string = htmlentities( $string, ENT_COMPAT, 'utf-8' );
    $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $string );
    $string = preg_replace( array( "`[^a-z0-9]`i","`[-]+`") , "-", $string );

    return strtolower( trim( $string, '-' ) );
}

function download ( $filename, $title = "", $location = 'admin/assets/uploads/documents'  )
{
    if ( !$filename )
        die ( 'must provide a file to download!' );
    else {
        $path =  PATH . $location . '/' . $filename;

        $ext = pathinfo ( $filename, PATHINFO_EXTENSION );

        if ( file_exists( $path ) ) {

            $size = filesize( $path );
            header( 'Content-Type: application/octet-stream' );
            //header( 'Content-Length: ' . $size );
            header( 'Content-Disposition: attachment; filename=' . $title . '.' . $ext );
            header( 'Content-Transfer-Encoding: binary' );

            $file = fopen( $path, 'rb' );

            if ($file) {
                fpassthru( $file );
                exit;
            } else {
                echo $err;
            }
        } else
            die ( 'Appears to be a problem with downloading that file.' );
    }
}

/**
 * This function is used by the work zone section to get the document type from the document name in a multidimensional array,
 * then add it to the multidimensional array and return the array
 *
 * @param array ( multi-dimensional ) $array
 * @param string $file_key
 *
 * @return array ( multi-dimensional )
 */
function get_file_type ( $array, $file_key )
{

    $i = 0;
    foreach ($array as $value) {
        $sections = explode ( '.', $value[ $file_key ] );

        switch ($sections[ 1 ]) {
            case ( 'doc' ) :
                $array[ $i ][ 'div' ] = 'word';
            break;

            case ( 'docx' ) :
                $array[ $i ][ 'div' ] = 'word';
            break;

            case ( 'ppt' ) :
                $array[ $i ][ 'div' ] = 'powerpoint';
            break;

            case ( 'pptx' ) :
                $array[ $i ][ 'div' ] = 'powerpoint';
            break;

            case ( 'xlsx' ) :
                $array[ $i ][ 'div' ] = 'excel';
            break;

            case ( 'xls' ) :
                $array[ $i ][ 'div' ] = 'excel';
            break;

            case ( 'pdf' ) :
                $array[ $i ][ 'div' ] = 'pdf';
            break;
        }

        $i++;
    }

    return $array;
}

function word_limiter ( $str, $limit = 100, $end_char = '&#8230;' )
{
    if ( trim( $str ) == '' )
        return $str;

    preg_match( '/^\s*+(?:\S++\s*+){1,' . (int) $limit .'}/', $str, $matches );

    if ( strlen( $str ) == strlen( $matches[0] ) )
        $end_char = '';

    //return rtrim ( $matches[0] ) . $end_char;
    return strip_tags( rtrim ( $matches[0] ) . $end_char );
}

/**
 * Creates a random string
 *
 * @param int $Length ( default 20 )
 *
 * @return string $string
 */
function random_string ( $length = 20 )
{
    $chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    srand ( (double) microtime () * 1000000 );
    $i = 0;
    $string = '' ;
    while ($i <= $length) {
        $num = rand () % 33;
        $tmp = substr ( $chars, $num, 1 );
        $string = $string . $tmp;
        $i++;
    }

    return $string;
}

/**
 * This function is used by the CMS to organise the success / error message
 *
 * @param string / array $feedback
 * @param bool $error ( Default FALSE )
 *
 * @return string $output
 */
function organise_feedback( $feedback, $error = FALSE )
{
    if ($error == TRUE) {
        $output = '<div class="error_message">';
        $output .= '<p>Errors occurred when attempting to save: </p>';
        $output .= '<ul>';

        foreach ($feedback as $item) {
            $output .= '<li>' . ucfirst ( str_replace( '_', ' ', $item[ 'message' ] ) ) . '</li>';
        }

        $output .= '</ul></div>';

        return $output;
    } else {
        return '<p class="success_message">' . $feedback . '</p>';
    }
}

/**
 * This function is to form the side menu
 *
 * I can form this getting all the database tables and removing the ones we done need
 * These will be images / uploads / access / migrations
 */
function get_menu ()
{
    $controllers = scandir ( PATH . '_admin/controllers/' );

    $db = new query();
    $tables = $db->getAssoc( 'SHOW TABLES' );

    //This gives us a multidimensional array so we need to extract the stuff we want
    $tables_filtered = array ();
    $not_allowed = array ( 'image', 'uploads', 'access', 'migrations' );

    foreach ($tables as $table) {
        $t = str_replace ( DB_SUFFIX . '_', "", $table[ 0 ] );

        if ( !in_array ( $t, $not_allowed ) )
            $tables_filtered[] = $t;
    }

    $output = '';

    //Process some output
    foreach ($tables_filtered as $ta) {
        $output .= '<li><a href="' . DIRECTORY . 'admin/listing/table/' . $ta . '">' . ucfirst( str_replace('_', ' ', $ta ) ) . '</a></li>';
    }

    return $output;
}

function starts_with( $value, $sep = "_" )
{
    $value = explode( $sep, $value );

    return $value[0];
}

function tidy_price($price)
{
    return number_format($price, 2, '.', '');
}

/**
 * Function to form the dropdowns on the products page
 *
 * @param array $items
 * @param string $selected
 *
 * @return string $options
 */
function form_dropdown ( $items, $selected = "" )
{
    $options = array();
    $options[] = '<option></option>';

    foreach ($items as $item) {
        if ( $item[ 'title' ] == $selected )
            $selected_attr = 'selected="selected"';
        else if ( $item[ 'title' ] != $selected )
            $selected_attr = NULL;

        $options[] = '<option value="' . $item[ 'title' ] . '" ' . $selected_attr . '>' . $item[ 'title' ] . '</option>';
    }

    return implode ( "", $options );
}

function in_array_r($needle, $haystack, $strict = false)
{
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}

function get_gallery ( $data )
{
    $image_model = new image_model();

    if ( is_array ( $data ) ) {
        $i = 0;
        foreach ($data as $item) {
            $data[ $i ][ 'images' ] = Image_model::many( $item[ '_gallery' ] );
            $i++;
        }
    } elseif ( is_object ( $data ) ) {
        $gallery = array();

        foreach ( explode ( ',', $data->attributes[ 'gallery' ] ) as $id ) {
            $item = $image_model->find( $id );
            $gallery[] = $item->attributes[ 'imgname' ];
        }

        $data->attributes[ 'gallery' ] = $gallery;
    }

    return $data;
}

function class_active( $page = '' )
{
    // Grab the current URI and remove the directory ( if working locally )
    $current_page = get_page();

    if ( is_array($page) && in_array ( $current_page, $page ) ) {
        return 'class="active"';
    } elseif ( $page == $current_page )

        return 'class="active"';
    else
        return '';
}

function get_page()
{
    // Set the current page
    $page = str_replace ( DIRECTORY, "", $_SERVER['REQUEST_URI'] );

    return ( !!$page ? $page : 'home' );
}
