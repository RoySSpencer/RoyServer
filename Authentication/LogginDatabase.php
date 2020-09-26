<?php

namespace Authentication;

class LogginDatabase{

    public function __construct() {
        $servername = "localhost";
        $username = "roy";
        $password = "toyroy";
        $db = "Passwords";

        // Create connection
        $this->db = new mysqli($servername, $username, $password, $db);
    }

    public function checkLogin() {
        if (!isset($_SESSION['loggedIn']['username']) || !isset($_SESSION['loggedIn']['password'])) {
            return false;
        }

        $sql = "select username, password from Logins";

        $result = $this->db->query($sql);
        // $result = mysqli_query($this->conn, $sql);
        // $rows = mysqli_fetch_row($result);

        // var_dump($rows);
        var_dump($_SESSION);



        while($row = $result->fetch_assoc()) {
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
