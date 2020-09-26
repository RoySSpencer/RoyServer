<?php

namespace Project1;

USE \Views\Wrapper;
USE \Project1\Warehouse;
USE \Authentication\Authentication;

class ViewManager {
    public function __construct() {
        $this->db = new Warehouse();
        $this->Authentication = new Authentication();
        $this->wrapper = new Wrapper();
    }

    public function dataPage() {

      if (isset($_POST)) {
        $this->postHandler();
      }

      $this->start();

      if ($this->Authentication->checkUser()){
          makeItemTable($this->db->getItems());
      }

      $this->end();

    }

    public function postHandler() {
        if (isset($_POST['username'])) {
            $_SESSION['loggedIn']['username'] = $_POST['username'];
        }
        if (isset($_POST['password'])) {
            $_SESSION['loggedIn']['password'] = $_POST['password'];
        }
    }

    public function makeItemTable($rows) {
      ?>
      <table id="table_id" class="display">
          <thead>
              <tr>
                  <th>Item</th>
                  <th>Quantity</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach($rows as $rowl): ?>
              <tr>
                  <td><?=$row["name"]?></td>
                  <td><?=$row["quantity"]?></td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <?php
    }

    public function start() {
      $this->wrapper->header("Roy Spencer -- Project 1");
      $loggedIn = false;
      if (isset($_SESSION['loggedIn'])) {
        $loggedIn = true;
      }
      $this->wrapper->nav(["/" => "Home", "/P1" => "Data"], $_SERVER['REQUEST_URI'], $loggedIn);
      $this->wrapper->bodyStart();
    }

    public function end() {
      $this->wrapper->bodyEnd();
      $this->wrapper->footer();
    }
}
