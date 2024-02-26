<?php
session_start();

// Check if the session variable 'username' is set
if (isset($_SESSION['aid'])) {
    header("Location: http://localhost/egovbe/admin/profile.php");
    exit();
} else {
    header("Location: http://localhost/egovbe/admin/login.php");
    exit();
}
?>