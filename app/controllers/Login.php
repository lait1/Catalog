<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.08.2019
 * Time: 1:21
 */

namespace app\controllers;


use app\models\User;

class Login extends Controller
{

    public function action_index($options)
    {
        $data = User::findByLogin($_POST["login"]);
        if(password_verify($data['password'], $_POST['password'])){
            $hash = password_hash(User::generateCode(10), PASSWORD_DEFAULT);

            $user = new User;
            $user->setId($data['id']);
            $user->setHash($hash);
            $user->insertHash();

            $_SESSION['auth']=true;
            $_SESSION['user_id']=$data['id'];
        }
        else{
            echo 'password error';
        }

    }
}