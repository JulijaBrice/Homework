<?php

    class modifyForm {
      private $description;
      private $state;
      private $id;

      public function __construct($description = null, $state = null, $id = null)
      {
        $this->description = $description;
        $this->state = $state;
        $this->id = $id;
      }
      public function html(){
        ?>
          <form action="/final_work/?page=modify" method="POST">
            <input name="description" value="<?= $this->description ?>">
            <input type="hidden" name="state" value="<?= $this->state ?>">
            <input type="hidden" name="id"value="<?= $this->id ?>">
            <button type="submit">Save</button>
          </form>
        <?php
      }

      public function html_hidden(){
        ?>
          <form hidden id="modify_form_<?=$this->id?>" action="/final_work/?page=modify" method="POST">
            <input type="hidden" name="description" value="<?= $this->description ?>">
            <input type="hidden" name="state" value="<?= $this->state ?>">
            <input type="hidden" name="id"value="<?= $this->id ?>">
          </form>
        <?php
      }
    }
?>