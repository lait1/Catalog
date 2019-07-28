<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 27.07.2019
 * Time: 9:13
 */

namespace app;


use app\controllers\Add;
use app\controllers\Main;

class Route
{
    /**
     *
     */
    public static function start()
    {
        $routes = [
            '/' => Main::class,
            'add'=> Add::class,

        ];

        $options='index';
        $url = $_SERVER['REQUEST_URI'];
        $path = explode('/', $url);

        if(!empty($path[1])) $url = $path[1];
        if(isset($path[2])) $options = $path[2];

        if (isset($routes[$url])){
            $className = $routes[$url];
            $controller = new $className();
            $controller->action_index($options);
        }
        else{
            Route::Error404();
        }
    }
    public static function Error404()
    {
//        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
//        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
//        header('Location:'.$host.'404');
        echo 'AAAAAAAAAAAAAAAAAAAAAAAAAAA';
    }
}