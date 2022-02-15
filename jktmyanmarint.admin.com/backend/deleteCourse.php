<?php

// db config
include("../confs/config.php");

$currentCourseIdDel = intval($_POST["currentCourseIdDel"]);

$delete_from_courses = "DELETE FROM courses WHERE course_id=$currentCourseIdDel";

mysqli_query($conn, $delete_from_courses);
header("location: ../courses.php");
