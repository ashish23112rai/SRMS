<?php
session_start();
error_reporting(0);
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

$sql = "SELECT * FROM course";
$result = mysqli_query($data, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Course</title>

    <link rel="stylesheet" href="admin.css">

</head>

<body>
    <?php
    include 'admin_sidebar.php';
    ?>

    <div class="content">
        <center>
            <h1>Course Data</h1>
            <p>
            <?php
            if($_SESSION['message'])
            {
               echo $_SESSION['message'];
            }
            unset($_SESSION['message']);            
            ?>
            </p>
        </center>
        <br><br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-right">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Course Name</th>
                        <th scope="col">Credit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <?php
                while ($info = $result->fetch_assoc()) {
                ?>

                    <tbody>
                        <tr>
                            <th scope="row"><?php echo "{$info['coursename']}" ?></th>
                            <td><?php echo "{$info['credit']}" ?></td>
                            <td><?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are You Sure To Delete This');\"href='deletecourse.php?course_id={$info['courseid']}'>Delete</a>"; ?>
                            </td>
                            <td><?php echo "<a class='btn btn-primary' href='updatecourse.php?course_id={$info['courseid']}'>Update</a>" ?></td>
                        </tr>

                    <?php
                }
                    ?>

                    </tbody>
            </table>
        </div>

    </div>
</body>

</html>