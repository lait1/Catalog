<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 27.07.2019
 * Time: 13:40
 */

namespace app\controllers;


class Main extends Controller
{

    public function action_index($options)
    {


        $this->view->generate('main.php');
    }
}