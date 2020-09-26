<?php

namespace Project1;

class Warehouse{

    public function __construct() {
        $servername = "localhost";
        $username = "roy";
        $password = "toyroy";
        $db = "online_ordering";

        // Create connection
        $this->conn = mysqli_connect($servername, $username, $password, $db);
    }

    public function getItems() {
        $sql = "select * from items";

        $result = mysqli_query($this->conn, $sql);

        $rows = array();

        while($row = mysqli_fetch_assoc($result)) {
            array_push($rows, $row);
        }

        return $rows;
    }

    public function addStock($id, $increase) {
      $increase = intval($increase);
      $sql = "update items set quantity = quantity + ".$increase." where id = ".$id;

      // $result = mysqli_query($this->conn, $sql);

      // $rows = array();
      //
      // while($row = mysqli_fetch_assoc($result)) {
      //     array_push($rows, $row);
      // }
      //
      // return $rows;

    }

}
?>
