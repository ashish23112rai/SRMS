<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "faculty") {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "SRMS";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_course'])) {
    $course_name = $_POST['coursename'];
    $credit = $_POST['credit'];


    $check = "SELECT * FROM course WHERE coursename='$course_name'";
    $check_course = mysqli_query($data, $check);
    $rowcount = mysqli_num_rows($check_course);
    if ($rowcount == 1) {
        echo "<script type='text/javascript'>
        alert('Course Name Already Exists.Try Another One')
        </script>";
    } else {

        $sql = "INSERT INTO course(coursename, credit) VALUES ('$course_name','$credit')";

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
    <title>Add Course</title>
    <link rel="stylesheet" href="admin.css">
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
</head>

<body>
    <?php
    include 'admin_sidebar.php'
    ?>

    <div class="content">
        <center>
            <h1>Add Student</h1>
            <div class="div_deg">
                <form action="" method="POST">
                    <div>
                        <label for="">Course Name</label>
                        <input autocomplete="off" type="text" name="coursename"required>
                    </div>
                    <div>
                        <label for="">Credit</label>
                        <input autocomplete="off" type="number" name="credit" required>
                    </div>
                    <div>
                        <input class="btn btn-primary " type="submit" name="add_course" value="Add Course">
                    </div>
                </form>
            </div>
    </div>
    </center>
</body>

</html>
</body>

</html>