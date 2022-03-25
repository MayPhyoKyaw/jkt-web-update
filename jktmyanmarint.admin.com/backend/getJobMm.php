<?php

// db config
include("../confs/jobs_config.php");


$job_id = substr($_POST["job_id"], 2, -2);

$getJob = "SELECT * FROM mm_jobs WHERE job_id='$job_id'";

$result = mysqli_query($jobs_db_conn, $getJob);

while ($row = mysqli_fetch_array($result)) {
    $job[] = $row;
}


if (count($job) > 0) {
    echo json_encode(array("job_data" => $job));
}
