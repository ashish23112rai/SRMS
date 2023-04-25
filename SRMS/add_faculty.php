<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "teacher") {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "SRMS";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_faculty'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_pass = $_POST['password'];
    $usertype = "faculty";

    $check = "SELECT * FROM user WHERE username='$username'";
    $check_user = mysqli_query($data, $check);
    $rowcount = mysqli_num_rows($check_user);
    if ($rowcount == 1) {
        echo "<script type='text/javascript'>
        alert('Username Already Exists.Try Another One')
        </script>";
    } else {

        $sql = "INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$user_email',
    '$user_phone','$usertype','$user_pass')";

        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "<script type='text/javascript'>
        alert('Data uploaded Successfully')
        </script>";
        } else {
            echo "Upload Fail";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        label
        {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;

        }
        .div_deg
        {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
    <link rel="stylesheet" href="admin.css">
    <title>Add Faculty</title>
</head>
<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
        <h1>Add Faculty</h1>
        <div class="div_deg">
            <form action="" method="POST">
                <div>
                    <label for="">Username</label>
                    <input autocomplete="off" type="text" name="name" required>
                </div>
                <div>
                    <label for="">E-mail</label>
                    <input autocomplete="off" type="email" name="email" required>
                </div>
                <div>
                    <label for="">Phone</label>
                    <input autocomplete="off" type="number" name="phone" required>
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" name="password" required>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" name="add_faculty" value="Add Faculty">
                </div>
            </form>
        </div>
        </center>
    </div>
    
</body>
</html>