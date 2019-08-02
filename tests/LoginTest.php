<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.08.2019
 * Time: 22:07
 */

namespace app\controllers;

use app\models\User;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{

    public function testAction_index()
    {
        session_start();
        $_POST["login"] = 'lait';
        $_POST['password']='123123';

        $data = User::findByLogin($_POST["login"]);
       var_dump($data);
        if(password_verify($_POST['password'], $data['password'])) {

            $user = new User;
            $user->setId($data['ID']);
            $user->setHash(SID);
            $user->insertHash();
            $res = User::AccessCheck();

            $this->assertEquals(true, $res);
        }
    }
}
