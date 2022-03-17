<?php

// include('checkUser.php');

include("../confs/jobs_config.php");

$ids = $_POST["job_ids"];
// $ids = ["asdf","asdf-copy6232e55d0c7d1"];
// var_dump($_POST);
foreach ($ids as $id) {
    $en_select = "SELECT * FROM en_jobs WHERE job_id='$id'";
    $mm_select = "SELECT * FROM mm_jobs WHERE job_id='$id'";
    $jp_select = "SELECT * FROM jp_jobs WHERE job_id='$id'";

    $result_en = mysqli_query($jobs_db_conn, $en_select);
    $result_mm = mysqli_query($jobs_db_conn, $mm_select);
    $result_jp = mysqli_query($jobs_db_conn, $jp_select);


    while ($row = mysqli_fetch_assoc($result_en)) {
        $en_result = $row;
    }

    while ($row = mysqli_fetch_assoc($result_mm)) {
        $mm_result = $row;
    }

    while ($row = mysqli_fetch_assoc($result_jp)) {
        $jp_result = $row;
    }

    // en columns
    $en_job_id = $en_result['job_id'];
    $en_photos = $en_result['photos'];
    $en_company_name = $en_result['company_name'];
    $en_job_title = $en_result['job_title'];
    $en_employment_type = $en_result['employment_type'];
    $en_job_type = $en_result['job_type'];
    $en_wage = $en_result['wage'];
    $en_overtime = $en_result['overtime'];
    $en_holidays = $en_result['holidays'];
    $en_working_hour = $en_result['working_hour'];
    $en_breaktime = $en_result['breaktime'];
    $en_requirements = $en_result['requirements'];
    $en_benefits = $en_result['benefits'];
    $en_location = $en_result['location'];
    $en_memo = $en_result['memo'];
    $en_isavailable = $en_result['isavailable'];
    $en_created_at = str_replace(' ', '', $en_result['created_at']);
    $en_updated_at = $en_result['updated_at'];


    // mm columns
    $mm_job_id = $mm_result['job_id'];
    $mm_photos = $mm_result['photos'];
    $mm_company_name = $mm_result['company_name'];
    $mm_job_title = $mm_result['job_title'];
    $mm_employment_type = $mm_result['employment_type'];
    $mm_job_type = $mm_result['job_type'];
    $mm_wage = $mm_result['wage'];
    $mm_overtime = $mm_result['overtime'];
    $mm_holidays = $mm_result['holidays'];
    $mm_working_hour = $mm_result['working_hour'];
    $mm_breaktime = $mm_result['breaktime'];
    $mm_requirements = $mm_result['requirements'];
    $mm_benefits = $mm_result['benefits'];
    $mm_location = $mm_result['location'];
    $mm_memo = $mm_result['memo'];
    $mm_isavailable = $mm_result['isavailable'];
    $mm_created_at = str_replace(' ', '', $mm_result['created_at']);
    $mm_updated_at = $mm_result['updated_at'];


    // jp columns
    $jp_job_id = $jp_result['job_id'];
    $jp_photos = $jp_result['photos'];
    $jp_company_name = $jp_result['company_name'];
    $jp_job_title = $jp_result['job_title'];
    $jp_employment_type = $jp_result['employment_type'];
    $jp_job_type = $jp_result['job_type'];
    $jp_wage = $jp_result['wage'];
    $jp_overtime = $jp_result['overtime'];
    $jp_holidays = $jp_result['holidays'];
    $jp_working_hour = $jp_result['working_hour'];
    $jp_breaktime = $jp_result['breaktime'];
    $jp_requirements = $jp_result['requirements'];
    $jp_benefits = $jp_result['benefits'];
    $jp_location = $jp_result['location'];
    $jp_memo = $jp_result['memo'];
    $jp_isavailable = $jp_result['isavailable'];
    $jp_created_at = str_replace(' ', '', $jp_result['created_at']);
    $jp_updated_at = $jp_result['updated_at'];

    // $randHex = bin2hex($random_bytes(15));

    $updateID = $en_job_id . "-copy" . uniqid();
    // echo $updateID;
    $en_sql = "INSERT INTO en_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour,  breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) VALUES ('$updateID','$en_photos','$en_company_name','$en_job_title','$en_employment_type','$en_job_type','$en_wage','$en_overtime','$en_holidays','$en_working_hour','$en_breaktime','$en_requirements','$en_benefits','$en_location','$en_memo',$en_isavailable,'$en_created_at', now())";
    // echo $en_sql;
    mysqli_query($jobs_db_conn, $en_sql);

    // MM table insert
    $mm_sql = "INSERT INTO mm_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour, breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) VALUES ('$updateID','$mm_photos','$mm_company_name','$mm_job_title','$mm_employment_type','$mm_job_type','$mm_wage','$mm_overtime','$mm_holidays','$mm_working_hour','$mm_breaktime','$mm_requirements','$mm_benefits','$mm_location','$mm_memo',$mm_isavailable,'$mm_created_at', now())";
    // echo $mm_sql;
    mysqli_query($jobs_db_conn, $mm_sql);

    // JP table insert
    $jp_sql = "INSERT INTO jp_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour, breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) VALUES ('$updateID','$jp_photos','$jp_company_name','$jp_job_title','$jp_employment_type','$jp_job_type','$jp_wage','$jp_overtime','$jp_holidays','$jp_working_hour','$jp_breaktime','$jp_requirements','$jp_benefits','$jp_location','$jp_memo',$jp_isavailable,'$jp_created_at', now())";
    // echo $jp_sql;
    mysqli_query($jobs_db_conn, $jp_sql);
}

$en_select_all = "SELECT * FROM en_jobs";
$mm_select_all = "SELECT * FROM mm_jobs";
$jp_select_all = "SELECT * FROM jp_jobs";

$en_data_result = mysqli_query($jobs_db_conn, $en_select_all);
$mm_data_result = mysqli_query($jobs_db_conn, $mm_select_all);
$jp_data_result = mysqli_query($jobs_db_conn, $jp_select_all);

while ($row = mysqli_fetch_array($en_data_result)) {
    $en_data[] = $row;
}

while ($row = mysqli_fetch_array($mm_data_result)) {
    $mm_data[] = $row;
}

while ($row = mysqli_fetch_array($jp_data_result)) {
    $jp_data[] = $row;
}

// $en_data = mysqli_fetch_assoc($en_data_result);
// $mm_data = mysqli_fetch_assoc($en_data_result);
// $jp_data = mysqli_fetch_assoc($en_data_result);

echo json_encode(array("en_data" => $en_data, "mm_data" => $mm_data, "jp_data" => $jp_data));
// header("location: ../jobs.php");

// // COMMON FIELDS
// $job_id = $_POST['job_id'];
// // $photo1 = $_FILES['photo_one'];
// // $photo2 = isset($_FILES['photo_two']) && $_FILES['photo_two'];

// $job_type = $_POST['job_type'];
// $employment_type = $_POST['employment_type'];

// $job_arr = explode("-", $job_type);
// $emp_arr = explode("-", $employment_type);

// if (isset($_POST['available']) && $_POST['available'] == "on") {
//     $isavailable = 1;
// } else {
//     $isavailable = 0;
// }

// // ENG
// $eng_company_name = $_POST['eng_company_name'];
// $eng_job_title = $_POST['eng_job_title'];
// $eng_wage = $_POST['eng_wage'];
// $eng_ot = $_POST['eng_ot'];
// $eng_holidays = $_POST['eng_holidays'];
// $eng_workinghr = $_POST['eng_workinghr'];
// $eng_breaktime = $_POST['eng_breaktime'];
// $eng_requirements = $_POST['eng_requirements'];
// $eng_benefits = $_POST['eng_benefits'];
// $eng_location = $_POST['eng_location'];
// $eng_memo = $_POST['eng_memo'];

// // MM
// $mm_company_name = $_POST['mm_company_name'];
// $mm_job_title = $_POST['mm_job_title'];
// $mm_wage = $_POST['mm_wage'];
// $mm_ot = $_POST['mm_ot'];
// $mm_holidays = $_POST['mm_holidays'];
// $mm_workinghr = $_POST['mm_workinghr'];
// $mm_breaktime = $_POST['mm_breaktime'];
// $mm_requirements = $_POST['mm_requirements'];
// $mm_benefits = $_POST['mm_benefits'];
// $mm_location = $_POST['mm_location'];
// $mm_memo = $_POST['mm_memo'];

// // JP
// $jp_company_name = $_POST['jp_company_name'];
// $jp_job_title = $_POST['jp_job_title'];
// $jp_wage = $_POST['jp_wage'];
// $jp_ot = $_POST['jp_ot'];
// $jp_holidays = $_POST['jp_holidays'];
// $jp_workinghr = $_POST['jp_workinghr'];
// $jp_breaktime = $_POST['jp_breaktime'];
// $jp_requirements = $_POST['jp_requirements'];
// $jp_benefits = $_POST['jp_benefits'];
// $jp_location = $_POST['jp_location'];
// $jp_memo = $_POST['jp_memo'];

// // var_dump($_POST);
// // var_dump($_FILES);

// // job_id varchar (20)
// // photos 
// // company_name varchar (255)
// // job_title varchar (255)
// // employment_type varchar (50)
// // job_type varchar (50)
// // wage
// // overtime
// // holidays
// // working_hour
// // breaktime
// // requirements
// // benefits
// // location
// // memo
// // isavailable tinyint(1)
// // created_at
// // updated_at


// function resize_image($file, $ext, $mHW)
// {
//     if (file_exists($file)) {
//         switch ($ext) {
//             case "jpeg":
//                 $original_image = imagecreatefromjpeg($file);
//                 break;
//             case "JPEG":
//                 $original_image = imagecreatefromjpeg($file);
//                 break;
//             case "jpg":
//                 $original_image = imagecreatefromjpeg($file);
//                 break;
//             case "JPG":
//                 $original_image = imagecreatefromjpeg($file);
//                 break;
//             case "png":
//                 $original_image = imagecreatefrompng($file);
//                 break;
//             case "PNG":
//                 $original_image = imagecreatefrompng($file);
//         }

//         // resolution
//         $original_width = imagesx($original_image);
//         $original_height = imagesx($original_image);

//         // try width first
//         $ratio = $mHW / $original_width;
//         $new_width = $mHW;
//         $new_height = $original_height * $ratio;

//         // if that doesn't work
//         if ($new_height > $mHW) {
//             $ratio = $mHW / $original_height;
//             $new_height = $mHW;
//             $new_width = $original_width * $ratio;
//         }
//         if ($original_image) {
//             $new_image = imagecreatetruecolor($new_width, $new_height);
//             imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

//             switch ($ext) {
//                 case "jpeg":
//                     imagejpeg($new_image, $file, 90);
//                     return TRUE;
//                     break;
//                 case "JPEG":
//                     imagejpeg($new_image, $file, 90);
//                     return TRUE;
//                     break;
//                 case "jpg":
//                     imagejpeg($new_image, $file, 90);
//                     return TRUE;
//                     break;
//                 case "JPG":
//                     imagejpeg($new_image, $file, 90);
//                     return TRUE;
//                     break;
//                 case "png":
//                     imagepng($new_image, $file, 9);
//                     return TRUE;
//                     break;
//                 case "PNG":
//                     imagepng($new_image, $file, 9);
//                     return TRUE;
//                     break;
//             }
//         }
//     }
// }


// if (!file_exists($_FILES['photo_two']['tmp_name']) || !is_uploaded_file($_FILES['photo_two']['tmp_name'])) {
//     $fileinfo1 = @getimagesize($_FILES["photo_one"]["tmp_name"]);
//     $org_width1 = $fileinfo1[0];
//     $org_height1 = $fileinfo1[1];
//     $file_extension1 = pathinfo($_FILES["photo_one"]["name"], PATHINFO_EXTENSION);
//     $file1 = $_FILES['photo_one']['name'];

//     if ($org_width1 > "150" || $org_height1 > "150") {
//         if (file_exists("./companies/$job_id" . '-1.' . "$file_extension1")) unlink("./companies/$job_id" . '-1.' . "$file_extension1");
//         $target1 = "companies/" . "$job_id" . '-1.' . "$file_extension1";
//         move_uploaded_file($_FILES['photo_one']['tmp_name'], "./" . $target1);

//         if (resize_image("./" . $target1, $file_extension1, 150)) {
//             // continue to insert to db cuz image upload succeed.
//             $target2 = "nofile";
//             $photos = $target1 . "|" . $target2;

//             // eng table insert
//             $en_sql = "INSERT INTO en_jobs(job_id, 
//             photos, 
//             company_name, 
//             job_title, 
//             employment_type, 
//             job_type,
//             wage, 
//             overtime, 
//             holidays, 
//             working_hour, 
//             breaktime, 
//             requirements, 
//             benefits, 
//             location, 
//             memo, 
//             isavailable, 
//             created_at, 
//             updated_at) 
//             VALUES ('$job_id','$photos','$eng_company_name','$eng_job_title','$emp_arr[0]','$job_arr[0]','$eng_wage','$eng_ot','$eng_holidays','$eng_workinghr','$eng_breaktime','$eng_requirements','$eng_benefits','$eng_location','$eng_memo',$isavailable,now(), now())";
//             // echo $en_sql;
//             mysqli_query($jobs_db_conn, $en_sql);

//             // MM table insert
//             $mm_sql = "INSERT INTO mm_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour, breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) 
//             VALUES ('$job_id','$photos','$mm_company_name','$mm_job_title','$emp_arr[1]','$job_arr[1]','$mm_wage','$mm_ot','$mm_holidays','$mm_workinghr','$mm_breaktime','$mm_requirements','$mm_benefits','$mm_location','$mm_memo',$isavailable,now(), now())";
//             // echo $mm_sql;
//             mysqli_query($jobs_db_conn, $mm_sql);

//             // JP table insert
//             $jp_sql = "INSERT INTO jp_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour, breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) 
//             VALUES ('$job_id','$photos','$jp_company_name','$jp_job_title','$emp_arr[2]','$job_arr[2]','$jp_wage','$jp_ot','$jp_holidays','$jp_workinghr','$jp_breaktime','$jp_requirements','$jp_benefits','$jp_location','$jp_memo',$isavailable,now(), now())";
//             // echo $jp_sql;
//             mysqli_query($jobs_db_conn, $jp_sql);
//             header("location: ../jobs.php");
//         } else {
//             // echo "resize fail";
//             header("location: ../jobs.php");
//         }
//     }
// } else {
//     $fileinfo1 = @getimagesize($_FILES["photo_one"]["tmp_name"]);
//     $org_width1 = $fileinfo1[0];
//     $org_height1 = $fileinfo1[1];
//     $file_extension1 = pathinfo($_FILES["photo_one"]["name"], PATHINFO_EXTENSION);
//     $file1 = $_FILES['photo_one']['name'];

//     $fileinfo2 = @getimagesize($_FILES["photo_two"]["tmp_name"]);
//     $org_width2 = $fileinfo2[0];
//     $org_height2 = $fileinfo2[1];
//     $file_extension2 = pathinfo($_FILES["photo_two"]["name"], PATHINFO_EXTENSION);
//     $file2 = $_FILES['photo_two']['name'];

//     if ($org_width1 > "150" || $org_height1 > "150") {
//         if (file_exists("./companies/$job_id" . '-1.' . "$file_extension1")) unlink("./companies/$job_id" . '-1.' . "$file_extension1");
//         $target1 = "companies/" . "$job_id" . '-1.' . "$file_extension1";
//         move_uploaded_file($_FILES['photo_one']['tmp_name'], "./" . $target1);

//         if (resize_image("./" . $target1, $file_extension1, 150)) {
//             // continue to insert to db cuz image upload succeed.
//             if ($org_width2 > "150" || $org_height2 > "150") {
//                 if (file_exists("./companies/$job_id" . '-2.' . "$file_extension2")) unlink("./companies/$job_id" . '-2.' . "$file_extension2");
//                 $target2 = "companies/" . "$job_id" . '-2.' . "$file_extension2";
//                 move_uploaded_file($_FILES['photo_two']['tmp_name'], "./" . $target2);

//                 if (resize_image("./" . $target2, $file_extension2, 150)) {
//                     // continue to insert to db cuz image upload succeed.

//                     $photos = $target1 . "|" . $target2;

//                     // eng table insert
//                     $en_sql = "INSERT INTO en_jobs(job_id, 
//                     photos, 
//                     company_name, 
//                     job_title, 
//                     employment_type, 
//                     job_type,
//                     wage, 
//                     overtime, 
//                     holidays, 
//                     working_hour, 
//                     breaktime, 
//                     requirements, 
//                     benefits, 
//                     location, 
//                     memo, 
//                     isavailable, 
//                     created_at, 
//                     updated_at) 
//                     VALUES ('$job_id','$photos','$eng_company_name','$eng_job_title','$emp_arr[0]','$job_arr[0]','$eng_wage','$eng_ot','$eng_holidays','$eng_workinghr','$eng_breaktime','$eng_requirements','$eng_benefits','$eng_location','$eng_memo',$isavailable,now(), now())";
//                     // echo $en_sql;
//                     mysqli_query($jobs_db_conn, $en_sql);

//                     // MM table insert
//                     $mm_sql = "INSERT INTO mm_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour, breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) 
//                     VALUES ('$job_id','$photos','$mm_company_name','$mm_job_title','$emp_arr[1]','$job_arr[1]','$mm_wage','$mm_ot','$mm_holidays','$mm_workinghr','$mm_breaktime','$mm_requirements','$mm_benefits','$mm_location','$mm_memo',$isavailable,now(), now())";
//                     // echo $mm_sql;
//                     mysqli_query($jobs_db_conn, $mm_sql);

//                     // JP table insert
//                     $jp_sql = "INSERT INTO jp_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour, breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) 
//                     VALUES ('$job_id','$photos','$jp_company_name','$jp_job_title','$emp_arr[2]','$job_arr[2]','$jp_wage','$jp_ot','$jp_holidays','$jp_workinghr','$jp_breaktime','$jp_requirements','$jp_benefits','$jp_location','$jp_memo',$isavailable,now(), now())";
//                     // echo $jp_sql;
//                     mysqli_query($jobs_db_conn, $jp_sql);
//                     header("location: ../jobs.php");
//                 } else {
//                     // echo "resize fail";
//                     header("location: ../jobs.php");
//                 }
//             }
//         } else {
//             // echo "resize fail";
//             header("location: ../jobs.php");
//         }
//     }
// }