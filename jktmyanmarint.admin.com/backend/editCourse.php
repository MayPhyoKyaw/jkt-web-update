<?php

// db config
include("../confs/config.php");

// $courseIdEdit = intval($_POST["courseIdEdit"]);
$courseIdEdit = intval($_POST["courseIdEdit"]);

$createdAt = strtotime($_POST["courseCreatedAt"]);
$courseCreatedAt = date('Y-m-d H:i:s', $createdAt);

$courseTitleEdit = $_POST["courseTitleEdit"];
$courseCategoryIdEdit = intval($_POST["courseCategoryIdEdit"]);
$courseTypeIdEdit = intval($_POST["courseTypeIdEdit"]);
$level_or_sub = $_POST["level_or_sub"];
$fee = intval($_POST["fee"]);

if ($_POST["discountPercent"] && intval($_POST["discountPercent"]) > 0) {
    $discountPercent = intval($_POST["discountPercent"]);
} else {
    $discountPercent = 0;
}

$time = strtotime($_POST["startDate"]);
$startDate = date('Y-m-d H:i:s', $time);


$duration = intval($_POST["duration"]);
// $startTime = $_POST["startTime"];
// $endTime = $_POST["endTime"];

if (isset($_POST["days"])) {
    $days = $_POST["days"];
} else {
    $days = [];
}
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
$sections = json_encode($sectionsArr);
// var_dump($sections);

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

// echo "id is" . $courseIdEdit . " ," . "<br>" .
//     "created at" . $courseCreatedAt . "," . "<br>" .
//     "title" . $courseTitleEdit . "," . "<br>" .
//     "category id" . $courseCategoryIdEdit . "," . "<br>" .
//     "type_id" . $courseTypeIdEdit . "," . "<br>" .
//     "level or sub" . $level_or_sub . "," . "<br>" .
//     "fee" . $fee . "," . "<br>" .
//     "discount percent" . $discountPercent . "," . "<br>" .
//     "start date " . $startDate . "," . "<br>" .
//     "duration" . $duration . "," . "<br>" .
//     "start time" . $startTime . "," . "<br>" .
//     "end time" . $endTime . "," . "<br>" .
//     "sections " . $sections . "," . "<br>" .

//     "instructor is" . $instructor . "," . "<br>" .
//     "services are " . $services . "," . "<br>" .
//     "note is " . $note;

// var_dump($courseIdEdit);
// echo "<br>";
// var_dump($courseTitleEdit);
// echo "<br>";
// var_dump($courseCategoryIdEdit);
// echo "<br>";
// var_dump($level_or_sub);
// echo "<br>";
// var_dump($fee);
// echo "<br>";
// var_dump($discountPercent);
// echo "<br>";
// var_dump($startDate);
// echo "<br>";
// var_dump($duration);
// echo "<br>";
// var_dump($startTime);
// echo "<br>";
// var_dump($endTime);
// echo "<br>";
// var_dump($sections);
// echo "<br>";
// var_dump($instructor);
// echo "<br>";
// var_dump($services);
// echo "<br>";
// var_dump($note);

if ($startDate == "1970-01-01 01:00:00") {
    $update_to_courses = "UPDATE courses SET
category_id=$courseCategoryIdEdit,
type_id=$courseTypeIdEdit,
title='$courseTitleEdit',
level_or_sub='$level_or_sub',
fee=$fee,
instructor='$instructor',
services='$services',
discount_percent=$discountPercent,
start_date=NULL,
duration='$duration',
sections='$sections',
note='$note',
created_at='$courseCreatedAt',
updated_at=now()
WHERE course_id=$courseIdEdit";
} else {
    $update_to_courses = "UPDATE courses SET
category_id=$courseCategoryIdEdit,
type_id=$courseTypeIdEdit,
title='$courseTitleEdit',
level_or_sub='$level_or_sub',
fee=$fee,
instructor='$instructor',
services='$services',
discount_percent=$discountPercent,
start_date='$startDate',
duration='$duration',
sections='$sections',
note='$note',
created_at='$courseCreatedAt',
updated_at=now()
WHERE course_id=$courseIdEdit";
}

mysqli_query($conn, $update_to_courses);
header("location: ../courses.php");
