<?php

// db config
include("../confs/config.php");


$payment_id = $_POST["payment_id"];

$update_to_payments = "UPDATE payments SET is_pending=0 WHERE payment_id=$payment_id";

mysqli_query($conn, $update_to_payments);
header("location: ../pendingPayments.php");
