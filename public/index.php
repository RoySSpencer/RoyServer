<?php

require __DIR__ . '/../vendor/autoload.php';

USE \Views\Wrapper;


$router = new \Bramus\Router\Router();

session_start();

// $router->get('/', "helloWorld");
$router->get('/', "helloWorld");
$router->get('/loggout', "loggout");
$router->setNamespace('\\Project1');
$router->match('GET|POST', '/P1', "ViewManager@dataPage");
// $router->get('/P1', "ViewManager@router");

linkHeader();

$router->run();

function linkHeader() {
    ?>

    <!-- <head> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- </head> -->

    <script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );


    </script>
    </div>
    <?php
}

function helloWorld() {
    // linkHeader();
    //
    $wrapper = new Wrapper();
    $wrapper->header("Roy Spencer -- Project List");
    $wrapper->bodyStart();

    $projects = array(
        "Project 1" => "<a href='/P1'>Project1Link</a>"
    );
    ProjectTable($projects);

    $wrapper->bodyEnd();
    $wrapper->footer();
}

function loggout() {
  // ob_start();
  unset($_SESSION['loggedIn']);
  header("roy.roypi.test");
  exit;
}




function ProjectTable($projects) {
    ?>
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($projects as $key => $val): ?>
            <tr>
                <td><?=$key?></td>
                <td><?=$val?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
}
