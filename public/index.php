<?php
require_once '../app/init.php';
$route=new Route;
$route->get('/user/register','Account@register');
$route->get('/user/login','Account@login');
$route->get('/test','Test@home');
$route->get('/user/location','User@location');
$route->get('/user/chat','User@radius');
$route->get('/chatting/:id','Chatting@views');
$route->get('/chatting','Chatting@chat');
$route->run();
?>
