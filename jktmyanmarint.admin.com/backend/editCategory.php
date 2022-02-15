<?php

// db config
include("../confs/config.php");


$category_id = $_POST["catIdEdit"];
$category_title = $_POST["catTitle"];
$catCreatedAt = $_POST["catCreatedAt"];

$update_to_categories = "UPDATE categories SET title='$category_title',created_at='$catCreatedAt',updated_at=now() WHERE category_id=$category_id";

mysqli_query($conn, $update_to_categories);
header("location: ../categories.php");
