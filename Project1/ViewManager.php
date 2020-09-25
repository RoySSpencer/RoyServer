<?php

namespace Project1;

USE \Views\Wrapper;
USE \Project1\Warehouse;

class ViewManager {
    public function __construct() {
        $this->db = new Warehouse();
    }

    public function router() {

        linkHeader();
        $wrapper = new Wrapper();
        $wrapper->header("Roy Spencer -- Project List");
        $wrapper->bodyStart();

        
        if ($this->checkUser()){
            echo "hi";
        }

        $wrapper->bodyEnd();
        $wrapper->footer();
        
        
    }

    public function checkUser() {
        if (isset($_SESSION['loggedIn'])){
            if ($this->db->checkLogin()){
                return true;
            }
        }

        return false;

    }

}