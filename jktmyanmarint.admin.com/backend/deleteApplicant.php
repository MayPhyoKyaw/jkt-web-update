<?php
include("../confs/jobs_config.php");

$applicantId = intval($_POST["applicantDelId"]);

$applicant_query = "DELETE FROM applications WHERE applicant_id=$applicantId";

mysqli_query($jobs_db_conn, $applicant_query);
header("location: ../applicants.php");
?>