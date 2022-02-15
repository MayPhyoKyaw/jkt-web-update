<?php
$arrObj = array("days" => array("Saturday","Sunday"),"sectionHour"=>2);

$json = json_encode($arrObj);

echo ($json);

$arr = json_decode($json,true);

echo $arr["days"][1];
// foreach($arr["days"] as $day){
//     echo $day ;
// }
