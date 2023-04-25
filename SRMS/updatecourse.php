<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

elseif($_SESSION['usertype']=="student")
{
    header("location:login.php");
}

elseif($_SESSION['usertype']=="teacher")
{
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "SRMS";
$data = mysqli_connect($host, $user, $password, $db);

$id=$_GET['course_id'];
$sql="SELECT * FROM course WHERE courseid='$id'";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update']))
{
    $coursename=$_POST['coursename'];
    $credit=$_POST['credit'];

    $query="UPDATE course SET coursename='$coursename',credit='$credit' WHERE courseid='$id'";

    $result2=mysqli_query($data,$query);

    if($result2)
    {
        $_SESSION['message']='Course Updated Successfully';
        header("location:view_course.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>

    <link rel="stylesheet" href="admin.css">

<style type="text/css">
 label
 {
    display: inline-block;
    width: 100px;
    text-align: right;
    padding-top: 10px;
    padding-bottom: 10px;
 }
 .div_deg
 {
    background-color: skyblue;
    width: 400px;
    padding-bottom: 70px;
    padding-top: 70px;
 }
</style>
</head>
<body>
    <?php
    include 'admin_sidebar.php'
    ?>

    <div class="content">
        <center>
        <h1>Update Student</h1>
        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <label for="">Course Name</label>
                    <input autocomplete="off" type="text" name ="coursename" 
                    value="<?php echo "{$info['coursename']}";?>">
                </div>
                <div>
                    <label for="">Credit</label>
                    <input autocomplete="off" type="text" name ="credit"
                    value="<?php echo "{$info['credit']}";?>">
                </div>
                <div>
                    <input onclick="javascript:return confirm('Are You Sure To Update')" class="btn btn-success" type="submit" name ="update" value="Update">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>