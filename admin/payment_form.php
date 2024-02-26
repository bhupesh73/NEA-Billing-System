<?php
    session_start();
    if(!isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/login.php');
    }
     ?><!DOCTYPE html>
<html>
<head>
  <title>Add Payment</title>
  <link rel="stylesheet" href = "header.css">
</head>
<body>
<?php
    include('header.php');
    ?>
  <h2>Add Payment</h2>
  <form action="payment_insert.php" method="POST">
    <label>BID:</label>
    <input type="number" name="BID" required><br><br>
    <label>PDate:</label>
    <input type="date" name="PDate" required><br><br>
    <label>PAmount:</label>
    <input type="number" name="PAmount" required><br><br>
    <label>POID:</label>
    <select name="POID">
      <?php
        // Fetch payment option records from the database
        $query = "SELECT POID, Name FROM payment_option";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="'.$row['POID'].'">'.$row['Name'].'</option>';
        }
      ?>
    </select><br><br>
    <label>Rebeat Amount:</label>
    <input type="number" name="Rebeat_Amt"><br><br>
    <label>Fine Amount:</label>
    <input type="number" name="Fine_Amt"><br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
