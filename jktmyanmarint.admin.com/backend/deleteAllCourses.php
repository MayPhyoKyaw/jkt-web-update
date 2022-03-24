<?php

// include('checkUser.php');
// db config
include("../confs/config.php");

$course_delete = "DELETE FROM courses";
mysqli_query($conn, $course_delete);

echo json_encode(array("success" => true));
