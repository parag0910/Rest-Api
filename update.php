<?php

$dbcon=mysqli_connect("localhost","root","qaz");

mysqli_select_db($dbcon,"ajaxdb");

$s="SELECT * FROM tdl";
$sql= mysqli_query($s,$dbcon);
$result= array();
while($row=mysqli_fetch_row($dbcon,$sql))
{
    $result[] = $row;
}
echo json_encode($result);
?>