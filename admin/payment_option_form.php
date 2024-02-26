<?php
    session_start();
    if(!isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/login.php');
    }
     ?><!DOCTYPE html>
<html>
<head>
  <title>Add Payment Option</title>
  <link rel="stylesheet" href = "header.css">
</head>
<body>
<?php
    include('header.php');
    ?>
  <h2>Add Payment Option</h2>
  <form action="http://localhost/egovbe/admin/payment_option_insert.php" method="POST">
    <label>Name:</label>
    <input type="text" name="Name" required><br><br>
    <label>Status:</label>
    <select id="Status" name="Status">
      <option value="1">enabled</option>
      <option value="0">disabled</option>
    </select><br><br>
    <input type="submit" value="submit">
  </form>
</body>
</html>
