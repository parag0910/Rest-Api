<?php
echo "hello";
$conn=new mysqli("localhost","root","qaz","ajaxdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    alert("jdjdb");
}



//$dbconn=mysqli_select_db("ajaxdb");
//if(!$dbconn)
//{
//    die(" failed" .mysqli_error());
//}



?>

