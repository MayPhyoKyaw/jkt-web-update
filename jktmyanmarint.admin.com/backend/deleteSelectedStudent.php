<?php

// include('checkUser.php');
// db config
include("../confs/config.php");

$stu_str = substr($_POST["stu_ids"], 1, -1);
$ids = explode(',', $stu_str);

// var_dump($_POST);
foreach ($ids as $id) {
    $newID = intval(trim($id, '"'));
    $stu_delete = "DELETE FROM students WHERE student_id=$newID";
    mysqli_query($conn, $stu_delete);
}

$stu_all = "SELECT * FROM students ORDER BY updated_at DESC";

$data_result = mysqli_query($conn, $stu_all);

while ($row = mysqli_fetch_array($data_result)) {
    $data[] = $row;
}

echo json_encode(array("query" => $stu_delete, "students" => $data));
