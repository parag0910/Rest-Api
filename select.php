<?php

$dbcon=mysqli_connect("localhost","root","root");
mysqli_select_db($dbcon,"ajaxdb");
session_start();
$select="Select * from tdl";
$sql=mysqli_query($dbcon,$select);
$result= array();

    while ($row = mysqli_fetch_row($sql)) {
        $result[] = $row;

    }
    echo json_encode($result);



?>