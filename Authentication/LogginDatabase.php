<?php

namespace Authentication;

class LogginDatabase{

    public function __construct() {
        $servername = "localhost";
        $username = "roy";
        $password = "toyroy";
        $db = "Passwords";

        // Create connection
        $this->conn = mysqli_connect($servername, $username, $password, $db);
    }

    public function checkLogin() {
        $sql = "select username, password from Logins";

        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_row($result);

        var_dump($rows);
        var_dump($_SESSION);

        if (!isset($_SESSION['loggedIn']['username']) || !isset($_SESSION['loggedIn']['password'])) {
            return false;
        }

        foreach($rows as $row) {
          var_dump($row);
            if ($row[0] == $_SESSION['loggedIn']['username'] && $row[1] == $_SESSION['loggedIn']['password']) {
                return true;
            }
        }

        return false;

        // var_dump($row);
    }

}
?>
