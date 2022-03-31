<?php

// include('checkUser.php');
// db config
include("../confs/config.php");

$enroll_del = "DELETE FROM enrollments";
mysqli_query($conn, $enroll_del);

header("location: ../enrollments.php");