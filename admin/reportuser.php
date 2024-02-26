<?php
  session_start();
  if(!isset($_SESSION['aid'])){
      header('Location: http://localhost/egovbe/admin/login.php');
  }
  include('dbconnect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Report Generation</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href = "header.css">
</head>
<body>
<?php
    include('header.php');
?>



<form method="POST" action="">
    <label for="cusid">USER ID:</label>
    <input type="text" name = "cusid">
    <input type="submit" name="submit" value="Report">

</form>
</body>
</html>
<?php

if (isset($_POST['submit'])) {
    $cusid = $_POST['cusid'];
    echo "<table class='center' border = '1'>
                <tr>
                    <th>Branch Name</th>
                    <th>Total Payment</th>
                </tr>";

      $queryunpaidbill = "SELECT br.Name, SUM(b.Bamount) AS total_payment
      FROM customer c
      JOIN branch br ON c.branch_id = br.branch_id
      JOIN bill b ON c.CUSID = b.CUSID
      WHERE c.CUSID = '$cusid' AND b.payment_status = '0'
      GROUP BY br.Name; ";
      $resultunpaidbill = mysqli_query($conn,$queryunpaidbill);
      while($row = mysqli_fetch_assoc($resultunpaidbill)){
        echo "<tr>
                    <td>" . $row['Name'] . "</td>
                    <td>" . $row['total_payment'] . "</td>
                </tr>";
      }   echo "</table>";



      
    }

      ?>
     
