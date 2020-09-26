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
            <a href="/sign-up"></a>

        </div>
        <?php
    }

    public function signup() {
        ?>
        <h4>Sign-up</h4>
        <?php
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
    }

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
