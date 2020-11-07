<?php
      $dbhost = "localhost:3306";
      $dbuser = "root";
      $dbpass = "";
      $dbname = "shop";
      $dbConnection = new mysqli ($dbhost, $dbuser, $dbpass, $dbname);

    if ($_GET["table"]){
      $table = $_GET["table"];
      $sql = "SELECT * FROM $table";

      $response = [];

      $sqlResponse = $dbConnection->query($sql);

      if($sqlResponse){
        $response = $sqlResponse->fetch_all(MYSQLI_ASSOC);
      }else {
        $response = ["error" => "missing table:" . $_GET["table"]];
      }


      echo json_encode ($response);
    }
?>