<?php
    session_start();
    if(isset($_SESSION['cusid'])){
        header('Location: http://localhost/egovbe/customer/profile.php');
    }
     ?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Login</title>
</head>
<body>
<form method="POST" action="">
    <label for="aid">Customer ID:</label>
    <input type="text" name="cusid" id="cusid" required><br><br>
    <label for="Phone">Phone</label>
    <input type="text" name="phone" id="phone" required><br><br>
    <label for="DOB">Phone</label>
    <input type="date" name="dob" id="dob" required><br><br>
    <input type="submit" name="submit" value="Login">
</form>
<?php

    include("dbconnect.php");
    if(isset($_POST['submit'])){
        $cusid= $_POST['cusid'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];

        $queryadmin = "SELECT * FROM customer WHERE CUSID='$cusid' AND MobileNo = '$phone' AND dob = '$dob'";
        $result = mysqli_query($conn, $queryadmin);

        if (mysqli_num_rows($result) !=0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['scno'] = $row['SCNO'];
            $_SESSION['cusid'] = $row['CUSID'];
            $_SESSION['cusname'] = $row['FullName'];
            $_SESSION['cusadd'] = $row['Address'];
            $_SESSION['cusphone'] = $row['MobileNo'];
            $_SESSION['cusbranch'] = $row['Branch_ID'];
            $_SESSION['cusdemand'] = $row['Demand_type_ID'];
            $_SESSION['cusdob'] = $row['dob'];
            echo"Successfully logged in";
            echo"You will be redirected in 5 seconds";
            sleep(5);
            header('Location: http://localhost/egovbe/customer/showbill.php');
            exit();
        }
        else{
            echo"Invalid Credentials";
        }
    }
?>
</body>
</html>


