<?php
    $val = $_REQUEST['val'];
    $where = $_REQUEST['where'];
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connection = mysqli_connect("localhost", "root");
    if(!$connection){
        die('Nem connection -> ' . mysqli_error());
    }
    $database = mysqli_select_db($connection, 'mediafiles');

    $sql = "SELECT * FROM media where " . $where . " = \"" . $val . "\"";

    $result = mysqli_query($connection, $sql);
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