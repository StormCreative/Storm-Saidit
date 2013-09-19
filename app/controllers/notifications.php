<?php

class Notifications extends C_Controller {

    public function index()
    {
        $this->addTag('notifications', Notifications_model::get($_SESSION['user']['id'], 1));

        $this->addStyle('posts');
        $this->setView('notifications/index');

        // Set the notifications to read.
        $output = Notifications_model::set_to_read($_SESSION['user']['id']);   
    }

    public function set()
    {
        $this->plain();

        $not = new Notifications_model();

        //$not->find_where_authors_id(array('authors_id' => $_SESSION['user']['id']));
        $not->where('notifications.authors_id = :authors_id');

        $not->find(array('authors_id' => $_SESSION['user']['id']));

        $not->status = 1;

        $not->save();
    }
}
?>