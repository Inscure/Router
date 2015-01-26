<?php

require __DIR__ . '/../vendor/autoload.php';

$router = Router\Router::getInstance();

var_dump($router->getRoute());