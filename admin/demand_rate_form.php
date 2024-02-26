<?php
    session_start();
    if(!isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/login.php');
    }
     ?><!DOCTYPE html>
<html>
<head>
  <title>Add Demand Rate</title>
  <link rel="stylesheet" href = "header.css">
</head>
<body>
<?php
    include('header.php');
    ?>
  <h2>Add Demand Rate</h2>
  <form action="demand_rate_insert.php" method="POST">
    <label>Demand Type ID:</label>
    <select name="Demand_Type_ID">
      <?php
        // Fetch demand type records from the database
        $query = "SELECT DEMAND_TYPE_ID, Description FROM demandtype";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="'.$row['DEMAND_TYPE_ID'].'">'.$row['Description'].'</option>';
        }
      ?>
    </select><br><br>
    <label>Rate:</label>
    <input type="number" name="rate" required><br><br>
    <label>Effective Date:</label>
    <input type="date" name="effective_date" required><br><br>
    <label>Issuement:</label>
    <input type="text" name="issuement" required><br><br>
    <input type="submit" value="Submit">
  </form>
</body>

   
