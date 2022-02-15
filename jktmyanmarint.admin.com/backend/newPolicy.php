<?php
// include('checkUser.php');

include("../confs/config.php");
$description = $_POST["description"];
$category_id = $_POST["categoryId"];

$sql = "INSERT INTO policies (category_id,description ,created_at,
 updated_at) VALUES ($category_id,'$description', now(), now())";
mysqli_query($conn, $sql);
header("location: ../policies.php");
