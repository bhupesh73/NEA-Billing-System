<?php
session_start();
    if(!isset($_SESSION['scno'])){
        header('Location: http://localhost/egovbe/customer/login.php');
    }
    $scno = $_SESSION['scno'];
    $cusid = $_SESSION['cusid']; 
    $cusname = $_SESSION['cusname'] ;
    $cusadd = $_SESSION['cusadd']; 
    $cusphone = $_SESSION['cusphone'];
    $cusbranch = $_SESSION['cusbranch'] ;
    $cusdemand = $_SESSION['cusdemand']; 
    $cusdob = $_SESSION['cusdob'] ;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Profile</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>

    <?php
    include('header.php');
    echo"<table class='center'>
        <tr>
            <td>SCNO:</td>
            <td>$scno</td>
        <tr>
        <tr>
            <td>CUSID:</td>
            <td>$cusid</td>
        <tr>
        <tr>
            <td>Name:</td>
            <td>$cusname</td>
        <tr>
        <tr>
            <td>Address:</td>
            <td>$cusadd</td>
        <tr>
        <tr>
            <td>Phone:</td>
            <td>$cusphone</td>
        <tr>
        <tr>
            <td>Branch:</td>
            <td>$cusbranch</td>
        <tr>
        <tr>
            <td>Demand:</td>
            <td>$cusdemand</td>
        <tr>
        <tr>
            <td>DOB:</td>
            <td>$cusdob</td>
        <tr>
    </table>";
    ?>
</body>

</html>
