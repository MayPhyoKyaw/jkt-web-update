<?php

// db config
include("../confs/config.php");

$id = intval($_POST["consulDelId"]);

$delete_from_consultants = "DELETE FROM consultants WHERE consultant_id=$id";

mysqli_query($conn, $delete_from_consultants);
header("location: ../consultants.php");
