<?php
require_once __DIR__ . "/../components/userForm.php";
require_once __DIR__ . "/../DB_wrapper.php";
$form = new UserForm();

//user clicks on login
if (!empty($_POST["loginname"])) {
  $loginname = $_POST["loginname"];

  $sql = "SELECT * FROM users WHERE loginname = '$loginname'";
  $response = DB::run($sql)->fetch_assoc();

  if ($response) {
    if (!empty($_POST["password"])) {
      $IsValidPassword = password_verify(
        $_POST["password"],
        $response["password"]
      );

      if ($IsValidPassword) {
        session_start();
        $_SESSION["loginname"] = $response["loginname"];
        $_SESSION["user_id"] = $response["id"];
        Header("Location: /final_work/?page=list");
        echo "You have logged in";
      } else {
        echo "<div class='info_text'>Invalid password</div>";
      }
    } else {
      echo "<div class='info_text'>Password is not set</div>";
    }
  } else {
    echo "<div class='info_text'>User with login name: '$loginname' does not exist, please register</div>";
  }
}
else{
  // user loads the page
  ?>
  <h1 class="main_header">
    Please Login
  </h1>
  <?php
}
$form->setBtnText('Login');
$form->html();
?>
<a class="register_button" href="./?page=register">Register</a>

