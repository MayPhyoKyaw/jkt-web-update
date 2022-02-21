<?php

include("../../jktmyanmarint.admin.com/confs/config.php");

function addNewNoti($title, $description, $type, $enrollment_id, $payment_id)
{
    global $conn;
    if ($enrollment_id) {
        $query = "INSERT INTO notifications (title, description, type, enrollment_id,seen,created_at,
            updated_at) VALUES ('$title','$description','$type',$enrollment_id,0, now(), now())";
        mysqli_query($conn, $query);
    } else if ($payment_id) {
        $query = "INSERT INTO notifications (title, description, type, payment_id,seen,created_at,
            updated_at) VALUES ('$title','$description','$type',$payment_id,0, now(), now())";
        mysqli_query($conn, $query);
    } else {
        $query = "INSERT INTO notifications (title, description, type,created_at,
            updated_at) VALUES ('$title','$description','$type',0, now(), now())";
        mysqli_query($conn, $query);
    }
}
