<?php
      require_once __DIR__. "/DB_wrapper.php";

      // $dbhost = "localhost:3306";
      // $dbuser = "root";
      // $dbpass = "";
      // $dbname = "shop";
      // $dbConnection = new mysqli ($dbhost, $dbuser, $dbpass, $dbname);

    if (isset($_GET["table"])){
      $table = $_GET["table"];
      $sql = "SELECT * FROM $table";

      $response = [];

      $sqlResponse = DB::run($sql);

      if($sqlResponse){
        $response = $sqlResponse->fetch_all(MYSQLI_ASSOC);
      }else {
        $response = ["error" => "missing table:" . $_GET["table"]];
      }


      echo json_encode ($response);
    }
    if ($_GET['product_name']){
      $productName = $_GET['product_name'];
      $sql = "SELECT * FROM products WHERE name= '$productName'";

      $response = DB::run($sql) ->fetch_assoc();

      echo json_encode(["products"=> $response]);
    }
?>