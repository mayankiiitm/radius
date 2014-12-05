<?php
require_once '../app/init.php';
$route=new Route;
$route->get('/user/register','Account@register');
$route->get('/user/login','Account@login');
$route->get('/test','Test@home');
$route->run();
?>
