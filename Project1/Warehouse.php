<?php

namespace Project1;

class Warehouse{

    public function __construct() {
        $servername = "localhost:3036";
        $username = "roy";
        $password = "toyroy";

        // Create connection
        $conn = mysql_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . $conn->connect_error);
        } 
        echo "Connected successfully";

        mysql_close($conn);
        // $conn->close();
    }
    
}
?>