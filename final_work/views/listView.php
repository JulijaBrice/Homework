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

          <table>
            <thead>
              <tr>
                  <td>#</td>
                  <td>Description</td>
                  <td></td>
                  <td></td>
              </tr>
            </thead>
            <tbody>
              <!--Show only not done -->
              <?php foreach($this->taskList as $task) {
                if($task["state"] != 0){
                  continue;
                }
                ?>
                <tr>
                  <td>
                      <input task_id="<?=$task["id"]?>" type="checkbox" <?= $task["state"]!="0" ? "checked" : "" ?>>
                      <?php
                        $form = new modifyForm($task["description"], $task["state"], $task["id"]);
                        $form->html_hidden();
                      ?>
                  </td>
                  <td  class="<?= $task["state"]!="0" ? "strike" : "" ?>" ><?= $task["description"]?></td>
                  <td>
                    <a href="/final_work/?page=list&action=modify&task_id=<?= $task['id']?>">Edit</a>
                  </td>
                  <td>
                    <a href="/final_work/?page=delete&task_id=<?= $task['id']?>">Delete</a>
                  </td>
                 </tr>
              <?php } ?>
              <!-- Show only Done -->
              <?php foreach($this->taskList as $task) { 
                if($task["state"] != 1){
                  continue;
                }
                ?>
                <tr>
                  <td>
                      <input task_id="<?=$task["id"]?>" type="checkbox" <?= $task["state"]!="0" ? "checked" : "" ?>>
                      <?php
                        $form = new modifyForm($task["description"], $task["state"], $task["id"]);
                        $form->html_hidden();
                      ?>
                  </td>
                  <td  class="strike" ><?= $task["description"]?></td>
                  <td></td>
                  <td>
                    <a href="/final_work/?page=delete&task_id=<?= $task['id']?>">Delete</a>
                  </td>
                 </tr>
              <?php } ?>
            </tbody>
          </table>
          <script src="js/listView.js"></script>
        <?php
       }
    } 
?>