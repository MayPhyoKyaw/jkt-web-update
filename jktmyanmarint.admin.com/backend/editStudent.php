<?php

// db config
include("../confs/config.php");

// for mail
// include("../mail/sendMail.php");

// STEP 1 
$studentId = intval($_POST['studentId']);
$photo = $_FILES['photo'];
$oldPhoto = $_POST['notChangeImg'];
$uname = $_POST['uname'];
$dob = $_POST['dob'];
$fname = $_POST['fname'];
$nrcCode = $_POST['nrcCode'];
$township = $_POST['township'];
$type = $_POST['type'];
$nrcNumber = $_POST['nrcNumber'];
$nrc = $nrcCode . "/" . $township . $type . $nrcNumber;
$email = isset($_POST['email']) ? $_POST['email'] : "";
$address = $_POST['address'];
$phone = $_POST['phone'];
$education = $_POST['education'];
$created_at = $_POST["createdAt"];

// echo (
//     $studentId.",".
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
//     $created_at
// );

function UnlinkFile($nrc)
{
    if (file_exists("../../jktmyanmarint.com/backend/uploads/$nrc.png")) unlink("../../jktmyanmarint.com/backend/uploads/$nrc.png");
    if (file_exists("../../jktmyanmarint.com/backend/uploads/$nrc.PNG")) unlink("../../jktmyanmarint.com/backend/uploads/$nrc.PNG");
    if (file_exists("../../jktmyanmarint.com/backend/uploads/$nrc.jpg")) unlink("../../jktmyanmarint.com/backend/uploads/$nrc.jpg");
    if (file_exists("../../jktmyanmarint.com/backend/uploads/$nrc.JPG")) unlink("../../jktmyanmarint.com/backend/uploads/$nrc.JPG");
    if (file_exists("../../jktmyanmarint.com/backend/uploads/$nrc.jpeg")) unlink("../../jktmyanmarint.com/backend/uploads/$nrc.jpeg");
    if (file_exists("../../jktmyanmarint.com/backend/uploads/$nrc.JPEG")) unlink("../../jktmyanmarint.com/backend/uploads/$nrc.JPEG");
}

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

if (file_exists($_FILES['photo']['tmp_name'])) {
    // Get Image Dimension
    echo "file uploaded";
    $fileinfo = @getimagesize($_FILES["photo"]["tmp_name"]);
    $org_width = $fileinfo[0];
    $org_height = $fileinfo[1];


    $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $file = $_FILES['photo']['name'];

    if ($org_width > "300" || $org_height > "300") {
        UnlinkFile($nrcNumber);
        $target = "uploads/" . "$nrcNumber.$file_extension";
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../jktmyanmarint.com/backend/" . $target);

        if (resize_image($target, $file_extension, 300)) {
            // continue to insert to db cuz image upload succeed.
            $update_to_students = "UPDATE students SET 
                student_name='$uname', 
                dob='$dob', 
                fname='$fname', 
                nrc='$nrc', 
                email='$email', 
                phone='$phone', 
                photo='$target',
                education='$education', 
                address='$address'
                WHERE student_id = $student_id";

            echo $update_to_students;
            mysqli_query($conn, $update_to_students);
            header("location: ../students.php");
        } else {
            // $response = array(
            //     "type" => "error",
            //     "message" => "Problem in uploading image files.",
            //     "data" => $_POST,
            // );
            echo "resize failed";
            header("location: ../students.php");
        }
    } else {
        UnlinkFile($nrcNumber);
        $target = "uploads/" . "$nrcNumber.$file_extension";
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../../jktmyanmarint.com/backend/" . $target)) {
            // continue to insert to db cuz image upload succeed.
            $update_to_students = "UPDATE students SET
                student_name='$uname', 
                dob='$dob', 
                fname='$fname', 
                nrc='$nrc', 
                email='$email', 
                phone='$phone', 
                education='$education', 
                address='$address', 
                photo='$target',
                created_at='$created_at',
                updated_at=now()
                WHERE student_id = $studentId";

            echo $update_to_students;
            mysqli_query($conn, $update_to_students);
            header("location: ../students.php");
        } else {
            // $response = array(
            //     "type" => "error",
            //     "message" => "Problem in uploading image files.",
            //     "data" => $_POST,
            // );
            echo "problem uploading file";
            header("location: ../students.php");
        }
    }
    // header("location: ../students.php");
} else {
    $src = $_POST["notChangeImg"];
    $update_to_students = "UPDATE students SET 
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
                WHERE student_id = $studentId";
    mysqli_query($conn, $update_to_students);
    header("location: ../students.php");
}
mysqli_close($conn);
