<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "faculty") {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "SRMS";
$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM user WHERE usertype='faculty'";
$result = mysqli_query($data, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Faculty</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1>Faculty Data</h1>
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
                        <th scope="col">Username</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Password</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <?php
                while ($info = $result->fetch_assoc()) {
                ?>

                    <tbody>
                        <tr>
                            <th scope="row"><?php echo "{$info['username']}" ?></th>
                            <td><?php echo "{$info['email']}" ?></td>
                            <td><?php echo "{$info['phone']}" ?></td>
                            <td><?php echo "{$info['password']}" ?></td>
                            <td><?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are You Sure To Delete This');\"href='deletefaculty.php?faculty_id={$info['id']}'>Delete</a>"; ?>
                            </td>
                            <td><?php echo "<a class='btn btn-primary' href='updatefaculty.php?faculty_id={$info['id']}'>Update</a>" ?></td>
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