<?php

namespace Project1;

USE \Views\Wrapper;
USE \Project1\Warehouse;
USE \Authentication\Authentication;

class ViewManager {
    public function __construct() {
        $this->db = new Warehouse();
        $this->Authentication = new Authentication();
    }

    public function router() {

        linkHeader();
        $wrapper = new Wrapper();
        $wrapper->header("Roy Spencer -- Project List");
        $wrapper->bodyStart();

        
        if ($this->Authentication->checkUser()){
            echo "hi";
        }

        $wrapper->bodyEnd();
        $wrapper->footer();
        
        
    }

}