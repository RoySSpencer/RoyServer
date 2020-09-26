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

        $result = mysqli_query($this->conn, $sql);
        // $rows = mysqli_fetch_row($result);

        var_dump($_SESSION);

        if (!isset($_SESSION['loggedIn']['username']) || !isset($_SESSION['loggedIn']['password'])) {
            return false;
        }

        while($row = mysqli_fetch_assoc($result)) {
          var_dump($row);
            if ($row['username'] == $_SESSION['loggedIn']['username'] && $row['password'] == $_SESSION['loggedIn']['password']) {
                return true;
            }
        }

        return false;

        // var_dump($row);
    }

}
?>
