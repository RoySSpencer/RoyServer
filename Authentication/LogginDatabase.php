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
        if (!isset($_SESSION['loggedIn']['username']) || !isset($_SESSION['loggedIn']['password'])) {
            return false;
        }

        $sql = "select username, password from Logins";

        $result = mysqli_query($this->conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            if ($row['username'] == $_SESSION['loggedIn']['username'] && $row['password'] == $_SESSION['loggedIn']['password']) {
                return true;
            }
        }

        return false;
    }

    public function createAcount($username, $password) {
      $sql = "insert into Logins (username, password, type) values (?, ?, 'user')";
      $stmt = mysqli_prepare($this->conn, $sql);
      // mysqli_bind_param($stmt, array(MYSQLI_BIND_STRING, MYSQLI_BIND_STRING), $username, $password);

      // var_dump($sql);

      // mysqli_execute($stmt);
    }

}
?>
