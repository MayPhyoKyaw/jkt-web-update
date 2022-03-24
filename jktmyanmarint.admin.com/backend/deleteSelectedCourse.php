<?php

// include('checkUser.php');
// db config
include("../confs/config.php");

$course_str = substr($_POST["course_ids"], 1, -1);
$ids = explode(',', $course_str);

// var_dump($_POST);
foreach ($ids as $id) {
    $newID = intval(trim($id, '"'));
    $course_delete = "DELETE FROM courses WHERE course_id=$newID";
    mysqli_query($conn, $course_delete);
}

$courses_all = "SELECT course_id, c.title AS course_title, cty.category_id AS category_id, cty.title AS category_title, 
t.type_id AS type_id,t.title AS type_title, c.level_or_sub AS course_level, fee, instructor, services, discount_percent, 
start_date, duration, sections, note, c.created_at AS created_at, c.updated_at AS updated_at 
FROM courses c, categories cty, types t WHERE c.category_id = cty.category_id 
AND c.type_id = t.type_id";

$data_result = mysqli_query($conn, $courses_all);

while ($row = mysqli_fetch_array($data_result)) {
    $data[] = $row;
}

echo json_encode(array("query" => $courses_all, "courses" => $data));
