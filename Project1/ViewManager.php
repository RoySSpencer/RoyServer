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
          $this->makeItemTable($this->db->getItems());
      }

      $this->end();

    }

    public function postHandler() {
      var_dump($_POST);
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
                  <th>Add Stock</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach($rows as $row): ?>
              <tr>
                  <td><?=$row["name"]?></td>
                  <td><?=$row["quantity"]?></td>
                  <td>
                    <form method="post">
                      <input type="text" id="increase" name="increase">
                      <button class="submit-btn" type="submit" id="<?=$row["id"]?>" value="<?=$row["id"]?>">Add</button>
                    </form>
                  </td>
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
