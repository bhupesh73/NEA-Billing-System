<?php
    session_start();
    if(isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/profile.php');
    }
     ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>
<form method="POST" action="">
    <label for="aid">Admin ID:</label>
    <input type="text" name="aid" id="aid" required><br><br>
    <label for="password">Password</label>
    <input type="password" name="pwd" id="pwd" required><br><br>
    <input type="submit" name="submit" value="admin login">
</form>
<?php

    include("dbconnect.php");
    if(isset($_POST['submit'])){
        $aid= $_POST['aid'];
        $password = md5($_POST['pwd']);

        $queryadmin = "SELECT * FROM admin WHERE aid='$aid' AND password = '$password'";
        $result = mysqli_query($conn, $queryadmin);

        if (mysqli_num_rows($result) !=0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['aid'] = $row['aid'];
            $_SESSION['adname'] = $row['name'];
            $_SESSION['ademail'] = $row['email'];
            $_SESSION['adphone'] = $row['phone'];
            $_SESSION['superadmin'] = $row['superadmin'];
            echo"Successfully logged in";
            echo"You will be redirected in 5 seconds";
            sleep(5);
            header('Location: http://localhost/egovbe/admin/profile.php');
            exit();
        }
        else{
            echo"Invalid Credentials";
        }
    }
?>
</body>
</html>


