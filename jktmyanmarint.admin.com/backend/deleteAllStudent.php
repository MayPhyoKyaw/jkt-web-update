<?php

// include('checkUser.php');
// db config
include("../confs/config.php");

$stu_delete = "DELETE FROM students";
mysqli_query($conn, $stu_delete);

echo json_encode(array("success" => true));
