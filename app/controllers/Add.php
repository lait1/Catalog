<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 28.07.2019
 * Time: 12:44
 */

namespace app\controllers;


use app\models\Category;
use app\models\Goods;

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
//            exception('error, not this action');
        }
    }
    public function createCategory()
    {
        $category = new Category;
        $category->setName('');
        $category->setDesc('');
        $res = $category->save();
        if($res>0){
            json_encode('Category add');
        }else{
//            exception('error add category')
        }
    }
    public function createGood()
    {
        $goods = new Goods();
        $goods->setName('');
        $goods->setDesc('');
        $goods->setAmount('');
        $goods->setDateCreate(date('Y-m-d H:i:s'));
        $res = $goods->save();
        if($res>0){
            json_encode('Goods add');
        }else{
//            exception('error add goods')
        }
    }
}