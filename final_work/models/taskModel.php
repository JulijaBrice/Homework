<?php
  require_once __DIR__ . "\..\DB_wrapper.php";

  class taskModel {

    //Read all tasks from the Database
    //TODO modify it to read only tasks of specific user
    public function getAll($user_id){
      $sql ="SELECT * FROM tasks WHERE user_id=$user_id";
      $response = DB::run($sql)->fetch_all(MYSQLI_ASSOC);
      return $response;
    }

    //Delete task by ID
    public function deleteByID($id) {
      $sql = "DELETE FROM tasks WHERE id=$id";
      DB::run($sql);
    } 

    //Read tasks by ID
    public function getById($id) {
      $sql = "SELECT * FROM tasks WHERE id=$id";
      $response = DB::run($sql);

      if ($response->num_rows === 0){
        return [];
      }else{
        return $response->fetch_assoc();
      } 
    }

    //Update task by ID
    public function updateById($id, $description, $state){
      $sql = "UPDATE tasks SET description = '$description', state = $state WHERE id = $id";
      DB::run($sql);
    }

    //Create new Task
    public function insertNew($description, $user_id){
      $sql = "INSERT INTO tasks (description, user_id) VALUES ('$description', $user_id)";
      DB::run($sql);
    }
  }
?>