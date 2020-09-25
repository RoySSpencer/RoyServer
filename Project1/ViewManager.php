<?php

namespace Project1;

USE \Views\Wrapper;
USE \Project1\Warehouse;

class ViewManager {
    public function router() {

        linkHeader();
        $wrapper = new Wrapper();
        $wrapper->header("Roy Spencer -- Project List");
        $wrapper->bodyStart();

        new Warehouse();
        echo "hi";

        $wrapper->bodyEnd();
        $wrapper->footer();
        
        
    }

}