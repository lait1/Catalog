<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 28.07.2019
 * Time: 13:20
 */

namespace app\models;


use app\Database;
use PDO;

class Category extends Database
{
    const FIND_CAT_BY_ID ="SELECT * FROM categories WHERE id=:id";
    const GET_ALL_CAT ="SELECT * FROM categories";

    const INSERT_CAT ='INSERT INTO categories(name, desc) value(:name, :desc)';
    const UPDATE_CAT ='UPDATE categories SET name=:name, desc=:desc WHERE id=:id';
    const DELETE_CAT ='DELETE FROM categories WHERE id=:id';


    protected $id;
    protected $name;
    protected $desc;

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

    public static function getCategory($id)
    {
        if(isset($id)) {
            database::openConnection();
            $stmt = self::$connection->prepare(self::FIND_CAT_BY_ID);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            database::openConnection();
            $stmt = self::$connection->prepare(self::GET_ALL_CAT);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    }
    public function save()
    {
        database::openConnection();
        If(empty($this->id))
        {
            $stmt = self::$connection->prepare(self::INSERT_CAT);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':desc', $this->desc, PDO::PARAM_STR);
            $stmt->bindParam(':date_create', $this->date_create, PDO::PARAM_INT);
            $stmt->execute();
            return $this->id = self::$connection->lastInsertId();
        }
        else{
            $stmt = self::$connection->prepare(self::UPDATE_CAT);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':desc', $this->desc, PDO::PARAM_STR);
            $stmt->execute();
        }
    }

    public function deleteGood()
    {
        database::openConnection();
        $stmt = self::$connection->prepare(self::DELETE_CAT);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
    }
}