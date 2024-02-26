<?php
    session_start();
    if(!isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/login.php');
    }
     ?>
<!DOCTYPE html>

<html>
<head>
  <title>Add Branch</title>
  <link rel="stylesheet" href = "header.css">
</head>
<body>
<?php
    include('header.php');
    ?>
  <h2>Add Branch</h2>
  <form action="http://localhost/egovbe/admin/branch_insert.php" method="POST">
    <label>Name:</label>
    <input type="text" name="Name" required><br><br>
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

