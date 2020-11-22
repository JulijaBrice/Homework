<?php
  require_once __DIR__ . "/../models/taskModel.php";
  $model = new taskModel();
  if (!empty($_POST["id"])){
    //Update
    $model->updateById(
      $_POST["id"], 
      $_POST["description"], 
      $_POST["state"],
    );
  }else{
    // Insert
    $model->insertNew(
      $_POST["description"], 
      $_SESSION["user_id"],
    );
  }
  Header("Location: /final_work/?page=list");
?>
