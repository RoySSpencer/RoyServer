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

    public function dataPage() {

        linkHeader();
        $wrapper = new Wrapper();
        $wrapper->header("Roy Spencer -- Project 1");
        $wrapper->bodyStart();

        if (isset($_POST)) {
          $this->postHandler();
        }
        
        if ($this->Authentication->checkUser()){
            echo "hi";
        }

        $wrapper->bodyEnd();
        $wrapper->footer();


    }

    public function postHandler() {
        if (isset($_POST['username'])) {
            $_SESSION['loggedIn']['username'] = $_POST['username'];
        }
        if (isset($_POST['password'])) {
            $_SESSION['loggedIn']['password'] = $_POST['password'];
        }
    }
}
