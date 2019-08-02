<?php
session_start();

spl_autoload_register(function ($class){
   include str_replace('\\', '/', $class).'.php';
});
\app\Route::start();