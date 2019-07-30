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
use Exception;


class Add extends Controller
{

    public function action_index($options)
    {
//        try {
            switch ($options) {
                case 'category':
                    Add::createCategory();
                    break;
                case 'goods':
                    Add::createGood();
                    break;
                default:
                    echo 'Error';
//            exception('error, not this action');
            }
//        }catch(Exception $e){
//            echo "".$e->getMessage()."\n";
//            exit(-1);
//        }
    }
    public function createCategory()
    {
        $category = new Category;
        $category->setName($this->test_input($_POST['name_category']));
        $category->setDesc($this->test_input($_POST['desc']));
        $res = $category->save();
        if($res>0){
            echo json_encode('Category add');
        }else{
            echo json_encode('Add category failed');
//            throw new \Exception('error create category');
//            exception('error create category')
        }
    }
    public function createGood()
    {
        $goods = new Goods();
        $goods->setName($this->test_input($_POST['name_goods']));
        $goods->setDesc($this->test_input($_POST['desc']));
        $goods->setAmount($this->test_input($_POST['amount']));
        $goods->setDateCreate(date('Y-m-d H:i:s'));
        $res = $goods->save();
        if($res>0){
            echo json_encode('Goods add');
        }else{
//            exception('error create goods')
            echo json_encode('Add goods failed');

        }
    }

}