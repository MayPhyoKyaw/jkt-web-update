<?php 
    if(isset($_COOKIE['adminName'])){
        $adminName = $_COOKIE['adminName'];
        header("location: ./index.php");
    } 
    
    if(isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
        $adminId = $_SESSION['adminId'];
    } else {
        header("location: ./login.php");
    }
?>