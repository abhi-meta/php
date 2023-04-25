<?php

require('./reqClass.php');

$reqOBJ = new request();

$email = $_POST['email'];

$result = $reqOBJ->checkEmailAdmin($email);

$result_decoded = json_decode($result);

if ($result_decoded->is_admin == 1) {
    $reqOBJ->createOTP($email);
    echo 'true';
} else {
    echo 'false';
}

?>