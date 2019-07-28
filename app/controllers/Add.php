<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 28.07.2019
 * Time: 12:44
 */

namespace app\controllers;


class Add extends Controller
{

    public function action_index($options)
    {
        switch ($options){
            case 'category':
                Add::createCategory();
                break;
            case 'goods':
                Add::createGood();
                break;
            default:
             json_encode('exception');
        }
    }
    public function createCategory()
    {

    }
    public function createGood()
    {

    }
}