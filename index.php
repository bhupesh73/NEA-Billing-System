<?php
session_start();

// Check if the session variable 'username' is set
if (isset($_SESSION['scno'])) {
    header("Location: http://localhost/egovbe/customer/profile.php");
    exit();
} else {
    header("Location: http://localhost/egovbe/customer/login.php");
    exit();
}
?>