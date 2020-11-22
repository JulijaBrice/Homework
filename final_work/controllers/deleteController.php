<?php
  require_once __DIR__ . "/../models/taskModel.php";

  if (isset($_GET["task_id"])){
    $model = new taskModel ();
    $model->deleteById($_GET["task_id"]);
  }
  Header("Location: /final_work/?page=list");
?>