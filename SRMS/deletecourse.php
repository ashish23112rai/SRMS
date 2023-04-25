<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "SRMS";
$data = mysqli_connect($host, $user, $password, $db);
if($_GET['course_id'])
{
    $course_id=$_GET['course_id'];
    $sql = "DELETE FROM course WHERE courseid='$course_id'";
    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']='Course Deleted Successfully';
        header("location:view_course.php");
    }

}

?>
