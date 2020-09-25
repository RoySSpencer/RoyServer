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
        $this->input();
    }

    public function input($id = "test") {
        ?>
        <div class="row">
            <div class="col-md-4">
                <label for="<?=$id?>">
                    Username:
                </label>
            </div>

            <div class="col-md-8">
                <input type="text" id="<?=$id?>" name="<?=$id?>" style="width:100%">
            </div>

        </div>
        <?php
    }
}