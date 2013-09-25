<?php

class Authors
{
	public function order()
	{	
		$by_month = false;
		
		if( !!$_POST['when'] ) {
			$by_month = true;
		}

		$posts = Posts_model::top_posters($by_month);

		$_authors = array();

		$authors = new Authors_model();

		$authors = $authors->all();

		$authors_posts = array();

		foreach( $posts as $post ) {
			$name = Users_model::get_name($post['authors_id']);
			$_authors[] = array('posts' => $post['posts_total'], 'name' => $name);
			$authors_posts[] = $name;
		}

		if( !$by_month ) {
			$c = 0;
			foreach( $authors as $author ) {

				if( !in_array($author['name'], $authors_posts) ) {

					$_authors[] = array('posts' => count($author['posts']), 'name' => $author['name']);
				}

				$c++;
			}
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