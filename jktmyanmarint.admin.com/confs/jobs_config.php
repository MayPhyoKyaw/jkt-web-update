<?php
    $dbhost = "127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "jobs_db";
    $jobs_db_conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($jobs_db_conn, $dbname);
?>