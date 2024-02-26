<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
<form method="POST" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br><br>
    <label for="password">Password</label>
    <input type="password" name="pwd" id="pwd" required><br><br>
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" required><br><br>
    <label for="email">email</label>
    <input type="email" name="email" id="email" required><br><br>
    <input type="submit" name="submit" value="admin register">
</form>
<?php
    include("dbconnect.php");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = md5($_POST['pwd']);

        $queryadmin = "INSERT INTO admin (name, email, phone, password, superadmin) VALUES('$name','$email','$phone','$password', '0')";
        $result = mysqli_query($conn, $queryadmin);
        if($result){
            echo'Admin registered successfully';
        }

    }
?>
</body>
</html>


