<?php
    require_once __DIR__ . "/../components/userForm.php";
    class RegisterView{

      public function html(){
        $form = new UserForm();
        $form ->setBtnText('Register');
        $form ->html();
      }
    } 
?>