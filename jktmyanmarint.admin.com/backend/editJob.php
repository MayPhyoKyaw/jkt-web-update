<?php

// include('checkUser.php');

include("../confs/jobs_config.php");

// Allow image extensions
$allowed_image_extension = array(
    "png",
    "PNG",
    "jpg",
    "JPG",
    "jpeg",
    "JPEG"
);

// COMMON FIELDS
$job_id = $_POST['job_id'];
// $photo1 = $_FILES['photo_one'];
// $photo2 = isset($_FILES['photo_two']) && $_FILES['photo_two'];

$job_type = $_POST['job_type'];
$employment_type = $_POST['employment_type'];

$job_arr = explode("-", $job_type);
$emp_arr = explode("-", $employment_type);

if (isset($_POST['available']) && $_POST['available'] == "on") {
    $isavailable = 1;
} else {
    $isavailable = 0;
}

// ENG
$eng_company_name = $_POST['eng_company_name'];
$eng_job_title = $_POST['eng_job_title'];
$eng_wage = $_POST['eng_wage'];
$eng_ot = $_POST['eng_ot'];
$eng_holidays = $_POST['eng_holidays'];
$eng_workinghr = $_POST['eng_workinghr'];
$eng_breaktime = $_POST['eng_breaktime'];
$eng_requirements = $_POST['eng_requirements'];
$eng_benefits = $_POST['eng_benefits'];
$eng_location = $_POST['eng_location'];
$eng_memo = $_POST['eng_memo'];

// MM
$mm_company_name = $_POST['mm_company_name'];
$mm_job_title = $_POST['mm_job_title'];
$mm_wage = $_POST['mm_wage'];
$mm_ot = $_POST['mm_ot'];
$mm_holidays = $_POST['mm_holidays'];
$mm_workinghr = $_POST['mm_workinghr'];
$mm_breaktime = $_POST['mm_breaktime'];
$mm_requirements = $_POST['mm_requirements'];
$mm_benefits = $_POST['mm_benefits'];
$mm_location = $_POST['mm_location'];
$mm_memo = $_POST['mm_memo'];

// JP
$jp_company_name = $_POST['jp_company_name'];
$jp_job_title = $_POST['jp_job_title'];
$jp_wage = $_POST['jp_wage'];
$jp_ot = $_POST['jp_ot'];
$jp_holidays = $_POST['jp_holidays'];
$jp_workinghr = $_POST['jp_workinghr'];
$jp_breaktime = $_POST['jp_breaktime'];
$jp_requirements = $_POST['jp_requirements'];
$jp_benefits = $_POST['jp_benefits'];
$jp_location = $_POST['jp_location'];
$jp_memo = $_POST['jp_memo'];

// var_dump($_POST);
// var_dump($_FILES);

// job_id varchar (20)
// photos 
// company_name varchar (255)
// job_title varchar (255)
// employment_type varchar (50)
// job_type varchar (50)
// wage
// overtime
// holidays
// working_hour
// breaktime
// requirements
// benefits
// location
// memo
// isavailable tinyint(1)
// created_at
// updated_at


function resize_image($file, $ext, $mHW)
{
    if (file_exists($file)) {
        switch ($ext) {
            case "jpeg":
                $original_image = imagecreatefromjpeg($file);
                break;
            case "JPEG":
                $original_image = imagecreatefromjpeg($file);
                break;
            case "jpg":
                $original_image = imagecreatefromjpeg($file);
                break;
            case "JPG":
                $original_image = imagecreatefromjpeg($file);
                break;
            case "png":
                $original_image = imagecreatefrompng($file);
                break;
            case "PNG":
                $original_image = imagecreatefrompng($file);
        }

        // resolution
        $original_width = imagesx($original_image);
        $original_height = imagesx($original_image);

        // try width first
        $ratio = $mHW / $original_width;
        $new_width = $mHW;
        $new_height = $original_height * $ratio;

        // if that doesn't work
        if ($new_height > $mHW) {
            $ratio = $mHW / $original_height;
            $new_height = $mHW;
            $new_width = $original_width * $ratio;
        }
        if ($original_image) {
            $new_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

            switch ($ext) {
                case "jpeg":
                    imagejpeg($new_image, $file, 90);
                    return TRUE;
                    break;
                case "JPEG":
                    imagejpeg($new_image, $file, 90);
                    return TRUE;
                    break;
                case "jpg":
                    imagejpeg($new_image, $file, 90);
                    return TRUE;
                    break;
                case "JPG":
                    imagejpeg($new_image, $file, 90);
                    return TRUE;
                    break;
                case "png":
                    imagepng($new_image, $file, 9);
                    return TRUE;
                    break;
                case "PNG":
                    imagepng($new_image, $file, 9);
                    return TRUE;
                    break;
            }
        }
    }
}

if(!file_exists($_FILES['photo_one']['tmp_name']) && !file_exists($_FILES['photo_two']['tmp_name'])){
    $photos = $_POST["h_photos"];
    // eng table update
    $en_sql = "UPDATE en_jobs
    SET
    photos='$photos', 
    company_name='$eng_company_name', 
    job_title='$eng_job_title', 
    employment_type='$emp_arr[0]', 
    job_type='$job_arr[0]',
    wage='$eng_wage', 
    overtime='$eng_ot', 
    holidays='$eng_holidays', 
    working_hour='$eng_workinghr', 
    breaktime='$eng_breaktime', 
    requirements='$eng_requirements', 
    benefits='$eng_benefits', 
    location='$eng_location', 
    memo='$eng_memo', 
    isavailable='$isavailable', 
    updated_at=now()
    WHERE job_id='$job_id'";

    // echo $en_sql;
    mysqli_query($jobs_db_conn, $en_sql);

    // MM table update
    $mm_sql = "UPDATE mm_jobs
    SET
    photos='$photos', 
    company_name='$mm_company_name', 
    job_title='$mm_job_title', 
    employment_type='$emp_arr[1]', 
    job_type='$job_arr[1]',
    wage='$mm_wage', 
    overtime='$mm_ot', 
    holidays='$mm_holidays', 
    working_hour='$mm_workinghr', 
    breaktime='$mm_breaktime', 
    requirements='$mm_requirements', 
    benefits='$mm_benefits', 
    location='$mm_location', 
    memo='$mm_memo', 
    isavailable='$isavailable', 
    updated_at=now()
    WHERE job_id='$job_id'";

    // echo $mm_sql;
    mysqli_query($jobs_db_conn, $mm_sql);

    // JP table update
    $jp_sql = "UPDATE jp_jobs
    SET
    photos='$photos', 
    company_name='$jp_company_name', 
    job_title='$jp_job_title', 
    employment_type='$emp_arr[1]', 
    job_type='$job_arr[1]',
    wage='$jp_wage', 
    overtime='$jp_ot', 
    holidays='$jp_holidays', 
    working_hour='$jp_workinghr', 
    breaktime='$jp_breaktime', 
    requirements='$jp_requirements', 
    benefits='$jp_benefits', 
    location='$jp_location', 
    memo='$jp_memo', 
    isavailable='$isavailable', 
    updated_at=now()
    WHERE job_id='$job_id'";

    // echo $jp_sql;
    mysqli_query($jobs_db_conn, $jp_sql);
    header("location: ../jobs.php");
}elseif(!file_exists($_FILES['photo_two']['tmp_name'])) {
    $fileinfo1 = @getimagesize($_FILES["photo_one"]["tmp_name"]);
    $org_width1 = $fileinfo1[0];
    $org_height1 = $fileinfo1[1];
    $file_extension1 = pathinfo($_FILES["photo_one"]["name"], PATHINFO_EXTENSION);
    $file1 = $_FILES['photo_one']['name'];

    if ($org_width1 > "150" || $org_height1 > "150") {
        if (file_exists("./companies/$job_id" . '-1.' . "$file_extension1")) unlink("./companies/$job_id" . '-1.' . "$file_extension1");
        $target1 = "companies/" . "$job_id" . '-1.' . "$file_extension1";
        move_uploaded_file($_FILES['photo_one']['tmp_name'], "./" . $target1);

        if (resize_image("./" . $target1, $file_extension1, 150)) {
            // continue to insert to db cuz image upload succeed.
            $target2 = explode("|",$_POST["h_photos"])[1];
            $photos = $target1 . "|" . $target2;

            // eng table update
            $en_sql = "UPDATE en_jobs
            SET
            photos='$photos', 
            company_name='$eng_company_name', 
            job_title='$eng_job_title', 
            employment_type='$emp_arr[0]', 
            job_type='$job_arr[0]',
            wage='$eng_wage', 
            overtime='$eng_ot', 
            holidays='$eng_holidays', 
            working_hour='$eng_workinghr', 
            breaktime='$eng_breaktime', 
            requirements='$eng_requirements', 
            benefits='$eng_benefits', 
            location='$eng_location', 
            memo='$eng_memo', 
            isavailable='$isavailable', 
            updated_at=now()
            WHERE job_id='$job_id'";

            // echo $en_sql;
            mysqli_query($jobs_db_conn, $en_sql);

            // MM table update
            $mm_sql = "UPDATE mm_jobs
            SET
            photos='$photos', 
            company_name='$mm_company_name', 
            job_title='$mm_job_title', 
            employment_type='$emp_arr[1]', 
            job_type='$job_arr[1]',
            wage='$mm_wage', 
            overtime='$mm_ot', 
            holidays='$mm_holidays', 
            working_hour='$mm_workinghr', 
            breaktime='$mm_breaktime', 
            requirements='$mm_requirements', 
            benefits='$mm_benefits', 
            location='$mm_location', 
            memo='$mm_memo', 
            isavailable='$isavailable', 
            updated_at=now()
            WHERE job_id='$job_id'";

            // echo $mm_sql;
            mysqli_query($jobs_db_conn, $mm_sql);

            // JP table update
            $jp_sql = "UPDATE jp_jobs
            SET
            photos='$photos', 
            company_name='$jp_company_name', 
            job_title='$jp_job_title', 
            employment_type='$emp_arr[1]', 
            job_type='$job_arr[1]',
            wage='$jp_wage', 
            overtime='$jp_ot', 
            holidays='$jp_holidays', 
            working_hour='$jp_workinghr', 
            breaktime='$jp_breaktime', 
            requirements='$jp_requirements', 
            benefits='$jp_benefits', 
            location='$jp_location', 
            memo='$jp_memo', 
            isavailable='$isavailable', 
            updated_at=now()
            WHERE job_id='$job_id'";

            // echo $jp_sql;
            mysqli_query($jobs_db_conn, $jp_sql);
            header("location: ../jobs.php");
        } else {
            // echo "resize fail";
            header("location: ../jobs.php");
        }
    }
}
 else {
    $fileinfo2 = @getimagesize($_FILES["photo_two"]["tmp_name"]);
    $org_width2 = $fileinfo2[0];
    $org_height2 = $fileinfo2[1];
    $file_extension1 = pathinfo($_FILES["photo_two"]["name"], PATHINFO_EXTENSION);
    $file2 = $_FILES['photo_two']['name'];

    if ($org_width2 > "150" || $org_height2 > "150") {
        if (file_exists("./companies/$job_id" . '-2.' . "$file_extension2")) unlink("./companies/$job_id" . '-2.' . "$file_extension2");
        $target2 = "companies/" . "$job_id" . '-2.' . "$file_extension2";
        move_uploaded_file($_FILES['photo_two']['tmp_name'], "./" . $target2);

        if (resize_image("./" . $target2, $file_extension2, 150)) {
            // continue to insert to db cuz image upload succeed.
            $target1 = explode("|",$_POST["h_photos"])[0];
            $photos = $target1 . "|" . $target2;

            // eng table update
            $en_sql = "UPDATE en_jobs
            SET
            photos='$photos', 
            company_name='$eng_company_name', 
            job_title='$eng_job_title', 
            employment_type='$emp_arr[0]', 
            job_type='$job_arr[0]',
            wage='$eng_wage', 
            overtime='$eng_ot', 
            holidays='$eng_holidays', 
            working_hour='$eng_workinghr', 
            breaktime='$eng_breaktime', 
            requirements='$eng_requirements', 
            benefits='$eng_benefits', 
            location='$eng_location', 
            memo='$eng_memo', 
            isavailable='$isavailable', 
            updated_at=now()
            WHERE job_id='$job_id'";

            // echo $en_sql;
            mysqli_query($jobs_db_conn, $en_sql);

            // MM table update
            $mm_sql = "UPDATE mm_jobs
            SET
            photos='$photos', 
            company_name='$mm_company_name', 
            job_title='$mm_job_title', 
            employment_type='$emp_arr[1]', 
            job_type='$job_arr[1]',
            wage='$mm_wage', 
            overtime='$mm_ot', 
            holidays='$mm_holidays', 
            working_hour='$mm_workinghr', 
            breaktime='$mm_breaktime', 
            requirements='$mm_requirements', 
            benefits='$mm_benefits', 
            location='$mm_location', 
            memo='$mm_memo', 
            isavailable='$isavailable', 
            updated_at=now()
            WHERE job_id='$job_id'";

            // echo $mm_sql;
            mysqli_query($jobs_db_conn, $mm_sql);

            // JP table update
            $jp_sql = "UPDATE jp_jobs
            SET
            photos='$photos', 
            company_name='$jp_company_name', 
            job_title='$jp_job_title', 
            employment_type='$emp_arr[1]', 
            job_type='$job_arr[1]',
            wage='$jp_wage', 
            overtime='$jp_ot', 
            holidays='$jp_holidays', 
            working_hour='$jp_workinghr', 
            breaktime='$jp_breaktime', 
            requirements='$jp_requirements', 
            benefits='$jp_benefits', 
            location='$jp_location', 
            memo='$jp_memo', 
            isavailable='$isavailable', 
            updated_at=now()
            WHERE job_id='$job_id'";

            // echo $jp_sql;
            mysqli_query($jobs_db_conn, $jp_sql);
            header("location: ../jobs.php");
        } else {
            // echo "resize fail";
            header("location: ../jobs.php");
        }
    }
}