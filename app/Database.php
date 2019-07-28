<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 27.07.2019
 * Time: 13:33
 */

namespace app;
use PDO;

class Database
{
    protected static $connection;

    public static function openConnection()
    {
        self::$connection = new PDO("mysql:host=localhost; dbname=blog;charset=UTF8", "root", "", array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'" ));
    }

    public static function load(array $resultset)
    {

        foreach ($resultset as $key => $value) {
            $instance = $value;
        }
        return $instance;
    }
}