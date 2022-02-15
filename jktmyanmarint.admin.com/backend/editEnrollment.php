<?php

// db config
include("../confs/config.php");

// for mail
include("../mail/sendMail.php");

// STEP 1 
// $photo = $_FILES['photo'];
$enrollmentId = $_POST["enrollmentId"];
// $uname = $_POST['uname'];
// $dob = $_POST['dob'];
// $fname = $_POST['fname'];
// $nrcCode = $_POST['nrcCode'];
// $township = $_POST['township'];
// $type = $_POST['type'];
// $nrcNumber = $_POST['nrcNumber'];
// $nrc = $nrcCode . "/" . $township . $type . $nrcNumber;
// $email = isset($_POST['email']) ? $_POST['email'] : "";
// $address = $_POST['address'];
// $phone = $_POST['phone'];
// $education = $_POST['education'];

$courseId = intval($_POST['classId']);
// $classTime = $_POST['classTime'];

// STEP 3
$payment_method = $_POST['paymentMethod'];
$paidPercent = intval($_POST['paidPercent']);
if (isset($_POST['newPaymentField'])) {
    $newPaymentField = intval($_POST['newPaymentField']);
}else {
    $newPaymentField = 0;
}

$getPaymentAmount = "SELECT fee from courses WHERE course_id = $courseId";
$result = mysqli_query($conn, $getPaymentAmount);
$result_row = mysqli_fetch_assoc($result);

$paidAmount = (intval($result_row['fee']) * $paidPercent)/100;
$newPaidPercent = intval((($paidAmount+$newPaymentField)/intval($result_row['fee']))*100);
// echo "Course fee is" . $result_row['fee'];
// echo "Paid amount is" . $paidAmount;
// echo "New paid amount is" . $newPaymentField;
// echo "total paid percent is" . $newPaidPercent;

$created_at = $_POST["createdAt"];

if (isset($_POST['isPending']) && $_POST["isPending"] == "on") {
    $isPending = 0;
} else {
    $isPending = 1;
}

$update_to_enrollments = "UPDATE enrollments SET 
            course_id=$courseId, 
            payment_method='$payment_method',
            paid_percent=$newPaidPercent ,
            created_at='$created_at',
            updated_at=now(),
            is_pending=$isPending
            WHERE enrollment_id = $enrollmentId";

mysqli_query($conn, $update_to_enrollments);
header("location: ../enrollments.php");
// echo (
//     $enrollmentId.",".
//     $courseId .",".
//     $uname .",".
//     $dob .",".  
//     $fname .",".
//     $nrcCode .",".
//     $township .",".
//     $type .",".
//     $nrcNumber .",".
//     $email .",".
//     $phone .",".
//     $education .",".
//     $payment_method. ",".
//     $paidPercent.",".
//     $isPending.",".
//     $created_at
// );

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


// if ($photo["size"] > 0) {
//     // Get Image Dimension
//     $fileinfo = @getimagesize($_FILES["photo"]["tmp_name"]);
//     $org_width = $fileinfo[0];
//     $org_height = $fileinfo[1];


//     $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
//     $file = $_FILES['photo']['name'];

//     if ($org_width > "300" || $org_height > "300") {
//         if (file_exists("../../user/backend/uploads/$nrcNumber.$file_extension")) unlink("../../user/backend/uploads/$nrcNumber.$file_extension");
//         $target = "uploads/" . "$nrcNumber.$file_extension";
//         move_uploaded_file($_FILES['photo']['tmp_name'], "../../user/backend/" . $target);

//         if (resize_image($target, $file_extension, 300)) {
//             // continue to insert to db cuz image upload succeed.
//             $update_to_enrollments = "UPDATE enrollments SET 
//             course_id=$courseId,
//             uname='$uname', 
//             dob='$dob', 
//             fname='$fname', 
//             nrc='$nrc', 
//             email='$email', 
//             education='$education', 
//             address='$address', 
//             phone='$phone', 
//             payment_method='$payment_method',
//             paid_percent=$paidPercent ,
//             photo='$target',
//             created_at='$created_at',
//             updated_at=now(),
//             is_pending=$isPending
//             WHERE enrollment_id = $enrollmentId";

//             mysqli_query($conn, $update_to_enrollments);
//             header("location: ../frontend/enrollments.php");
//         } else {
//             // $response = array(
//             //     "type" => "error",
//             //     "message" => "Problem in uploading image files.",
//             //     "data" => $_POST,
//             // );
//         }
//     } else {
//         if (file_exists("../../user/backend/uploads/$nrcNumber.$file_extension")) unlink("../../user/backend/uploads/$nrcNumber.$file_extension");
//         $target = "uploads/" . "$nrcNumber.$file_extension";
//         if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../../user/backend/" . $target)) {
//             // continue to insert to db cuz image upload succeed.
//             $update_to_enrollments = "UPDATE enrollments SET 
//             course_id=$courseId,
//             uname='$uname', 
//             dob='$dob', 
//             fname='$fname', 
//             nrc='$nrc', 
//             email='$email', 
//             education='$education', 
//             address='$address', 
//             phone='$phone', 
//             payment_method='$payment_method',
//             paid_percent=$paidPercent ,
//             photo='$target',
//             created_at='$created_at',
//             updated_at=now(),
//             is_pending=$isPending
//             WHERE enrollment_id = $enrollmentId";

//             mysqli_query($conn, $update_to_enrollments);
//             header("location: ../frontend/enrollments.php");
//         } else {
//             // $response = array(
//             //     "type" => "error",
//             //     "message" => "Problem in uploading image files.",
//             //     "data" => $_POST,
//             // );
//         }
//     }
//     header("location: ../frontend/enrollments.php");
// } else {
//     $src = $_POST["notChangeImg"];
//     $update_to_enrollments = "UPDATE enrollments SET 
//             course_id=$courseId,
//             uname='$uname', 
//             dob='$dob', 
//             fname='$fname', 
//             nrc='$nrc', 
//             email='$email', 
//             education='$education', 
//             address='$address', 
//             phone='$phone', 
//             payment_method='$payment_method',
//             paid_percent=$paidPercent ,
//             photo='$src',
//             created_at='$created_at',
//             updated_at=now(),
//             is_pending=$isPending
//             WHERE enrollment_id = $enrollmentId";

//     mysqli_query($conn, $update_to_enrollments);
//     header("location: ../frontend/enrollments.php");
// }

mysqli_close($conn);
