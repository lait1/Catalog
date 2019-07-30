<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 27.07.2019
 * Time: 12:52
 */

namespace app\controllers;


use app\views\View;

abstract class Controller
{
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }
    abstract public function action_index($options);

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}