<?php

// include('checkUser.php');

// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// header('Access-Control-Max-Age: 604800');
// header('Access-Control-Allow-Headers: x-requested-with');
// header('Content-Type: application/json'); 

include("../confs/jobs_config.php");

$job_str = substr($_POST["job_ids"], 1, -1);
$ids = explode(',', $job_str);

foreach ($ids as $id) {
    $newID = trim($id, '"');
    $en_select = "SELECT * FROM en_jobs WHERE job_id='$newID'";
    $mm_select = "SELECT * FROM mm_jobs WHERE job_id='$newID'";
    $jp_select = "SELECT * FROM jp_jobs WHERE job_id='$newID'";

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
    // $en_created_at = str_replace(' ', '', $en_result['created_at']);
    $en_created_at = $en_result['created_at'];
    $en_updated_at = $en_result['updated_at'];


    // // mm columns
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
    // $mm_created_at = str_replace(' ', '', $mm_result['created_at']);
    $mm_created_at = $mm_result['created_at'];
    $mm_updated_at = $mm_result['updated_at'];


    // // jp columns
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
    // $jp_created_at = str_replace(' ', '', $jp_result['created_at']);
    $jp_created_at = $jp_result['created_at'];
    $jp_updated_at = $jp_result['updated_at'];

    // $randHex = bin2hex($random_bytes(15));

    $search = "-copy";
    if (preg_match("/{$search}/i", $en_job_id)) {
        $originalID = explode("-", $en_job_id)[0];
    } else {
        $originalID = $en_job_id;
    }
    $updateID = $originalID . "-copy" . uniqid();
    // echo $updateID;

    $ext1 = explode(".",explode("|",$en_photos)[0])[1];
    $ext2 = explode(".",explode("|",$en_photos)[1])[1];

    $newPhotos = "companies/" . "$updateID" . '-1.' . "$ext1". "|" ."companies/" . "$updateID" . '-2.' . "$ext2";

    copy("../backend/".explode("|",$en_photos)[0], "../backend/"."companies/" . "$updateID" . '-1.' . "$ext1");
    copy("../backend/".explode("|",$en_photos)[1], "../backend/"."companies/" . "$updateID" . '-2.' . "$ext2");
    // if( !copy("../backend/".explode("|",$en_photos)[0], "../backend/"."companies/" . "$updateID" . '-1.' . "$ext1") ) { 
    //     // echo "File can't be copied! \n"; 
    // } 
    // else { 
    //     //
    // } 

    // if( !copy("../backend/".explode("|",$en_photos)[1], "../backend/"."companies/" . "$updateID" . '-2.' . "$ext2") ) { 
    //     // echo "File can't be copied! \n"; 
    // } 
    // else { 
    //     //
    // } 
    // EN table insert
    $en_sql = "INSERT INTO en_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour,  breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) VALUES ('$updateID','$newPhotos','$en_company_name','$en_job_title','$en_employment_type','$en_job_type','$en_wage','$en_overtime','$en_holidays','$en_working_hour','$en_breaktime','$en_requirements','$en_benefits','$en_location','$en_memo',$en_isavailable,'$en_created_at', now())";
    // $en_sql = "INSERT INTO en_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour, breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) VALUES ('$updateID','$newPhotos','$en_company_name','$en_job_title','$en_employment_type','$en_job_type','$en_wage','$en_overtime','$en_holidays','$en_working_hour','$en_breaktime','$en_requirements','$en_benefits','$en_location','$en_memo',$en_isavailable,'$en_created_at', now())";
    // echo $en_sql;
    mysqli_query($jobs_db_conn, $en_sql);

    // MM table insert
    $mm_sql = "INSERT INTO mm_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour, breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) VALUES ('$updateID','$newPhotos','$mm_company_name','$mm_job_title','$mm_employment_type','$mm_job_type','$mm_wage','$mm_overtime','$mm_holidays','$mm_working_hour','$mm_breaktime','$mm_requirements','$mm_benefits','$mm_location','$mm_memo',$mm_isavailable,'$mm_created_at', now())";
    // echo $mm_sql;
    mysqli_query($jobs_db_conn, $mm_sql);

    // JP table insert
    $jp_sql = "INSERT INTO jp_jobs(job_id, photos, company_name, job_title, employment_type, job_type, wage, overtime, holidays, working_hour, breaktime, requirements, benefits, location, memo, isavailable, created_at, updated_at) VALUES ('$updateID','$newPhotos','$jp_company_name','$jp_job_title','$jp_employment_type','$jp_job_type','$jp_wage','$jp_overtime','$jp_holidays','$jp_working_hour','$jp_breaktime','$jp_requirements','$jp_benefits','$jp_location','$jp_memo',$jp_isavailable,'$jp_created_at', now())";
    // echo $jp_sql;
    mysqli_query($jobs_db_conn, $jp_sql);
}

$en_select_all = "SELECT * FROM en_jobs ORDER BY updated_at DESC";
$mm_select_all = "SELECT * FROM mm_jobs ORDER BY updated_at DESC";
$jp_select_all = "SELECT * FROM jp_jobs ORDER BY updated_at DESC";

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

if (count($en_data) > 0 && count($mm_data) > 0 && count($jp_data) > 0) {
    // http_response_code(200);
    echo json_encode(array("en_data" => $en_data, "mm_data" => $mm_data, "jp_data" => $jp_data,"en_sql"=>$en_sql));
    // echo json_encode(array("en_sql"=>$en_sql));
}
