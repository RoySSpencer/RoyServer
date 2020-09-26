<?php

namespace Views;

class Wrapper {
    public function header($title) {
        ?>
        <link rel="stylesheet" href="/assets/css/wrapper.css">
        <div id="header">
            <h1><?=$title?></h1>
        </div>
        <?php
    }

    public function nav($options, $current, $logout) {
        ?>
        <nav class="navbar navbar-expand-lg" style="background-color: #333; padding:0px;">
          <!-- <a class="navbar-brand" href="#">Navbar</a> -->
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <?php foreach($options as $key=>$val): ?>
                <li
                    class="nav-item active"
                    <?php if($current == $val): ?>
                            style="background-color: #222;"
                    <?php endif;?>
                >
                  <a class="nav-link" href="<?=$key?>" style="color: whitesmoke; padding: 10px 25px;"><?=$val?>

                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </nav>
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
