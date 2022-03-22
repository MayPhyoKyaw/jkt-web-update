<?php

// include('checkUser.php');

include("../confs/jobs_config.php");

$job_str = substr($_POST["job_ids"], 1, -1);
$ids = explode(',',$job_str);

// var_dump($_POST);
foreach ($ids as $id) {
    $newID = trim($id,'"');
    $en_delete = "DELETE FROM en_jobs WHERE job_id='$newID'";
    $mm_delete = "DELETE FROM mm_jobs WHERE job_id='$newID'";
    $jp_delete = "DELETE FROM jp_jobs WHERE job_id='$newID'";

    mysqli_query($jobs_db_conn, $en_delete);
    mysqli_query($jobs_db_conn, $mm_delete);
    mysqli_query($jobs_db_conn, $jp_delete);
}

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

if (count($en_data) > 0 && count($mm_data) > 0 && count($jp_data) > 0) {
    echo json_encode(array("en_data" => $en_data, "mm_data" => $mm_data, "jp_data" => $jp_data));
}