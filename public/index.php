<?php

//コントローラー クラスを読み込む
//require '../App/Controllers/Posts.php';
//require '../Core/Router.php';
//読み込むのをやめてautoloaderを実施

/**
 * auto loader
 */

 spl_autoload_register(function ($class){
     $root = dirname(__DIR__);//親ディレクトリ取得
     $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
     if(is_readable($file)){//ファイル名が読めれば
        require $root . '/' . str_replace('\\', '/',$class) . '.php';
     }
 });

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');//idが入った時

$router->dispatch($_SERVER['QUERY_STRING']);


    

// Display the routing table
//echo '<pre>';
//var_dump($router->getRoutes());
//echo htmlspecialchars(print_r($router->getRoutes(), true));
//echo '</pre>';


// Match the requested route
/*
$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for URL '$url'";
}
*/
