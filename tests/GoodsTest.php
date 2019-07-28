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
        $Goods->setName('Probka');
        $Goods->setAmount(4);
        $Goods->setDesc('i dont know');
        $Goods->setDateCreate(date('Y-m-d H:i:s'));
        $id=$Goods->save();
        $this->assertEquals(1, $id);
    }

    public function testGetAllGoods()
    {
        $this->assertTrue(true);
    }

    public function testDeleteGood()
    {
        $this->assertTrue(true);
    }

    public function testInsertCatProduct()
    {
        $this->assertTrue(true);
    }
}
