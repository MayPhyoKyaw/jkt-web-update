<?php
// include('checkUser.php');

include("../confs/config.php");
// foreach ($_POST as $field => $val) {
//     echo $field . " is " . var_dump($val) . "<br>";
// }

$categoryId = $_POST["categoryId"];
$typeId = intval($_POST["typeId"]);
$title = $_POST["title"];
$level_or_sub = $_POST["level_or_sub"];
$fee = intval($_POST["fee"]);

if ($_POST["discountPercent"] && intval($_POST["discountPercent"]) > 0) {
    $discountPercent = intval($_POST["discountPercent"]);
} else {
    $discountPercent = 0;
}

// date format change
$time = strtotime($_POST["startDate"]);
$startDate = date('Y-m-d H:i:s', $time);

$curSection = 1;
$sectionsArr = [];
while (TRUE) {
    if (isset($_POST["days$curSection"]) || (isset($_POST["startTime$curSection"]) || isset($_POST["endTime$curSection"]))) {

        if (isset($_POST["days$curSection"])) {
            $days = $_POST["days$curSection"];
        } else {
            $days = [];
        }
        $startTime = $_POST["startTime$curSection"];
        $endTime = $_POST["endTime$curSection"];
        $arrObj = array("days" => $days, "sectionHour" => "$startTime~$endTime");
        array_push($sectionsArr,$arrObj);
        $curSection++;
    } else {
        break;
    }
}

if ($startDate == "1970-01-01 01:00:00") {
    $startDate = NULL;
}



$duration = intval($_POST["duration"]);

// section json obj change

$sections = json_encode($sectionsArr);

if (isset($_POST["instructor"])) {
    $instructor = $_POST["instructor"];
} else {
    $instructor = "";
}
if (isset($_POST["services"])) {
    $services = $_POST["services"];
} else {
    $services = "";
}
if (isset($_POST["note"])) {
    $note = $_POST["note"];
} else {
    $note = "";
}

var_dump($sections);

$sql = "INSERT INTO courses (category_id,type_id,title,level_or_sub,fee,instructor,services,discount_percent,start_date,duration,sections,note, created_at,
 updated_at) VALUES ($categoryId,$typeId,'$title','$level_or_sub',$fee,'$instructor','$services',$discountPercent,'$startDate',$duration,'$sections', '$note' ,now(), now())";
// echo $sql;
mysqli_query($conn, $sql);
header("location: ../courses.php");
