<?php

class test_model extends activate
{
	public function __Construct( $attributes=array(), $clean=false )
	{
		parent::__Construct( $attributes, $clean );
		
		$this->has_one = 'has_one';
		$this->has_many = 'test_assoc';

		/*
		$this->_has_image = TRUE;
		$this->_has_upload = TRUE;

		//Set the validation from the fields, at the moment they will all be not_empty so we have something to test
		$this->has_one = "";
        $this->has_many = array();

		//$this->validates( "not_empty", "title" ); $this->validates( "not_empty", "msg" ); 
		*/
	}
}

?>