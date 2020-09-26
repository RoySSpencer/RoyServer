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
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="container-fluid">
            <ul class="navbar-nav">
              <?php foreach($options as $key=>$val): ?>
                <li
                    class="nav-item active"
                    <?php if($current == $key): ?>
                       style="background-color: #222;"
                    <?php endif;?>
                >
                  <a class="nav-link" href="<?=$key?>" style="color: whitesmoke; padding: 10px 25px;"><?=$val?></a>
                </li>
              <?php endforeach; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php if($logout): ?>
                   <li><a href="/loggout" style="color: whitesmoke; padding: 10px 25px;">Loggout</a></li>
              <?php endif;?>

            </ul>
          </div>
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
