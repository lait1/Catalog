<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 27.07.2019
 * Time: 13:40
 */

namespace app\controllers;


use app\models\Category;
use app\models\Goods;

class Main extends Controller
{

    public function action_index($options)
    {
        $data['goods'] = Goods::GetGoods();
        $data['cat'] = Category::getCategory();
        $i=0;
        foreach ($data['goods'] as $dataID){
            $data['goods'][$i]['cats']=Goods::GetCatByGoods($dataID['ID']);
            $i++;
        }
        $this->view->generate('main.php', $data);
    }
}