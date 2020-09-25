<?php

namespace Authentication;

class Authentication {
    public function __construct() {
        $this->db = new LogginDatabase();
    }

    public function checkUser() {
        if (isset($_SESSION['loggedIn'])){
            if ($this->db->checkLogin()){
                return true;
            } else {
                $this->getLoggin();
                echo "wrong username or password";
            }
        } else {
            $this->getLoggin();
        } 

        echo "not logged in";

        return false;

    }

    public function getLoggin() {
        echo "get loggin";
    }
}