<?php
    session_start();
    include_once '../auth/authenticate.php';
    include('../auth/hashFunc.php');
    include("../confs/config.php");
    $admin_query = "SELECT * FROM admins WHERE admin_id = $adminId";
    $admin_result = mysqli_query($conn, $admin_query);
    $admin_row = mysqli_fetch_assoc($admin_result);

    if(isset($_POST['deleteBankConfirm'])) {
        $bankAccount = $_POST['bankAccount'];
        $password = $_POST['password'];
        $getPsd = encrypt_decrypt("decrypt", $admin_row['password']);
        if($password === $getPsd) {
            $del_query = "DELETE FROM banking_info WHERE account_number=$bankAccount";
            mysqli_query($conn, $del_query);
            header("location: ../setting.php");
        } else {
            $_SESSION['delBankErr'] = "Password Wrong! Please Try Again.";
            header("location: javascript:history.go(-1)");
        }
    }
?>