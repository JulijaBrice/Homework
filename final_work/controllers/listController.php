<?php
  require_once __DIR__ . "/../views/listView.php";
  require_once __DIR__ . "/../models/taskModel.php";
  require_once __DIR__ . "/../components/modifyForm.php";

  if (isset($_POST["Logout"])){
    session_destroy();
    Header("Location: /final_work/?page=login");
  }

  $model = new taskModel();
  $tasks = $model->getAll($_SESSION["user_id"]);


  $view = new listView ($tasks);
  $view->html();

  if (isset($_GET["action"])&& $_GET["action"] === "modify"){
    if (isset($_GET["task_id"])){
      $task = $model->getById($_GET["task_id"]);

      $form = new modifyForm($task["description"], $task["state"], $task["id"]);
    }else{
      $form = new modifyForm();
    }
    $form->html();
  }
?>