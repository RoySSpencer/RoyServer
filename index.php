<?php

require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/hello', "helloWorld");
$router->get('/about', function($name) {
    echo 'About Page Contents';
});

$router->run();

function helloWorld() {
    echo "hello world test pull";
}


?>