<?php

// db config
include("../confs/config.php");


$type_id = $_POST["typeIdEdit"];
$type_title = $_POST["typeTitle"];
$typeCreatedAt = $_POST["typeCreatedAt"];

$update_to_types = "UPDATE types SET title='$type_title',created_at='$typeCreatedAt',updated_at=now() WHERE type_id=$type_id";

mysqli_query($conn, $update_to_types);
header("location: ../types.php");
