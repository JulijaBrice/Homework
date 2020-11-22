<?php

   class listView {
       private $taskList;

       public function __construct($data)
       {
         $this->taskList = $data;
       }

       public function html(){
        ?>

          <table>
            <thead>
              <tr>
                <td colspan="3">My Tasks</td>
              </tr>
              <tr>
                  <td>#</td>
                  <td>Description</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach($this->taskList as $task) { ?>
                <tr>
                  <td>
                    <form action="/final_work/?page=modify" method="POST">
                      <input type="checkbox" <?= $task["state"]!="0" ? "checked" : "" ?>>
                    </form>

                  </td>
                  <td  class="<?= $task["state"]!="0" ? "strike" : "" ?>" ><?= $task["description"]?></td>
                  <td>
                    <a href="/final_work/?page=list&action=modify&task_id=<?= $task['id']?>">Edit</a>
                    <a href="/final_work/?page=delete&task_id=<?= $task['id']?>">Delete</a>
                  </td>
                 </tr>
              <?php } ?>
            </tbody>
          </table>
          <a href="/final_work/?page=list&action=modify">Add task</a>
          
          <form method="POST">
            <input type="hidden" name="Logout">
            <button type="submit">Logout</button>
          </form>
          <script src="js/listView.js"></script>
        <?php

       }
    } 
?>