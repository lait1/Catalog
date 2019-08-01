<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 02.08.2019
 * Time: 0:41
 */

namespace app\models;


use app\Database;
use PDO;

class User extends Database
{
    const FIND_BY_LOGIN = "SELECT * FROM Users WHERE login = :login";
    const FIND_BY_USER_ID = "SELECT * FROM Users WHERE id = :id";
    const FIND_BY_HASH = "SELECT user_id FROM auth WHERE hash = :hash";

    const INSERT_USER = "INSERT INTO Users (user_name, login, password) VALUES (:user_name, :login, :password)";
    const INSERT_HASH = "INSERT INTO auth (hash, user_id) VALUES (:hash, :id)";
    const DELETE_USER = "DELETE FROM Users WHERE id = :id";

    protected $id;
    protected $login;
    protected $user_name;
    protected $password;
    protected $hash;

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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name): void
    {
        $this->user_name = $user_name;
    }
    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash): void
    {
        $this->hash = $hash;
    }
    public function insertUser()
    {
        Database::openConnection();
        $stmt = self::$connection->prepare(self::INSERT_USER);
        $stmt->bindParam(':user_name', $this->user_name, PDO::PARAM_STR);
        $stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
        $stmt->execute();
        return $this->id = self::$connection->lastInsertId();
    }

    public function insertHash()
    {
        Database::openConnection();
        $stmt = self::$connection->prepare(self::INSERT_HASH);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':hash', $this->hash, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function findByID($id_user)
    {
        Database::openConnection();
        $stmt = self::$connection->prepare(self::FIND_BY_USER_ID);
        $stmt->bindParam(':id', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function findByLogin($login)
    {
        Database::openConnection();
        $stmt = self::$connection->prepare(self::FIND_BY_LOGIN);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public static function findByHash($hash)
    {
        Database::openConnection();
        $stmt = self::$connection->prepare(self::FIND_BY_HASH);
        $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public static function generateCode($length = 6)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clen)];
        }
        return $code;
    }

    public static function AccessCheck(){
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            $id_user = intval($_COOKIE['id']);
            $userData = self::findByID($id_user);
            if (($userData['user_hash'] !== $_COOKIE['hash']) or ($userData['id_user'] !== $_COOKIE['id'])) {
                return false;
            } else {
                return $userData;
            }
        }
    }


}