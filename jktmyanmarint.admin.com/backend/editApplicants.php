<?php

// db config
include("../confs/jobs_config.php");

// STEP 1 
$applicantName = $_FILES['applicantName'];
$jobId = $_POST['jobId'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$jlptLevel = $_POST['jlptLevel'];
$resume = isset($_POST['resume']) ? $_POST['resume'] : "";
$fbPfLink = isset($_POST['fbPfLink']) ? $_POST['fbPfLink'] : "";
$porfolio = isset($_POST['porfolio']) ? $_POST['porfolio'] : "";
$note = isset($_POST['note']) ? $_POST['note'] : "";;

if ($resume["size"] > 0) {
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["resume"]["tmp_name"]);
    $org_width = $fileinfo[0];
    $org_height = $fileinfo[1];


    $file_extension = pathinfo($_FILES["resume"]["name"], PATHINFO_EXTENSION);
    $file = $_FILES['resume']['name'];

    if (file_exists("../../jktmyanmarint.com/backend/uploads/$nrcNumber.$file_extension")) unlink("../../jktmyanmarint.com/backend/uploads/$nrcNumber.$file_extension");
    $target = "uploads/" . "$nrcNumber.$file_extension";
    move_uploaded_file($_FILES['photo']['tmp_name'], "../../jktmyanmarint.com/backend/" . $target);

    $update_to_applicants = "UPDATE students SET 
            student_name='$uname', 
            dob='$dob', 
            fname='$fname', 
            nrc='$nrc', 
            email='$email', 
            phone='$phone', 
            education='$education', 
            address='$address'
            WHERE applicant_id = $applicant_id";

    mysqli_query($jobs_db_conn, $update_to_applicants);
    header("location: ../applicants.php");
} else {
    $src = $_POST["notChangeImg"];
    $update_to_applicants = "UPDATE students SET 
            student_name='{$uname}', 
            dob='{$dob}', 
            fname='{$fname}', 
            nrc='{$nrc}', 
            email='{$email}', 
            phone='{$phone}',
            education='{$education}', 
            address='{$address}', 
            photo='{$src}',
            created_at='{$created_at}',
            updated_at=now()
            WHERE applicant_id = $applicant_id";
    mysqli_query($jobs_db_conn, $update_to_applicants);
    header("location: ../applicants.php");
}

mysqli_close($jobs_db_conn);
