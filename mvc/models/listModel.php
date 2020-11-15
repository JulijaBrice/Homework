<?php
  require_once __DIR__ . "\..\..\products\DB_wrapper.php";

  class listModel {

    public function getAll(){
      $sql ="SELECT * FROM products";
      $response = DB::run($sql)->fetch_all(MYSQLI_ASSOC);

      return $response;
    }

    public function deleteByID($id) {
      $sql = "DELETE  FROM products WHERE id=$id";
      DB::run($sql);
    } 
    public function getById($id) {
      $sql = "SELECT * FROM products WHERE id=$id";
      $response = DB::run($sql);

      if ($response->num_rows === 0){
        return [];
      }else{
        return $response->fetch_assoc();
      } 
    }

    public function updateById($id, $name, $price){
      $sql = "UPDATE products SET name = '$name', price = $price WHERE id = $id";
      DB::run($sql);
    }
  }
?>