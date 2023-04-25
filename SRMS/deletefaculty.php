<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "SRMS";
$data = mysqli_connect($host, $user, $password, $db);
if($_GET['faculty_id'])
{
    $user_id=$_GET['faculty_id'];
    $sql = "DELETE FROM user WHERE id='$user_id'";
    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']='Faculty Data Deleted Successfully';
        header("location:view_faculty.php");
    }

}

?>