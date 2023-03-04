<?php
//require __DIR__ . '/../private/shared/header.php';
require __DIR__ . '/vendor/autoload.php';
use Project\Frameworks\DIContainer;
use Project\Frameworks\Router;

$container = new DIContainer();
$router = new Router($container);
$router->process($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

