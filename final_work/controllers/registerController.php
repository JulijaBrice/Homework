<?php
    require_once __DIR__ . "/../views/registerView.php";
    require_once __DIR__ . "/../DB_wrapper.php";

    if (!empty($_POST["loginname"]) && !empty($_POST["password"])){
      $loginname = $_POST['loginname'];
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (loginname, password) VALUES ('$loginname','$password')";

      DB::run($sql);
      Header("Location: /final_work/?page=login");
    }else{
      if (!empty($_POST)){
        echo "Some fields are missing";
      }
    }

    $view = new RegisterView();
    $view->html();
?>