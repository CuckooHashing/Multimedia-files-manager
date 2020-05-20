<?php
    $id = $_REQUEST['id'];
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $connection = mysqli_connect("localhost", "root");

     if(!$connection){
         die('Nem connection -> ' . mysqli_error());
     }
     
     $database = mysqli_select_db($connection, 'mediafiles');
     $sql = "DELETE FROM media WHERE id=".$id;

     $result = mysqli_query($connection, $sql);
?>