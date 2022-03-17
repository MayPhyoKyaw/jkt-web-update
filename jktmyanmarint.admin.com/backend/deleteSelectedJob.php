<?php

// include('checkUser.php');

include("../confs/jobs_config.php");

$ids = $_POST["job_ids"];
// var_dump($_POST);
foreach ($ids as $id) {
    $en_delete = "DELETE FROM en_jobs WHERE job_id='$id'";
    $mm_delete = "DELETE FROM mm_jobs WHERE job_id='$id'";
    $jp_delete = "DELETE FROM jp_jobs WHERE job_id='$id'";

    $del_en = mysqli_query($jobs_db_conn, $en_delete);
    $del_mm = mysqli_query($jobs_db_conn, $mm_delete);
    $del_jp = mysqli_query($jobs_db_conn, $jp_delete);

    mysqli_query($jobs_db_conn, $del_en);

    mysqli_query($jobs_db_conn, $del_mm);

    mysqli_query($jobs_db_conn, $del_jp);
}


echo json_encode(array("status" => 201));