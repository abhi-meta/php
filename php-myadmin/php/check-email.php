<?php

require('./reqClass.php');

$reqOBJ = new request();

$email = $_POST['email'];

$result = $reqOBJ->checkEmail($email);


$result_decoded = json_decode($result);

if ($result_decoded->is_admin == 1) {
    echo 'false';
} else if($result) {
    echo 'true';
    $reqOBJ->createOTP($email);
} else {
    echo 'false';
}

?>