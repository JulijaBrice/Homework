<?php
  require_once __DIR__ . "/../models/listModel.php";
  $model = new listModel();
  if (!empty($_POST["id"])){
    //Update
    $model->updateById(
      $_POST["name"], 
      $_POST["price"], 
      $_POST["id"],
    );
  }else{
    // Insert
  }

  Header("Location: /mvc/?page=list");
?>
