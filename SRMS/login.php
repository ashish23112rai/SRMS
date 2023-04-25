<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital@1&family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRMS Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        
        <div class="form">
            <h2>Login</h2>
            <h4 class="error_message">
                <?php
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];

                ?>
            </h4>
            <form class="login" action="login_check.php" method="POST">
               <select class="designation" id="desiignation" name="usertype">
                <option selected value="student">Student</option>
                <option value="faculty">Faculty</option>
                <option value="admin">Admin</option>
               </select>
                <div class="formGroup">
                    <input type="text" name="username"placeholder="User Name" autocomplete="off">
                </div>
                <div class="formGroup">
                    <input type="password" name="password"placeholder="Password" autocomplete="off">
                </div>
                <div class="formGroup">
                    <input type="submit" class="btn" name="submit" value="Login">
                </div>
               
            </form>
        </div>
    
    </div>
</body>
</html>