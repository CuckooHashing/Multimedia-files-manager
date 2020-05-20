<?php
    $connection = mysqli_connect("localhost", "root");
    if(!$connection){
        die('Nem connection -> ' . mysqli_error());
    }
    $database = mysqli_select_db($connection, 'mediafiles');
    $result = mysqli_query($connection, "SELECT * FROM media");
    $data = array();
    $i = 0;
    while($row = mysqli_fetch_array($result))
    {
         $aux = array(0=>$row[0], 1=>$row[1], 2=>$row[2], 3=>$row[3], 4=>$row[4]);
         $data[$i] = $aux;
         $i = $i + 1;    
    }
    echo json_encode($data);
?>