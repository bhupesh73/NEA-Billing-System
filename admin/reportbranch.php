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
    //total unpaid bill by year
    echo "<h2>TOTAL UNPAID BILL BY YEAR</h2>";
      echo "<table class='center' border = '1'>
      <tr>
          <th>Bill Year</th>
          <th>Total Payment</th>
      </tr>";
      $querytotalbill = "SELECT BYear, SUM(Bamount) AS total_payment
      FROM bill 
      WHERE  payment_status = '0'
      GROUP BY BYear; ";
      $resulttotalbill = mysqli_query($conn,$querytotalbill);
      while($row = mysqli_fetch_assoc($resulttotalbill)){
        echo "<tr>
                    <td>" . $row['BYear'] . "</td>
                    <td>" . $row['total_payment'] . "</td>
                </tr>";
      }   echo "</table>";

//customer count by demand type
      echo "<h2>CUSTOMER COUNT BY DEMAND TYPE</h2>";
      echo "<table class='center' border = '1'>
      <tr>
          <th>Demand Type</th>
          <th>Total Count</th>
      </tr>";
      $querytotalbill = "SELECT d.Description, COUNT(c.CUSID) 
      FROM customer c JOIN demandtype d ON c.Demand_type_ID = d.Demand_Type_ID
      GROUP BY c.Demand_type_ID; ";
      $resulttotalbill = mysqli_query($conn,$querytotalbill);
      while($row = mysqli_fetch_assoc($resulttotalbill)){
        echo "<tr>
                    <td>" . $row['Description'] . "</td>
                    <td>" . $row['COUNT(c.CUSID)'] . "</td>
                </tr>";
      }   echo "</table>";


    //customer count by payment method
     echo "<h2>CUSTOMER COUNT BY Payment Method</h2>";
     echo "<table class='center' border = '1'>
     <tr>
         <th>Payment Name</th>
         <th>Total Count</th>
     </tr>";
     $querytotalbill = "SELECT po.Name, COUNT(c.CUSID) 
      FROM customer c JOIN bill b ON c.CUSID = b.CUSID JOIN payment p
      ON b.BID = p.BID JOIN payment_option po ON p.POID = po.POID
      GROUP BY p.POID; ";
      $resulttotalbill = mysqli_query($conn,$querytotalbill);
      while($row = mysqli_fetch_assoc($resulttotalbill)){
        echo "<tr>
                    <td>" . $row['Name'] . "</td>
                    <td>" . $row['COUNT(c.CUSID)'] . "</td>
                </tr>";
      }   echo "</table>";


?>



<form method="POST" action="">
    <label for="cusid">Branch:</label>
        <select name="branch">
            <?php
            $sql = "SELECT Branch_ID, Name FROM branch";
            $result = $conn->query($sql);

            // Display branch names in the dropdown menu
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['Branch_ID'] . "'>" . $row['Name'] . "</option>";
                }
            }
            ?>
        </select>
    <input type="submit" name="submit" value="Report">

</form>
</body>
</html>
<?php

if (isset($_POST['submit'])) {
    $branch = $_POST['branch'];

    echo "<h2>Total Customers</h2>";
      $querytotalcus = "SELECT COUNT(*) AS customerCount
      FROM customer
      WHERE Branch_ID = '$branch';";
      $resulttotalcus = mysqli_query($conn,$querytotalcus);
      $row = mysqli_fetch_assoc($resulttotalcus);
      echo "<strong>Total Number of Customers:</strong> ". $row['customerCount'];
 
    
    $querycus = "SELECT SCNO,CUSID, FullName, MobileNo, Address, dob, Demand_Type_ID, Branch_ID FROM customer WHERE Branch_ID = '$branch'";
    $result = mysqli_query($conn, $querycus);

    if (mysqli_num_rows($result) > 0) {

  
        echo "<h2>Customer Listing</h2>";
        echo "<table class='center' border = '1'>
                <tr>
                    <th>SC No.</th>
                    <th>Customer ID</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Mobile No.</th>
                    <th>Demand Type</th>
                    <th>Branch</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            //get the branch name
            $branch = $row['Branch_ID'];
            $querybranch = "SELECT Name from branch WHERE Branch_ID ='$branch'";
            $resultbranch = mysqli_query($conn, $querybranch);
            $rowbranch = mysqli_fetch_assoc($resultbranch);



            //get the demand type
            $demand = $row['Demand_Type_ID'];
            $querydemand = "SELECT Description FROM demandtype WHERE Demand_Type_ID='$demand' ";
            $resultdemand = mysqli_query($conn,$querydemand);
            $rowdemand = mysqli_fetch_assoc($resultdemand);
            echo "<tr>
                    <td>" . $row['SCNO'] . "</td>
                    <td>" . $row['CUSID'] . "</td>
                    <td>" . $row['FullName'] . "</td>
                    <td>" . $row['Address'] . "</td>
                    <td>" . $row['MobileNo'] . "</td>
                    <td>" . $rowdemand['Description'] . "</td>
                    <td>" . $rowbranch['Name'] . "</td>
                </tr>";
        }
        echo "</table>";
        
      } else {
        echo "<p>No customer found with the provided BranchID.</p>";
      }


      echo "<h2>Total UNPAID BILLS</h2>";
      $querytotalcus = "SELECT COUNT(*) FROM customer c JOIN branch br ON c.branch_id = br.branch_id JOIN bill b ON c.CUSID = b.CUSID WHERE br.branch_id = '$branch' AND b.payment_status='0'; ";
      $resulttotalcus = mysqli_query($conn,$querytotalcus);
      $row = mysqli_fetch_assoc($resulttotalcus);
      echo "<strong>Total Number of Customers:</strong> ". $row['COUNT(*)'];

      echo "<h2>LIST UNPAID BILLS</h2>";
      echo "<table class='center' border = '1'>
                <tr>
                    <th>Bill ID</th>
                    <th>Customer ID</th>
                </tr>";

      $queryunpaidbill = "SELECT b.BID, c.CUSID  FROM customer c JOIN branch br ON c.branch_id = br.branch_id JOIN bill b ON c.CUSID = b.CUSID WHERE br.branch_id = '$branch' AND b.payment_status='0'; ";
      $resultunpaidbill = mysqli_query($conn,$queryunpaidbill);
      while($row = mysqli_fetch_assoc($resultunpaidbill)){
        echo "<tr>
                    <td>" . $row['BID'] . "</td>
                    <td>" . $row['CUSID'] . "</td>
                </tr>";
      }   echo "</table>";




      
    }
      ?>
     
