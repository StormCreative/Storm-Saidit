<?php

class Paginater 
{
	public $page_no;
	public $per_page = 25;
	public $total_pages;
	public $total_items;
	public $offset;
	public $url;

	public function __Construct($config=array())
	{
		if( count($config) > 0 ) {
			foreach( $config as $key => $value ) {
				$this->{$key} = $value;
			} 
		}

		$this->setup();
	}

	public function setup()
	{
		if( $this->page_no == "" ) {
			$this->page_no = 1;
		}

		if( $this->page_no > 1 ) {
			$this->offset = (($this->page_no*$this->per_page)-$this->per_page);	
		}
		
		$this->total_pages = ceil( $this->total_items/$this->per_page );

		return $this;
	}

	public function get_back_btn()
	{
		$link = '';

		if( $this->page_no > 1 ) {
			$link = $this->url.'/'.($this->page_no-1);
		}

		return $link;
	}

	public function get_next_btn()
	{
		$link = '';

		if( $this->page_no < $this->total_pages ) {
			$link = $this->url.'/'.($this->page_no+1);
		}

		return $link;
	}

	public function paginate()
	{
	
	}
}

?>