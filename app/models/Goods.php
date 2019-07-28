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

    const INSERT_CAT_PRODUCT = "INSERT INTO product_category(ID_category, ID_good) value (:ID_category, :ID_good)";
    const INSERT_GOOD = "INSERT INTO goods(name, desc, amount, date_create) value (:name, :desc, :amount, :date_create)";
    const UPDATE_GOOD = "UPDATE goods SET name=:name, desc=:desc, amount=:amount, date_create=:date_create WHERE id=:id";
    const DELETE_GOOD = "DELETE FROM goods WHERE id=:id";

    protected $id;
    protected $name;
    protected $desc;
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
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
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


    public static function GetAllGoods()
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::GET_ALL_GOODS);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }


    public function save()
    {
        database::openConnection();
        If(empty($this->id))
        {
         $stmt = self::$connection->prepare(self::INSERT_GOOD);
         $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
         $stmt->bindParam(':desc', $this->desc, PDO::PARAM_STR);
         $stmt->bindParam(':amount', $this->amount, PDO::PARAM_INT);
         $stmt->bindParam(':date_create', $this->date_create, PDO::PARAM_INT);
         $stmt->execute();
         return $this->id = self::$connection->lastInsertId();
        }
        else{
         $stmt = self::$connection->prepare(self::UPDATE_GOOD);
         $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
         $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
         $stmt->bindParam(':desc', $this->desc, PDO::PARAM_STR);
         $stmt->bindParam(':amount', $this->amount, PDO::PARAM_INT);
         $stmt->bindParam(':date_create', $this->date_create, PDO::PARAM_INT);
         $stmt->execute();
        }
    }
    public function insertCatProduct($category){
        database::openConnection();
        $stmt = self::$connection->prepare(self::INSERT_CAT_PRODUCT);
        $stmt->bindParam('ID_category', $category, PDO::PARAM_INT);
        $stmt->bindParam('ID_good', $this->id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function deleteGood()
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::DELETE_GOOD);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
    }

}