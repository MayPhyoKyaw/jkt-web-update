<?php

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$imageError = "";
$image = check_input($_POST["image"]);
$allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
$ext = pathinfo($image, PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) {
    $imageError = "jpeg / jpg / png";
}
