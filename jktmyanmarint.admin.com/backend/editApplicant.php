<?php

// db config
include("../confs/jobs_config.php");

// STEP 1 
$applicantId = intval($_POST['applicantEditId']);
$applicantName = $_POST['applicantEditName'];
$jobId = $_POST['jobId'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$jlptLevel = $_POST['jlptLevel'];
// $new_resume = empty($_POST['new_edit_resume']) ? "" : $_POST['new_edit_resume'];
$origin_resume = $_POST['origin_resume'];
$fbPfLink = !empty($_POST['fbPfLink']) ? $_POST['fbPfLink'] : NULL;
$porfolio = !empty($_POST['porfolio']) ? $_POST['porfolio'] : NULL;
$note = !empty($_POST['note']) ? $_POST['note'] : NULL;
$createdAt = $_POST["createdAt"];
// echo $createdAt . "<br>" . $_POST['applicantEditId'] . "<br>" .intval($_POST['applicantEditId']);
$splitDob = explode("-", $dob);
// get extension
$resumeExtension = pathinfo($_FILES["new_edit_resume"]["name"], PATHINFO_EXTENSION);
$resume_name = $applicantName . "-" . $splitDob[1] . $splitDob[2];
$store_path = "resumeUploads/" . $resume_name .".". $resumeExtension;
$dst = "../../jktmyanmarint.com/backend/" . $store_path;
// echo $dst;
if (!empty($resumeExtension)) {
    // echo "hello not empty";
    if (move_uploaded_file($_FILES["new_edit_resume"]["tmp_name"], $dst)) {
        $update_to_applicants = "UPDATE applicants SET 
            applicant_name='{$applicantName}', 
            job_id = '{$jobId}',
            applicant_email='{$email}',
            applicant_phone='{$phone}',
            applicant_dob='{$dob}', 
            gender='{$gender}', 
            jlpt_level='{$jlptLevel}',
            resume='{$store_path}',
            fb_profile_link='{$fbPfLink}', 
            porfolio_link='{$porfolio}', 
            additional_note='{$note}',
            created_at='{$createdAt}',
            updated_at=now()
            WHERE applicant_id = $applicantId";
        mysqli_query($jobs_db_conn, $update_to_applicants);
    }
    header("location: ../applicants.php");
} else {
    echo "hello empty";
    $update_to_applicant = "UPDATE applicants SET 
            applicant_name='{$applicantName}', 
            job_id = '{$jobId}',
            applicant_email='{$email}',
            applicant_phone='{$phone}',
            applicant_dob='{$dob}', 
            gender='{$gender}', 
            jlpt_level='{$jlptLevel}',
            resume='{$origin_resume}',
            fb_profile_link='{$fbPfLink}', 
            porfolio_link='{$porfolio}', 
            additional_note='{$note}',
            created_at='{$createdAt}',
            updated_at=now()
            WHERE applicant_id = $applicantId";
    mysqli_query($jobs_db_conn, $update_to_applicant);
    header("location: ../applicants.php");
}
mysqli_close($jobs_db_conn);
