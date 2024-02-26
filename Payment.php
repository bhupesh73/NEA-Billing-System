<?php    
session_start();
     if(!isset($_SESSION['scno'])){
        header('Location: http://localhost/egovbe/customer/login.php');

    }
?>
<html>
    <head>
        <title>Bill Payment</title>
        <!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
        <link rel="stylesheet" href="header.css" type="text/css">
    </head>

<body>
    <?php include('header.php') ?>
    <form method="POST" action="" id="payform" >
    <label for="bid" class="center">BID:</label>
    <input type="text" name="bid" id="bid" required><br><br>
    <input type="submit" name="submit" value="search">
    </form>
    <?php
        $PS=1;
if (isset($_POST['submit'])) {
    include('dbconnect.php');
    $bid = $_POST['bid'];
    $querybil = "SELECT  CUSID, Bamount, payment_status FROM bill WHERE BID = '$bid'";
    $result = mysqli_query($conn, $querybil);

    if(mysqli_num_rows($result) == 0){
        echo"<p>No bill found</p>";
    }
    else{
        $row = mysqli_fetch_assoc($result);
        $cuid = $row['CUSID'];
        $cusid = $_SESSION['cusid'];
        if($cuid==$cusid){

            $Bamt = $row['Bamount'];
            $PS = $row['payment_status'];
            if($PS == 1){
                echo"<p>Already paid  </p></body></html>";
            }
            elseif($PS == 0) {
                echo"<p>Bill Amount: $Bamt</p>";
            }  
        }
        else{
            echo"Please select bill associated with your account only!";
        }
        }

  

 
}
    ?>

    <form action="process_payment.php" method="post">
    <input type="hidden" name="bid" value="<?php echo $bid; ?>">
    <input type="hidden" name="amount" value="<?php echo $Bamt; ?>">
    <input type="hidden" name="description" value="Payment for Bill <?php echo $bid; ?>">
    <input type="hidden" name="currency" value="USD">
    <input type="hidden" name="return_url" value="http://example.com/payment_success.php?$bid">
    <input type="hidden" name="cancel_url" value="http://example.com/payment_cancel.php">
    <?php
    if($PS == 0) {

    echo'<button type="submit">Pay with PayPal</button>';
    }
    ?>
</form>
</body>

</html>

