<?php
/**
 * Front controller
 * 
 * php
 */

//echo 'requested URL = "'. $_SERVER['QUERY_STRING'] . '"';

/**
 * routing
 */
require '../Core/Router.php';
$router = new Router();//オブジェクト作成
//echo get_class($router);

//add the routes
$router -> add("",['controller' =>'Home','action' => 'index']);
$router -> add('posts',['controller' => 'Posts','action' => 'index']);
$router -> add('posts/new',['controller' => 'Posts','action' => 'new']);

//display the routing tables;
/*echo '<pre>';
var_dump($router ->getRoutes());
echo '<pre>';
*/
//match the requested route
$url = $_SERVER['QUERY_STRING'];
echo $url;

if($router->match($url)){
    echo '<pre>';
    var_dump($router->getParams());
    echo '<pre>';
}else{
    echo "ルートが見つかりません。'$url'";
}