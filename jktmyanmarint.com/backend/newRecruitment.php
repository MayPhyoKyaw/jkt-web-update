<?php 
include_once "../../jktmyanmarint.admin.com/confs/jobs_config.php";
// echo "hello";
$recruitmentName = $_POST["recruitmentName"];
$recruitmentEmail = $_POST["recruitmentEmail"];
$recruitmentPhone = $_POST["recruitmentPhone"];
$recruitmentDob = $_POST["recruitmentDob"];
$gender = $_POST["gender"];
$recruitmentJpSkill = $_POST["recruitmentJpSkill"];
$fbProfileLink = empty($_POST["fbProfileLink"]) ? NULL : $_POST["fbProfileLink"];
$portfolioLinks = empty($_POST["portfolioLinks"]) ? NULL : $_POST["portfolioLinks"];
$recruitmentNote = empty($_POST["recruitmentNote"]) ? NULL : $_POST["recruitmentNote"];

// echo $fbProfileLink . "<br>";
// echo $portfolioLinks . "<br>";
// echo $recruitmentNote . "<br>";
// echo "null". NULL;

$splitDob = explode("-", $recruitmentDob);

$extension = pathinfo($_FILES["recruitmentCv"]["name"], PATHINFO_EXTENSION);
$resumeName = $recruitmentName . "-" . $splitDob[1] . $splitDob[2];
$resume = "resumeUploads/" . $resumeName .".". $extension;

if (move_uploaded_file($_FILES["recruitmentCv"]["tmp_name"], $resume)) {
    $insert_into_application = "INSERT INTO applications 
        (job_id, applicant_name, applicant_email, applicant_phone, applicant_dob, gender, jlpt_level, resume, fb_profile_link, porfolio_link, additional_note, created_at, updated_at) 
        VALUES ('1', '$recruitmentName', '$recruitmentEmail', '$recruitmentPhone', '$recruitmentDob', '$gender', '$recruitmentJpSkill', '$resume', '$fbProfileLink', '$portfolioLinks', '$recruitmentNote', now(),now())";
       echo $insert_into_application;
       mysqli_query($jobs_db_conn, $insert_into_application);
    header("location: ../recruitmentFormSuccess.php");
} else {
    $insert_into_application = "INSERT INTO applications
        (job_id, applicant_name, applicant_email, applicant_phone, applicant_dob, gender, jlpt_level, resume, fb_profile_link, porfolio_link, additional_note, created_at, updated_at) 
        VALUES ('1', '$recruitmentName', '$recruitmentEmail', '$recruitmentPhone', '$recruitmentDob', '$gender', '$recruitmentJpSkill', NULL, '$fbProfileLink', '$portfolioLinks', '$recruitmentNote', now(),now())";
        echo $insert_into_application;
        mysqli_query($jobs_db_conn, $insert_into_application);
    header("location: ../recruitmentFormSuccess.php");
}
?>