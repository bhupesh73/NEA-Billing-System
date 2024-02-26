<?php
    session_start();
    if(!isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/login.php');
    }
     ?><!DOCTYPE html>
<html>
<head>
  <title>Add Demand Type</title>
  <link rel="stylesheet" href = "header.css">
</head>
<body>
<?php
    include('header.php');
    ?>
  <h2>Add Demand Type</h2>
  <form action="http://localhost/egovbe/admin/demandtype_insert.php" method="POST">

    <label>Description:</label>
    <input type="text" name="Description" required><br><br>
    <label>Status:</label>
    <select id="Status" name="Status">
      <option value="1">enabled</option>
      <option value="0">disabled</option>
    </select>
    <br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
