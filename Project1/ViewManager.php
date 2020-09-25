<?php

class ViewManager {
    public function router($router) {
        $router->get('/P1/test', "test");

        $router->run();
    }

    public function test() {
        echo "hi";
    }

}