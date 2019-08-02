<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 28.07.2019
 * Time: 16:05
 */

namespace app\models;

use PHPUnit\Framework\TestCase;

class GoodsTest extends TestCase
{

    public function testSave()
    {
        $Goods = new Goods;
        $Goods->setId(1);
        $Goods->setName('Probka3');
        $Goods->setAmount(3);
        $Goods->setDesc('i dont know');
        $Goods->setDateCreate(date('Y-m-d H:i:s'));
        $id=$Goods->save();
        $this->assertEquals(3, $id);
    }

    public function testGetGoods()
    {
        $Goods = Goods::GetGoods(1);
        $this->assertEquals('Probka', $Goods['name']);

    }


}
