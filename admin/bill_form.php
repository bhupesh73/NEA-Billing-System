<?php
    session_start();
    if(!isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/login.php');
    }
     ?>
     <!DOCTYPE html>
<html>
<head>
  <title>Add Bill</title>
  <link rel="stylesheet" href = "header.css">
</head>
<body>
<?php
    include('header.php');
    ?>

  <h2>Add Bill</h2>
  <form action="http://localhost/egovbe/admin/bill_insert.php" method="POST">
    <label>BDate:</label>
    <input type="date" name="BDate" required><br><br>
    <label>BYear:</label>
    <select id="BYear" name="BYear">
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
      </select><br>
    <label>BMonth:</label>
    <select id="BMonth" name="BMonth">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
      </select><br>
    <label>CUSID:</label>
    <input type="number" name="CUSID" required><br><br>
    <label>Current Reading:</label>
    <input type="number" name="Current_Reading" required><br><br>
    <label>Previous Reading:</label>
    <input type="number" name="Previous_Reading" required><br><br>
    <label>Bill Amount:</label>
    <input type="number" name="BAmount" required><br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
