<?php
    session_start();
    if(!isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/login.php');
    }
     ?><!DOCTYPE html>
<html>
<head>
  <title>Add Customer</title>
  <link rel="stylesheet" href = "header.css">
</head>
<body>
<?php
    include('header.php');
    ?>
  <h2>Add Customer</h2>
  <form action="http://localhost/egovbe/admin/customer_insert.php" method="POST">
    <label>SCNO:</label>
    <input type="number" name="SCNO" required><br><br>
    <label>CUSID:</label>
    <input type="number" name="CUSID" required><br><br>
    <label>Full Name:</label>
    <input type="text" name="FullName" required><br><br>
    <label>Address:</label>
    <input type="text" name="Address" required><br><br>
    <label>Mobile No:</label>
    <input type="number" name="MobileNo" required><br><br>
    <label>Branch:</label>
    <select name="BRANCH_ID">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "nea");
        $query = "SELECT BRANCH_ID, Name FROM branch";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="'.$data['BRANCH_ID'].'">'.$data['Name'].'</option>';
        }
      ?>
    </select><br><br>
    <label>Demand Type:</label>
    <select name="DEMAND_TYPE_ID">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "nea");
        $query = "SELECT Demand_Type_ID, Description FROM demandtype";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="'.$row['Demand_Type_ID'].'">'.$row['Description'].'</option>';
        }
        mysqli_close($conn);
      ?>
    </select><br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
