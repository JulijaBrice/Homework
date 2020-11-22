<?php
  class UserForm {
    private $btnText;
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