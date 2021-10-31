<?php
include 'Helpers/App.php';
if (isset($_GET['url'])){
    $url=$_GET['url'];
    $url=explode('/',$url);
    $controller=ucfirst($url[0]).'Controller';
    $method=strtolower($url[1]);
}else{
    $method='home';
    $controller='HomeController';
}
session_start();
include 'Controllers/'.$controller.'.php';
$controller=new $controller();
echo $controller->$method();










