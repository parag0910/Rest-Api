<?php
$db=mysqli_connect("localhost","root","qaz");
$dbconn=mysqli_select_db("ajaxdb");
$query=" SELECT * from tdl";
$result=mysqli_query($query );
$var=array();
while($row=mysqli_fetch_row($result)) {
    $var[]=$row;
}
echo json_encode($var);
?>