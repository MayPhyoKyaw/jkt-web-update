<?php

// db config
include("../confs/config.php");

$policyIdEdit = $_POST["policyIdEdit"];
$description = $_POST["policyDescription"];
$category_id = intval($_POST["policyCatId"]);

$update_to_policies = "UPDATE policies SET description='$description',category_id=$category_id,updated_at=now() WHERE policy_id=$policyIdEdit";

// echo $update_to_policies;

mysqli_query($conn, $update_to_policies);
header("location: ../policies.php");
