<?php

// db config
include("../confs/jobs_config.php");

$jobIdDel = $_POST["jobIdDel"];

$delete_from_en_jobs = "DELETE FROM en_jobs WHERE job_id='$jobIdDel'";
$delete_from_mm_jobs = "DELETE FROM mm_jobs WHERE job_id='$jobIdDel'";
$delete_from_jp_jobs = "DELETE FROM jp_jobs WHERE job_id='$jobIdDel'";

// echo $delete_from_en_jobs;
// echo $delete_from_mm_jobs;
// echo $delete_from_jp_jobs;

mysqli_query($jobs_db_conn, $delete_from_en_jobs);
mysqli_query($jobs_db_conn, $delete_from_mm_jobs);
mysqli_query($jobs_db_conn, $delete_from_jp_jobs);
header("location: ../jobs.php");
