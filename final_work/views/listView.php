<?php

   class listView {
       private $taskList;

       public function __construct($data)
       {
         $this->taskList = $data;
       }

       public function html(){
        ?>
          <form class="logout_form" method="POST">
            <input type="hidden" name="Logout">
            <button class="logout_button" type="submit">Logout</button>
          </form>
          <h2 class="main_header">
            Tasks that <?=
            $_SESSION["loginname"] 
            ?> has to do
          </h2>
          <h3 class="add_task">
          <a href="/final_work/?page=list&action=modify">Add task</a>
          </h3>
          <div>
            <ul class="todo-list">
              <!--Show only not done -->
              <?php foreach($this->taskList as $task) {
                if($task["state"] != 0){
                  continue;
                }
                ?>
                <div class="todo" >
                  <input class="checkbox" task_id="<?=$task["id"]?>" type="checkbox" <?= $task["state"]!="0" ? "checked" : "" ?>>
                  <i class="fas fa-check" aria-hidden="true"></i>
                  <?php
                    $form = new modifyForm($task["description"], $task["state"], $task["id"]);
                    $form->html_hidden();
                  ?>
                  <li class="todo-item <?= $task["state"]!="0" ? "strike" : "" ?>" >        <input type="text" value="<?= $task["description"]?>" class="input_long"></li>
                  <a class="edit_button" href="/final_work/?page=list&action=modify&task_id=<?= $task['id']?>">Edit</a>
                  <a class="trash-btn" href="/final_work/?page=delete&task_id=<?= $task['id']?>">Delete</a>
                </div>
              <?php } ?>
              <!-- Show only Done -->
              <?php foreach($this->taskList as $task) { 
                if($task["state"] != 1){
                  continue;
                }
                ?>
                <div class="todo completed">
                <input class="checkbox" task_id="<?=$task["id"]?>" type="checkbox" <?= $task["state"]!="0" ? "checked" : "" ?>>
                <?php
                  $form = new modifyForm($task["description"], $task["state"], $task["id"]);
                  $form->html_hidden();
                  ?>
                 <li class="strike" ><input type="text" value="<?= $task["description"]?>" class="input_long"></li>
                 <a class="trash-btn" href="/final_work/?page=delete&task_id=<?= $task['id']?>">Delete</a>
                </div>
              <?php } ?>
            </ul>
          </div>
          <script src="js/listView.js"></script>
        <?php
       }
    } 
?>