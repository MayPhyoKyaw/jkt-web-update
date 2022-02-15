<?php
include("../../confs/config.php");

$id = $_POST['id'];
// $title = $_POST['title'];
$start = $_POST['start'];
// $end = $_POST['end'];

$sqlUpdate = "UPDATE consultants SET date='$start',updated_at=now() WHERE consultant_id=$id";
mysqli_query($conn, $sqlUpdate);
mysqli_close($conn);
