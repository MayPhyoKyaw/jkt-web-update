<?php

// for noti
include("../backend/newNoti.php");

// db config
include("../../jktmyanmarint.admin.com/confs/config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$type = $_POST['appointment_type'];

// $date = $_POST['appointment_date'];
$exp = explode("/", substr($_POST["appointment_date"], 15));
$imp = implode("-", $exp);
$strToTime = strtotime($imp);
$date = date('Y-m-d H:i:s', $strToTime);

if ($date == "1970-01-01 01:00:00") {
    $date = NULL;
}

$time = $_POST['appointment_time'];
$duration = $_POST['appointment_duration'];
$about = $_POST['about_consultant'];

$sql = "INSERT INTO consultants (name, email,
 phone, type, date, time, duration, about,created_at,updated_at) VALUES ('$name','$email','$phone','$type','$date','$time','$duration','$about' ,now(), now())";
// echo $sql;
mysqli_query($conn, $sql);
$lastInserted = $conn->insert_id;
addNewNoti("new consulting appointment", "please check consultants", "NEW_APPOINTMENT", null, null,$lastInserted);
header("location: ../consultSuccess.php");
