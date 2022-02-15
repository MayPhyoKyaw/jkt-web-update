<?php

// db config
include("../confs/config.php");

$id = intval($_POST["policyIdDel"]);

$delete_from_policies = "DELETE FROM policies WHERE policy_id=$id";

mysqli_query($conn, $delete_from_policies);
header("location: ../policies.php");
