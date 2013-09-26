<?php

class Notifications_model extends Activerecord
{
    public function __Construct($attributes=array())
    {
        parent::__Construct($attributes);

        $this->has_one = array('authors');

        $this->validates = array( array( "not_empty", "body" ) );
    }

    public static function add($users_id, $authors_id, $content)
    {       
        if( $users_id != $authors_id ) {

            $name = Users_model::get_name($users_id);

            //$content = '<a href="'.DIRECTORY.'?name='.urlencode($users_id).'">'.$name.'</a> '.str_replace(' ', '+', $content);
            $content = '<a href="'. SITE . DIRECTORY.'?name='.urlencode($users_id).'">'.$name.'</a> '.$content;
            $data['content'] = $content;

            $content = htmlspecialchars($content);
            
            $notifi = new Notifications_model(array('content' => $content, 'authors_id' => $authors_id));  

            $result = $notifi->save();

            // After saving the notification - will send an email to person who would
            // have written the original post to let them know someone has commented on their post
            $mail = new Mail('comment-report', $data);
            $mail->to = Users_model::get_email($authors_id);
            $mail->from = 'no-reply@saidit.co.uk';
            $mail->subject = 'Saidit - New comment on your post.';
            $mail->send();

        } else {
            $result = false;
        }

        return $result;
    }

    public static function get($id, $status = 0)
    {
        $notifi = new Notifications_model();

        if( $status == 0 ) {
            $notifi->where('notifications.status = 0');    
        }

        $notifi->order('status', 'ASC');

        $result = $notifi->where('notifications.authors_id = :authors_id')
                         ->all(array('authors_id' => $id));

        if(count($result) == 0) {
            $result = false;
        }
        
        return $result;
    }

    public static function set_to_read($id)
    {
        $not = new Notifications_model();

        $output = $not->table()->query->plain('UPDATE '.$not->full_table().' SET status = 1 WHERE authors_id = :authors_id', array('authors_id' => $id));
        
        return $output;
    }
}
?>  