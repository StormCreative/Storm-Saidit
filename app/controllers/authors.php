<?php

class Authors
{
	public function order()
	{
		$posts = Posts_model::top_posters();

		$_authors = array();

		$authors = new Authors_model();

		$authors = $authors->all();

		foreach( $posts as $post ) {

			$_authors[] = array('posts' => $post['posts_total'], 'name' => Users_model::get_name($post['authors_id']));
		}

		$c = 0;
		foreach( $authors as $author ) {

			if( $_authors[$c]['name'] != $author['name'] ) {

				$_authors[] = array('posts' => count($author['posts']), 'name' => $author['name']);
			}

			$c++;
		}

		if (!!$_POST['order']) {
			$order = $_POST['order'];

			if ($order == 'asc') {
				array_multisort($_authors, SORT_ASC);
			} else {
				array_multisort($_authors, SORT_DESC);
			}
			
		}
		
		if(count($_authors) > 0 ) {
			$result = array('status' => 201, 'data' => $_authors);
		} else {
			$result = array('status' => 401);
		}

		exit(json_encode($result));

		/*
		$_authors = array();

		

		foreach( $authors as $author ) {
			$_authors[] = array('ratings' => count($author['ratings']), 'name' => $author['name']);
		}

		
		*/
	}
}

?>