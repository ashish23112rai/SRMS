<?php
session_start();
error_reporting(0);


$host="localhost";
$user="root";
$password="";
$db="SRMS";
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $utype=$_POST['usertype'];

    $sql="select * from user where username='".$name."' AND usertype='".$utype."' AND password='".$pass."'";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row['usertype']=="student")
    {
        $_SESSION['username']=$name;
        $_SESSION['usertype']="student";
        header("location:studenthome.php");
    }
    elseif($row['usertype']=="admin")
    {
        $_SESSION['usertype']="admin";
        $_SESSION['username']=$name;
        header("location:adminhome.php");
    }
    elseif($row['usertype']=="teacher")
    { 
        $_SESSION['usertype']="teacher";
        $_SESSION['username']=$name;
        header("location:teacherhome.php");
    }
    else{

        $message="!!Username or password do not match!!";
        $_SESSION['loginMessage']=$message;

        header("location:login.php");
    }

}

?>