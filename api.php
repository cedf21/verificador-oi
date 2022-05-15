<?php

if(isset($_POST['tel'])){
    $telefone =$_POST['tel'];
    $ch = curl_init();
    $timeout = 5; // set to zero for no timeout
    curl_setopt ($ch, CURLOPT_URL, 'https://srv1mcreprd.oi.com.br/services/sms/generateToken/');
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,"{\"msisdn\":\"$telefone\"}");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
    $headers = [
        'Content-Type: application/json',
        'X-MIP-ACCESS-TOKEN: 266534747b4b457e3e4b256829477878ac8d',
        'X-MIP-APP-VERSION: 1.0',
        'X-MIP-APP-VERSION-ID: 1',
        'X-MIP-CHANNEL: WEBAPP',
        'X-MIP-DEVICE-ID: 1',
    ];
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $file_contents = curl_exec($ch);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
    }
    curl_close($ch);
    
    if (isset($error_msg)) {
        echo $error_msg;
    }else{
        echo ($file_contents);
    }
    
}
