<?php
include_once("../../jktmyanmarint.admin.com/confs/config.php");

// for noti
include("../backend/newNoti.php");

if (isset($_POST['paymentSubmit'])) {

    $enrollment_id = $_POST["enrollment_id"];
    $course_id = $_POST["course_id"];
    $bank_id = $_POST["bank_id"];
    $paymentAmount = $_POST["payment_amount"];
    $nrcNumber = $_POST['nrcNumber'];
    // get extension
    $ssExtension = pathinfo($_FILES["paymentImg"]["name"], PATHINFO_EXTENSION);

    $paymentSS_name = "ss" . $enrollment_id;

    $dst = "./paymentUploads/" . $paymentSS_name . "." . $ssExtension;

    var_dump($_POST);

    if (move_uploaded_file($_FILES["paymentImg"]["tmp_name"], $dst)) {
        $insert_into_payments = "INSERT INTO payments 
        (enrollment_id, course_id,bank_id,payment_amount, is_pending, created_at, updated_at) 
        VALUES ($enrollment_id, $course_id, $bank_id,$paymentAmount, 1, now(),now())";
        mysqli_query($conn, $insert_into_payments);
        $lastInserted = $conn->insert_id;
        addNewNoti("new payment from student", "please go to pending payments and check payment is valid", "PENDING_PAYMENT", null, $lastInserted, null);
        header("location: ../frontend/index.html");
    }
}
