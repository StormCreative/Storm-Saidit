<?php
class Users extends C_Controller 
{
    public function login() 
    {
        $users_model = new Users_model();
        $error = false;

        if(post_set()) {
            $result = $users_model->find_where_username_password(array('username' => $_POST['users']['username'],
                                                                       'password' => sha1($_POST['users']['password'])
                                                                    ));

            if( !!$result['id'] ) {
                $_SESSION['user']['level'] = $result['level'];
                $_SESSION['user']['id'] = $result['authors_id'];
                header('location: '.DIRECTORY);
            } else {
                $error = true;
            }
        }

        $this->addTag('hide_login', true);
        $this->addTag('hide_back_btn', true);
        $this->addTag('error', $error);

        $this->addStyle('posts');
    } 

    public function forgot()
    {
        if( post_set() ) {

            $users_model = new Users_model();
            $output = $users_model->find($_POST['users']['username'], 'username');

            if( !!$users_model->id ) {

                $data['password'] = random_string(8);

                $users_model->password = sha1($data['password']);
                $users_model->save();

                $mail = new Mail('forgotten-password', $data);
                $mail->to = $_POST['users']['username'];
                $mail->from = 'no-reply@saidit.co.uk';
                $mail->subject = 'Saidit - Forgotten password request';
                $mail->send();

                $success = true;
            } else {
                $failure = true;
            }

        }

        $this->addTag('hide_login', true);
        $this->addTag('success', $success);
        $this->addTag('failure', $failure);

        $this->addTag('hide_back_btn', true);
        $this->addStyle('posts');
    }

    public function logout()
    {
        session_destroy();

        header('location: '.DIRECTORY);
    }

    public function signup()
    {
        if(post_set()) {

            $_POST['users']['password'] = sha1($_POST['users']['password']);
            
            $users = new Users_model(array('username' => $_POST['users']['username'],
                                           'password' => $_POST['users']['password'],
                                           'authors' => $_POST['authors']
                                           ));
            $result = $users->save();

            if( $result != false ) {

                $_SESSION['user']['id'] = $users->authors_id;

                header('location: '.DIRECTORY);
            } else {
                $this->addTag('errors', $users->errors);
            }
        }

        $this->addStyle('posts');
    }

    public function settings()
    {
        $error = false;
        $users = new Users_model();
        $user = $users->find_where_authors_id(array('authors_id' => $_SESSION['user']['id']));

        if( post_set() ) {

            if( ($_POST['users']['password'] == $_POST['users']['confirm']) && ($_POST['users']['password'] != "" && $_POST['users']['confirm'] != "") ) {

                $users->password = sha1($_POST['users']['password']);
                $output = $users->save();

                if($output) {
                    $success = true;
                }
            } else {
                
                $error = true;
            }
        }

        $user = $users->find_where_authors_id(array('authors_id' => $_SESSION['user']['id']));

        $this->addTag('error', $error);
        $this->addTag('success', $success);
        $this->addTag('hide_back_btn', true);
        $this->addTag('user', $user);
        $this->addStyle('posts');
    }

    public function get()
    {
        $this->plain();

        $name = str_replace('@', '', $_POST['name']);
    
        $users = new Authors_model();
        $users->where('authors.name LIKE :name');

        $result = $users->all(array('name' => "%".$name."%"));

        if( count($result) > 0 ) {
            $result = array( 'status' => 200, 'results' => $result );
        } else {
            $result = array('status' => 201);
        }

        exit(json_encode($result));
    }
}
?>