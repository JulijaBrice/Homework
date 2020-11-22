<?php

   class listView {
       private $taskList;

       public function __construct($data)
       {
         $this->taskList = $data;
       }

       public function html(){
        ?>
          <form method="POST">
            <input type="hidden" name="Logout">
            <button type="submit">Logout</button>
          </form>
          <h2>
            My Tasks
          </h2>
          <a href="/final_work/?page=list&action=modify">Add task</a>
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
                  <?php
                    $form = new modifyForm($task["description"], $task["state"], $task["id"]);
                    $form->html_hidden();
                  ?>
                  <li class="todo-item <?= $task["state"]!="0" ? "strike" : "" ?>" ><?= $task["description"]?></li>
                  <a class="check-btn" href="/final_work/?page=list&action=modify&task_id=<?= $task['id']?>">Edit</a>
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
                 <li class="strike" ><?= $task["description"]?></li>
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