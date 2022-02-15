<?php
include("../../confs/config.php");

$json = array();
$sqlQuery = "SELECT consultant_id AS id, CONCAT(name,' - (',type,'/',time,')' ) AS title,date AS start FROM consultants ORDER BY id";

$result = mysqli_query($conn, $sqlQuery);
$eventArray = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($eventArray, $row);
}
mysqli_free_result($result);

mysqli_close($conn);
echo json_encode($eventArray);
