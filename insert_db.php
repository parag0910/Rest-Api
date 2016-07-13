<?php

$dbcon=mysqli_connect("localhost","root","root","ajaxdb");
mysqli_select_db($dbcon,"ajaxdb");
$ins=$_POST['task'];
if ($ins != "") {
    $query = "INSERT INTO tdl(task) VALUES('$ins')";
    $res = mysqli_query($dbcon, $query);
    if ($res) {
        die("successfully inserted");
    }
    echo json_encode($row);
}
?>