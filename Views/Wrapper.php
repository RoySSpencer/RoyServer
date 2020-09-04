<link rel="stylesheet" href="/RoyServer/assests/css/wrapper.css">
<?php

class Wrapper {
    public function header() {
        ?>
        <div id="header">
            <h1>Roy Spencer -- Testing</h1>
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
}

?>