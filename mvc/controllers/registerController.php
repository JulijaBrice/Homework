<?php
    require_once __DIR__ . "/../views/registerView.php";
    require_once __DIR__ . "/../../products/DB_wrapper.php";

    if (!empty($_POST["email"]) && !empty($_POST["password"])){
      $email = $_POST['email'];
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (email, password) VALUES ('$email','$password')";

      DB::run($sql);
      Header("Location: /mvc/?page=login");
    }else{
      echo "Some fields are missing";
    }

    $view = new RegisterView();
    $view->html();
?>