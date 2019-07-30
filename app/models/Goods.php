<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 27.07.2019
 * Time: 14:11
 */

namespace app\models;


use app\Database;
use PDO;

class Goods extends Database
{
    const GET_ALL_GOODS = "SELECT * FROM goods";
    const GET_GOOD = "SELECT * FROM goods WHERE id=:id";
    const GET_GOODS_BY_CAT = "select goods.ID as ID_goods, goods.name as goods_name, amount, date_create, goods.description as goods_desc, categories.ID as ID_cat, categories.name as cat_name
                from product_categories
                left join goods on goods.ID=ID_good
                left join categories on categories.ID=ID_category
                where categories.ID=:id";
    const GET_CAT_BY_GOODS = "select categories.ID as ID_cat, categories.name as cat_name
                from product_categories
                left join goods on goods.ID=ID_good
                left join categories on categories.ID=ID_category
                where goods.ID=:id";

    const INSERT_CAT_PRODUCT = "INSERT INTO product_category(ID_category, ID_good) value (:ID_category, :ID_good)";
    const INSERT_GOOD = "INSERT INTO goods(name, description, amount, date_create) value (:name, :desc, :amount, :date_create)";
    const UPDATE_GOOD = "UPDATE goods SET name=:name, description=:desc, amount=:amount, date_create=:date_create WHERE id=:id";
    const DELETE_GOOD = "DELETE FROM goods WHERE id=:id";

    protected $id;
    protected $name;
    protected $description;
    protected $amount;
    protected $date_create;
    protected $category;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->description;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->description = $desc;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * @param mixed $date_create
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;
    }



    public static function GetGoods($id=0)
    {
        if($id > 0) {
            database::openConnection();
            $stmt = self::$connection->prepare(self::GET_GOOD);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row ? self::load($row) : null;
        }else{
            database::openConnection();
            $stmt = self::$connection->prepare(self::GET_ALL_GOODS);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }

    }
    public static function GetGoodsByCat($id)
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::GET_GOODS_BY_CAT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public static function GetCatByGoods($id)
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::GET_CAT_BY_GOODS);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function save()
    {
        database::openConnection();
        If(!isset($this->id))
        {
         $stmt = self::$connection->prepare(self::INSERT_GOOD);
         $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
         $stmt->bindParam(':desc', $this->description, PDO::PARAM_STR);
         $stmt->bindParam(':amount', $this->amount, PDO::PARAM_INT);
         $stmt->bindParam(':date_create', $this->date_create, PDO::PARAM_INT);
         $stmt->execute();
         return $this->id = self::$connection->lastInsertId();
        }
        else{
         $stmt = self::$connection->prepare(self::UPDATE_GOOD);
         $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
         $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
         $stmt->bindParam(':desc', $this->description, PDO::PARAM_STR);
         $stmt->bindParam(':amount', $this->amount, PDO::PARAM_INT);
         $stmt->bindParam(':date_create', $this->date_create, PDO::PARAM_INT);
         $stmt->execute();
         return $this->id;
        }
    }
    public function insertCatProduct($category){
        database::openConnection();
        $stmt = self::$connection->prepare(self::INSERT_CAT_PRODUCT);
        $stmt->bindParam('ID_category', $category, PDO::PARAM_INT);
        $stmt->bindParam('ID_good', $this->id, PDO::PARAM_INT);
        $stmt->execute();

    }
    public static function deleteGood($id)
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::DELETE_GOOD);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}