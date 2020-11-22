<?php
  class UserForm {
    private $btnText;

    public function html_loginHeader(){
      ?> 
       <h1>
        Please Login
      </h1>
    <?php
    }

    public function html(){
      ?> 

    <form method="POST">
      <label>
        Login Name
        <input name="loginname">
      </label>
      <label>
        Password 
        <input type="password" name="password">
      </label>
      <button type="submit"><?= $this -> getBtnText() ?></button>
      <a href="./?page=register">Register</a>
    </form>

    <?php
    }

    public function setBtnText($text){
      $this->btnText = $text;
    }
    public function getBtnText(){
      return $this->btnText;
  }
}
?>