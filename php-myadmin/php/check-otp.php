<?php

require('./reqClass.php');

$reqOBJ = new request();

$email = $_POST['email'];
$otp = $_POST['otp'];

$result = $reqOBJ->checkOTP($email);

$result_decoded = json_decode($result);

// echo $result;

if($result_decoded->otp == $otp) {
    echo 'true';
} else {
    echo 'false';
}

?>