<?php
      $dbhost = "localhost:3306";
      $dbuser = "root";
      $dbpass = "";
      $dbname = "shop";
      $dbConnection = new mysqli ($dbhost, $dbuser, $dbpass, $dbname);

      $id = $_GET["id"];
      $sql = "DELETE FROM products WHERE id=$id";
      $dbConnection ->query($sql);

      Header('Location: /products/list.php');
 ?>