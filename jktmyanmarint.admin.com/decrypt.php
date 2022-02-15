<?php
    header('Content-Type: application/json');
    include('auth/hashFunc.php');
    $encryptedText = $_POST['encryptedId'];
    $decryptedText = encrypt_decrypt("decrypt", $encryptedText);
    echo $decryptedText;
?>