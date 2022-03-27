<?php
header('Content-Type: application/json');

include("confs/config.php");

$payment_id = intval($_POST["payment_id"]);
$selectPayment = "SELECT * FROM payments WHERE payment_id=$payment_id";
$result = mysqli_query($conn, $selectPayment);
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$enID = intval($data[0]["enrollment_id"]);
$getName = "SELECT s.student_name FROM students s, enrollments e WHERE e.student_id=s.student_id AND e.enrollment_id=$enID";
$stuResult = mysqli_query($conn, $getName);
$stu = array();
foreach ($stuResult as $row) {
    $stu[] = $row;
}
$data[0]["student_name"] = $stu[0]["student_name"];

$cID = intval($data[0]["course_id"]);
$getCourse = "SELECT * FROM courses WHERE course_id=$cID";
$courseResult = mysqli_query($conn, $getCourse);
$course = array();
foreach ($courseResult as $row) {
    $course[] = $row;
}
$data[0]["course"] = $course[0]["title"]."~".$course[0]["level_or_sub"];

$bID = intval($data[0]["bank_id"]);
$getBank = "SELECT * FROM banking_info WHERE bank_id=$bID";

$bankResult = mysqli_query($conn, $getBank);
$bank = array();
foreach ($bankResult as $row) {
    $bank[] = $row;
}

$data[0]["bank"] = $bank[0]["bank_name"];

echo json_encode($data);
mysqli_close($conn);
