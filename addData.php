<?php
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $type = $_REQUEST['type'];
    $genre = $_REQUEST['genre'];
    $path = $_REQUEST['path'];

     mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $connection = mysqli_connect("localhost", "root");

     if(!$connection){
         die('Nem connection -> ' . mysqli_error());
     }
     
     $database = mysqli_select_db($connection, 'mediafiles');
     $sql = "INSERT INTO media(id, Title, Type, Genre, Path) VALUES (".$id.",\"".$title."\",\"".$type."\",\"".$genre."\",\"".$path."\")";
     $result = mysqli_query($connection, $sql);
     echo "merge yay";
?>