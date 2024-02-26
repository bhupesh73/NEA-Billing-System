<?php
session_start();
    if(!isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/login.php');
    }
    $aid = $_SESSION['aid'];
    $name = $_SESSION['adname'];
    $email = $_SESSION['ademail'];
    $phone = $_SESSION['adphone'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
    <style>
    /* CSS for navbar styling */
    .navbar {
      background-color: #f1f1f1;
      overflow: hidden;
    }

    .navbar-logo {
      float: left;
      padding: 14px 16px;
    }

    .navbar-profile {
      float: right;
      padding: 14px 16px;
      cursor: pointer;
    }

    /* CSS for dropdown */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>
<body>
    <?php
    include('header.php');
    echo"<table>
        <tr>
            <td>AID:</td>
            <td>$aid</td>
        <tr>
        <tr>
            <td>Name:</td>
            <td>$name</td>
        <tr>
        <tr>
            <td>Email:</td>
            <td>$email</td>
        <tr>
        <tr>
            <td>Phone:</td>
            <td>$phone</td>
        <tr>
    </table>";
    ?>
</body>

</html>
