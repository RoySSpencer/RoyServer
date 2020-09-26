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

        if (isset($_POST)) {
          $this->postHandler();
        }

        if ($this->Authentication->checkUser()){
            echo "hi";
        }

    }

    public function postHandler() {
        if (isset($_POST['username'])) {
            $_SESSION['loggedIn']['username'] = $_POST['username'];
        }
        if (isset($_POST['password'])) {
            $_SESSION['loggedIn']['password'] = $_POST['password'];
        }
    }

    public function start() {
      $wrapper->header("Roy Spencer -- Project 1");
      $wrapper->nav(["/" => "Home", "/P1" => "Data"], $_SERVER['REQUEST_URI'], false);
      $wrapper->bodyStart();
    }

    public function end() {
      $wrapper->bodyEnd();
      $wrapper->footer();
    }
}
