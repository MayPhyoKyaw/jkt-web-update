<?php
    session_start();
    include_once '../auth/authenticate.php';
    include('../auth/hashFunc.php');
    include("../confs/config.php");
    $admin_query = "SELECT * FROM admins WHERE admin_id = $adminId";
    $admin_result = mysqli_query($conn, $admin_query);
    $admin_row = mysqli_fetch_assoc($admin_result);

    if(isset($_POST['changeSubmit1'])) {
        $newAdminName = $_POST['name'];
        $password = $_POST['password'];
        $getPsd = encrypt_decrypt("decrypt", $admin_row['password']);
        $hashPswd = encrypt_decrypt("encrypt", $password);
        if($password === $getPsd) {
            $_SESSION['name'] = $newAdminName;
            $update_query = "UPDATE admins SET admin_name = '$newAdminName' WHERE password = '$hashPswd'";
            mysqli_query($conn, $update_query);
            header("location: ../setting.php");
        } else {
            $_SESSION['chgNameErr'] = "Password Wrong! Please Try Again.";
            $_SESSION['name_block_show'] = "show";
            header("location: ../setting.php");
        }
    }
?>