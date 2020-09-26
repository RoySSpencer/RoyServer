<?php

namespace Authentication;

USE \Views\Wrapper;

class Authentication {
    public function __construct() {
        $this->db = new LogginDatabase();
        $this->wrapper = new Wrapper();
    }

    public function checkUser() {
        if (isset($_SESSION['loggedIn'])){
            if ($this->db->checkLogin()){
                return true;
            } else {
              ?>
              <div class="alert alert-danger" role="alert">
                Wrong username or password!
              </div>
              <?php
              $this->getLoggin();
              unset($_SESSION['loggedIn']);
            }
        } else {
            $this->getLoggin();
        }

        return false;

    }

    public function getLoggin() {
        ?>
        <h4 style="margin-bottom: 2em;">Log in</h4>
        <form method="post">
        <?php

        $this->input("username", "Username");
        $this->input("password", "Password");

        $this->button("sign-in", "Submit");
        ?>
        </form>
        <?php

        ?>
        <div class="row input-row">
            <a href="/sign-up">Sign-up</a>

        </div>
        <?php
    }

    public function signup() {
      $this->wrapper->header("Sign-up");
      $this->wrapper->nav(["/" => "Home", "/P1" => "Login"], $_SERVER['REQUEST_URI']);
      $this->wrapper->bodyStart();

      if (isset($_POST)) {
        $this->postHandler();
      }

      ?>
      <form method="post">
      <?php
      $this->input("newUsername", "Username");
      $this->input("newPassword", "Password");
      $this->input("newRepassword", "Re-Password");

      $this->button("sign-in", "Submit");
      ?>
      </form>
      <?php

      $this->wrapper->bodyEnd();
    }

    public function postHandler() {
      if (isset($_POST['username'])) {
        $_SESSION['loggedIn']['username'] = $_POST['username'];
        unset( $_POST['username']);
      }
      if (isset($_POST['password'])) {
        $_SESSION['loggedIn']['password'] = $_POST['password'];
        unset( $_POST['password']);
      }
      // if (isset($_POST['newUsername']) || isset($_POST['newPassword']) || isset($_POST['newRepassword'])) {
      //   // $this->newAccount();
      // }
    }

    // public function newAccount() {
    //   if (isset($_POST['newUsername']) && isset($_POST['newPassword']) && isset($_POST['newRepassword'])) {
    //     if ($_POST['newPassword'] == $_POST['newRepassword']) {
    //       $this->db->createAcount($_POST['newUsername'], $_POST['newPassword']);
    //       unset($_POST['newUsername']);
    //       unset($_POST['newPassword']);
    //       unset($_POST['newRepassword']);
    //
    //       header("location: /");
    //
    //       exit;
    //     }
    //   }
    //   unset($_POST['newUsername']);
    //   unset($_POST['newPassword']);
    //   unset($_POST['newRepassword']);
    //
    //   header("location: /sign-up");
    //
    //   exit;
    // }

    public function input($id, $name) {
        ?>
        <div class="row input-row">
            <div class="col-md-4">
                <label for="<?=$id?>">
                    <?=$name?>
                </label>
            </div>

            <div class="col-md-8">
                <input type="text" id="<?=$id?>" name="<?=$id?>" style="width:100%">
            </div>

        </div>
        <?php
    }

    public function button($id, $name) {
        ?>
        <div class="row btn-row">
            <button class="submit-btn" type="submit" id="<?=$id?>"><?=$name?></button>
        </div>
        <?php
    }
}
