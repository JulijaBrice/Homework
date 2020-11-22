<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Julia Brice TODO list</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
    if (isset($_GET["page"])) {
        $file = __DIR__ . "/controllers/" . $_GET["page"] . "Controller.php";
        session_start();

        if (file_exists($file)) {
            if ($_GET["page"] === 'login' || $_GET["page"] === 'register'){
            require_once $file;
        } else if (isset($_SESSION["loginname"])){
            require_once $file;
        } else{
            Header ("Location: /final_work/?page=login");
        }    
     } else {
            Header ("Location: /final_work/?page=login");
    }
 }
?>
</html>