<?php
      require_once __DIR__. "/DB_wrapper.php";

      $id = $_GET["id"];
      $sql = "DELETE FROM products WHERE id=$id";
      
      DB::run($sql);

      Header('Location: /products/list.php');
 ?>