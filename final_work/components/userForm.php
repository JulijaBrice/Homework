<?php
  class UserForm {
    private $btnText;
    public function html(){
      ?> 

    <form class="login_form" method="POST">
      <label class="login_lable">
        Login Name
      </label>
      <input name="loginname">
      <label class="login_lable">
        Password 
      </label>
      <input type="password" name="password">
      <button class="submit_button" type="submit"><?= $this -> getBtnText() ?></button>
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