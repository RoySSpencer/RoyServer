<?php

class ViewManager {
    public function router() {
        $router = new \Bramus\Router\Router();
        $router->get('/P1/test', "test");

        $router->run();

        echo "hi";
    }

}

function test() {
    echo "hi";
}