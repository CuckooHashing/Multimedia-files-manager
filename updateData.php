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
      $sql = "UPDATE media SET Title=\"".$title."\", Type=\"".$type."\", Genre=\"".$genre."\", Path=\"".$path."\" WHERE id=".$id;
?>