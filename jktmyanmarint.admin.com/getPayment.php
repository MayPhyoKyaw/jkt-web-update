<?php
header('Content-Type: application/json');

include("confs/config.php");

$payment_id = $_POST["payment_id"];

$sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, screenshot,
p.created_at AS created_at FROM payments p, enrollments e, courses c,students s ,banking_info b 
WHERE p.payment_id = $payment_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id 
AND p.bank_id = b.bank_id AND p.is_pending = 1";

$result = mysqli_query($conn, $sqlQuery);
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($conn);
