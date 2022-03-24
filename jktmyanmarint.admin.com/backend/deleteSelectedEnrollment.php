<?php

// include('checkUser.php');
// db config
include("../confs/config.php");
include('../auth/hashFunc.php');

$enroll_str = substr($_POST["enroll_ids"], 1, -1);
$ids = explode(',', $enroll_str);

// var_dump($_POST);
foreach ($ids as $id) {
    $newID = intval(trim($id, '"'));
    $enroll_delete = "DELETE FROM enrollments WHERE enrollment_id=$newID";
    mysqli_query($conn, $enroll_delete);
}

$enroll_all = "SELECT enrollment_id, e.course_id AS course_id, title, level_or_sub, photo, student_name, nrc, payment_method, paid_percent, is_pending, e.created_at AS created_at,
e.updated_at AS updated_at,c.fee as fee FROM enrollments e, students s, courses c WHERE e.student_id = s.student_id AND e.course_id = c.course_id ORDER BY updated_at DESC";

$data_result = mysqli_query($conn, $enroll_all);

while ($row = mysqli_fetch_array($data_result)) {
    $newRow = $row;
    $nrcNo = substr($row['nrc'], strlen($row['nrc']) - 6, strlen($row['nrc']));
    $newNrc = encrypt_decrypt("encrypt", $nrcNo);
    $newRow["nrcNo"] = $newNrc;
    $data[] = $newRow;
}

echo json_encode(array("query" => $enroll_delete, "enrollments" => $data));
