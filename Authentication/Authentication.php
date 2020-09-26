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
        ?>
        <form method="post">
        <?php

        $this->input("username", "Username");
        $this->input("password", "Password");

        $this->button("sign-in", "Submit");
        ?>
        </form>
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
