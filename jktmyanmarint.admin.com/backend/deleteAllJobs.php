<?php

// include('checkUser.php');

include("../confs/jobs_config.php");

// var_dump($_POST);

$en_delete = "DELETE FROM en_jobs";
$mm_delete = "DELETE FROM mm_jobs";
$jp_delete = "DELETE FROM jp_jobs";

mysqli_query($jobs_db_conn, $en_delete);

mysqli_query($jobs_db_conn, $mm_delete);

mysqli_query($jobs_db_conn, $jp_delete);

$en_select_all = "SELECT * FROM en_jobs ORDER BY updated_at DESC";
$mm_select_all = "SELECT * FROM mm_jobs ORDER BY updated_at DESC";
$jp_select_all = "SELECT * FROM jp_jobs ORDER BY updated_at DESC";

$en_data_result = mysqli_query($jobs_db_conn, $en_select_all);
$mm_data_result = mysqli_query($jobs_db_conn, $mm_select_all);
$jp_data_result = mysqli_query($jobs_db_conn, $jp_select_all);

while ($row = mysqli_fetch_array($en_data_result)) {
    $en_data[] = $row;
}

while ($row = mysqli_fetch_array($mm_data_result)) {
    $mm_data[] = $row;
}

while ($row = mysqli_fetch_array($jp_data_result)) {
    $jp_data[] = $row;
}

// $en_data = mysqli_fetch_assoc($en_data_result);
// $mm_data = mysqli_fetch_assoc($en_data_result);
// $jp_data = mysqli_fetch_assoc($en_data_result);

echo json_encode(array("success" => true));
// if (count($en_data) > 0 && count($mm_data) > 0 && count($jp_data) > 0) {
// }