<?php

$dbcon=mysqli_connect("localhost","root","root");
mysqli_select_db($dbcon,"ajaxdb");
session_start();
parse_str(file_get_contents("php://input"),$post_vars);
$task=$post_vars['task'];
mysqli_select_db($dbcon,"ajaxdb");


$sql= "DELETE FROM tdl WHERE task= '$task' ";
//$res=mysqli_query($dbcon,$sql);
//$row=mysqli_affected_rows($dbcon);

?>




