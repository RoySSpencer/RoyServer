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

        $this->button();
        ?>
        </form>
        <?php
    }

    public function input($id, $name) {
        ?>
        <div class="row">
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
        <div class="row">
            <button type="button">Submit</button>

        </div>
        <?php
    }
}
