<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 30.07.2019
 * Time: 10:14
 */

namespace app\controllers;

use app\models\Category;
use PHPUnit\Framework\TestCase;

class AddTest extends TestCase
{

    public function testCreateCategory()
    {
        $_POST['name_category']='Cartoon';
        $_POST['desc']='description';
        $category = new Category;
        $add = new Add;
        $category->setName($add->test_input($_POST['name_category']));
        $category->setDesc($add->test_input($_POST['desc']));
        $res = $category->save();
        $data = $category::getCategory($res);

        $this->assertEquals('Cartoon', $data['name']);
        $this->assertEquals('description', $data['description']);
    }
}
