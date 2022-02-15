<?php

// db config
include("../confs/config.php");

$enrollmentDeletingId = intval($_POST["enrollmentDeletingId"]);

$delete_from_enrollments = "DELETE FROM enrollments WHERE enrollment_id=$enrollmentDeletingId";

mysqli_query($conn,$delete_from_enrollments);
header("location: ../enrollments.php");
?>