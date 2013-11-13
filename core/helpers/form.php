<?php

class form
{
    /**
     * The forms name for referencing
     *
     * @var string
     */
    public static $form;

    /**
     * The forms method type (POST/GET)
     *
     * @var string
     */
    public static $method;

    /**
     * Begins the form with the form tags and sets the properties
     * for the form type and method type
     *
     * @param  string          $name
     * @param  string          $action
     * @param  optional string $method
     * @param  optional        $class
     * @return string
     */
    public static function start_form( $name, $action, $method="POST", $class="", $id = "" )
    {
        self::$form = $name;
        self::$method = $method;

        $class = (!!$class ? 'class="'.$class.'"' : "");
        $id = ( !!$id ? 'id="' . $id . '"' : '' );

        return '<form method="'.$method.'" action="'.$action.'" '.$class.' ' . $id . ' enctype="multipart/form-data">'."\n";
    }

    /**
     * Closes off the form
     *
     * @return string
     */
    public static function end_form()
    {
        return '</form>'."\n";
    }

    /**
     * Creates a text input for the form
     *
     * @param  string $name
     * @return string
     */
    public static function textfield( $name, $type="text" )
    {
        $value = $_POST[self::$form][$name];

        if( self::$method != 'POST' )
            $value = $_GET[self::$form][$name];

        $value = (!!$value ? $value : "");

        return '<label for="'.$name.'" class="form__text-label">'.ucwords($name).': </label>
                <input type="'.$type.'" name="'.self::$form.'['.$name.']" id="'.$name.'" value="'.$value.'">'."\n";
                
    }

    /**
     * Creates a text area for the form
     *
     * @param  string $name
     * @return string
     */
    public static function textarea( $name, $class="" )
    {
        $value = $_POST[self::$form][$name];

        if( self::$method != 'POST' )
            $value = $_GET[self::$form][$name];

        $value = (!!$value ? $value : "");

        return '<label for="'.$name.'" class="form__text-label">'.ucwords($name).': </label>
                <textarea name="'.self::$form.'['.$name.']" id="'.$name.'" class="'.$class.'">'.$value.'</textarea>'."\n";
    }

    /**
     * Creates a submit button
     *
     * @param  optional $name
     * @param  optional $value
     * @param  optional $class
     * @return string
     */
    public static function submit( $name="", $value="", $class="" )
    {
        $class = (!!$class ? 'class="'.$class.'"' : "");
        $name = (!!$name ? $name : 'submit' );
        $value = (!!$value ? $value : 'Submit' );

        return '<input type="submit" name="'.$name.'" '.$class.' value="'.$value.'">'."\n";
    }
}
