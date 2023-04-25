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

$id=$_GET['faculty_id'];
$sql="SELECT * FROM user WHERE id='$id'";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update']))
{
    $name=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $query="UPDATE user SET username='$name',email='$email',phone='$phone',password='$password' WHERE id='$id'";

    $result2=mysqli_query($data,$query);

    if($result2)
    {
        $_SESSION['message']='Data Updated Successfully';
        header("location:view_faculty.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>

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
                    <label for="">Username</label>
                    <input autocomplete="off" type="text" name ="username" 
                    value="<?php echo "{$info['username']}";?>" required>
                </div>
                <div>
                    <label for="">E-mail</label>
                    <input autocomplete="off" type="email" name ="email"
                    value="<?php echo "{$info['email']}";?>" required>
                </div>
                <div>
                    <label for="">Phone</label>
                    <input autocomplete="off" type="number" name ="phone"
                    value="<?php echo "{$info['phone']}";?>" required>
                </div>
                <div>
                    <label for="">Password</label>
                    <input autocomplete="off" type="text" name ="password"
                    value="<?php echo "{$info['password']}";?>" required>
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