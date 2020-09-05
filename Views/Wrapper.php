<link rel="stylesheet" href="/RoyServer/assests/css/wrapper.css">
<?php

class Wrapper {
    public function header($title) {
        ?>
        <div id="header">
            <h1><?=$title?></h1>
        </div>
        <?php
    }
    public function bodyStart() {
        ?>
        <div id="body">
            <div id="body-container">
        <?php
    }

    public function bodyEnd() {
        ?>
            </div>
        </div>
        <?php
    }

    public function footer() {
        ?>
        <div class='footer'>
            <p>Author: Roy Spencer --- Class: CSC-410</p>
        </div>
        <?php
    }
}

?>