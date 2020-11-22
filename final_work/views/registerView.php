<?php
    require_once __DIR__ . "/../components/userForm.php";
    class RegisterView{

      public function html(){
        $form = new UserForm();
        $form ->setBtnText('Register');
        ?>
          <h1>
            Please Register
          </h1>
        <?php
        $form ->html();
        ?>
          <a href="./?page=login">Login</a>
        <?php
      }
    } 
?>