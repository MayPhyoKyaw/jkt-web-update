<?php

// db config
include("../confs/config.php");

$typeIdDel = intval($_POST["typeIdDel"]);

$delete_from_types = "DELETE FROM types WHERE type_id=$typeIdDel";

mysqli_query($conn, $delete_from_types);
header("location: ../types.php");
