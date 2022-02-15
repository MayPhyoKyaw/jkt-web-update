<?php
include("../../confs/config.php");

$id = $_POST['id'];
$sqlDelete = "DELETE from consultants WHERE consultant_id=".$id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
?>