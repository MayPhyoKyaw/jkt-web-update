<?php

// db config
include("../confs/config.php");

$payment_id = intval($_POST["payment_id"]);

$delete_from_payments = "DELETE FROM payments WHERE payment_id=$payment_id";

mysqli_query($conn, $delete_from_payments);
header("location: ../pendingPayments.php");
