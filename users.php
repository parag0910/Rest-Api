<?php
$con = mysqli_connect('localhost','root','root');
session_start();
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

switch ($method) {

    case 'POST':
        $task=$_POST['task'];
        mysqli_select_db($con,"ajaxdb");



        if($task=='')
        {
            echo "Enter a task";
        }else{

            $sql="INSERT into tdl(task) VALUES ('$task') ";
            $result = mysqli_query($con,$sql);
            if($result!='')
                echo json_encode($task);
            else{
                echo 'Sorry  task is already in list !';}}
        break;


    case 'DELETE':

        parse_str(file_get_contents("php://input"),$post_vars);
        $task=$post_vars['task'];
        mysqli_select_db($con,"ajaxdb");


        $sql="DELETE FROM tdl WHERE task='$task'";
        $result = mysqli_query($con,$sql);
        $row=mysqli_affected_rows($con);

        if($row>0) {
            echo  json_encode($task);

        }

        break;
    case 'GET':
        mysqli_select_db($con,"ajaxdb");

        $sql="SELECT * FROM tdl";
        $result = mysqli_query($con,$sql);
        $rowCount = mysqli_num_rows($result);
//echo "TASK";
//echo "<br>";
        if($rowCount > 0) {

            while($row = mysqli_fetch_row($result)){
                $task[] = $row[0];

                ?>



            <?php
            }
        }

        echo json_encode($task);
        break;
    default:
        handle_error($request);
        break;
}