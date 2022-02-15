<?php
    session_start();
    include_once '../auth/authenticate.php';
    include('../auth/hashFunc.php');
    include("../confs/config.php");
    $admin_query = "SELECT * FROM admins WHERE admin_id = $adminId";
    $admin_result = mysqli_query($conn, $admin_query);
    $admin_row = mysqli_fetch_assoc($admin_result);

    if(isset($_POST['add_banking'])) {
        $bankName = $_POST['bankName'];
        $accName = $_POST['newAccountName'];
        $accNo = $_POST['newAccountNumber'];
        $password = $_POST['confirmPassword'];
        $getPsd = encrypt_decrypt("decrypt", $admin_row['password']);
        if($password === $getPsd) {
            $add_query = "INSERT INTO banking_info (bank_name, account_name, account_number)
                        VALUES ('$bankName', '$accName', '$accNo')";
            mysqli_query($conn, $add_query);
            // $lastInserted = $conn->insert_id;
            // echo $lastInserted;
            header("location: ../setting.php");
        } else {
            $_SESSION['addBankErr'] = "Password Wrong! Please Try Again.";
            // $_SESSION['addBank_block_show'] = 'style="display:block"';
            header("location: javascript:history.go(-1)");
        }
    }
?>