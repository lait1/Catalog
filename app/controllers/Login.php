<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.08.2019
 * Time: 1:21
 */

namespace app\controllers;


use app\models\User;

//We are looking for a login in the database.
//We verify the password from the database with the user entered.
//If successful, write the hash and user ID in the Auth table.

class Login extends Controller
{

    public function action_index($options)
    {
        if ($options=='exit'){
            session_destroy();
        }
        else{
            $data = User::findByLogin($_POST["login"]);

            if (password_verify($_POST['password'], $data['password'])) {

                $user = new User;
                $user->setId($data['ID']);
                $user->setHash(session_id());
                $user->insertHash();

                $_SESSION['auth'] = true;
                $_SESSION['user_id'] = $data['ID'];
                header('Location: http://catalog.local/');
            } else {
                echo 'password error';
            }
        }
    }
}