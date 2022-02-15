<?php
    function encrypt_decrypt($action, $string) {
        /* =================================================
        * ENCRYPTION-DECRYPTION
        * =================================================
        * ENCRYPTION: encrypt_decrypt('encrypt', $string);
        * DECRYPTION: encrypt_decrypt('decrypt', $string) ;
        */
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'JKT-2019-20IT85-MM-JP';
        $secret_iv = 'JKT-2019-serV1ce-MM-JP';
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } else {
            if ($action == 'decrypt') {
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }
        }
        return $output;
    }
?>