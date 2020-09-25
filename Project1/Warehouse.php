<?php

namespace Project1;

class Warehouse{

    public function __construct() {
        $servername = "localhost";
        $username = "roy";
        $password = "toyroy";
        $db = "Passwords";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $db);

        // Check connection
        // if (!$conn) {
        //     die("Connection failed: " . $conn->connect_error);
        // } 
        // echo "Connected successfully";

        // mysql_close($conn);
        // $conn->close();
    }
    
}
?>