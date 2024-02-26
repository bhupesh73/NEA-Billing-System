<?php
include('dbconnect.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];
}

if (isset($_GET['bill_id'])) {
    $bill_id = $_GET['bill_id'];
}

if (isset($_GET['amount'])) {
    $amount = $_GET['amount'];
}

$payload = array(
    "token" => $token,
    "amount" => $amount
);

$headers = array(
    "Authorization" => "key test_secret_key_5598b49d04674fcc9e4488cbb58ce896"
);

$amount = (int) $amount;

$URL = "https://khalti.com/api/v2/payment/verify/";
$headers = [
    "Authorization: Key test_secret_key_5598b49d04674fcc9e4488cbb58ce896",
    "Content-Type: application/json"
];

$payload = json_encode([
    "token" => $token,
    "amount" => $amount
]);

$options = [
    "http" => [
        "header" => implode("\r\n", $headers),
        "method" => "POST",
        "content" => $payload,
        "ignore_errors" => true // Optional: Ignore HTTP errors
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($URL, false, $context);

if ($response !== false) {
    // Request successful
    echo 'Request successful';
    $querybill = "UPDATE bill SET payment_status = '1' WHERE bid ='$bill_id'";
    mysqli_query($conn, $querybill);
    $actualamt = $amount/10;
    $insertQuery = "INSERT INTO payment (BID, PDate, PAmount, POID, Rebeat_Amt, Fine_Amt) VALUES ('$bill_id', 'curdate()', '$actualamt', '1', '0', '0')";
    mysqli_query($conn, $insertQuery);

    if ($conn->query($querybill) === true) {
        echo "Paid Successfully.";
    } else {
        echo "Something Went Wrong: " . $conn->error;
    }
    

} else {
    // Request failed
    echo 'Request failed';
}


?>