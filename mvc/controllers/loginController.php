<?php
require_once __DIR__ . "/../components/userForm.php";
require_once __DIR__ . "/../../products/DB_wrapper.php";

if (!empty($_POST["email"])) {
  $email = $_POST["email"];

  $sql = "SELECT * FROM users WHERE email = '$email'";
  $response = DB::run($sql)->fetch_assoc();

  if ($response) {
    if (!empty($_POST["password"])) {
      $IsValidPassword = password_verify(
        $_POST["password"],
        $response["password"]
      );

      if ($IsValidPassword) {
        session_start();
        $_SESSION["id"] = $response["email"];
        Header("Location: /mvc/?page=list");
        echo "You have logged in";
      } else {
        echo "Invalid password";
      }
    } else {
      echo "Password is not set";
    }
  } else {
    echo "User with email: '$email' does not exist";
  }
}
$form = new UserForm();
$form->setBtnText('Login');
$form->html();
