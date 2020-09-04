<?php

require __DIR__ . '/app/autoload.php';

use Bramus\Router\Router;

$router = new Router();

$router->get('/hello', "helloWorld");
$router->get('/about', function($name) {
    echo 'About Page Contents';
});

$router->run();

function helloWorld() {
    echo "hello world test pull";
}


?>