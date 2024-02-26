<?php
    session_start();
    if(!isset($_SESSION['aid'])){
        header('Location: http://localhost/egovbe/admin/login.php');
    }
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href = "header.css">
</head>
<body>
    <?php
    include('header.php');
    ?>
    <h2>NEA HOMEPAGE</h2>
    <a href="bill_form.php" class="bill">BILL</a><br><br>
    <a href="branch_form.php" class="branch">ADD BRANCH</a><br><br>
    <a href="customer_insert.php" class="customer">ADD CUSTOMER</a><br><br>
    <a href="demand_rate_insert.php" class="DR">ADD DEMAND RATE</a><br><br>
    <a href="demandtype_form.php" class="DT">DEMAND_TYPE</a><br><br>
    <a href="payment_insert.php" class="PF">PAYMENT</a><br><br>
    <a href="payment_option_form.php" class="PO">PAYMENT OPTION</a><br><br>
    <a href="searchcustomer.php" class="SC">SEARCH CUSTOMER</a>
</body>
</html>