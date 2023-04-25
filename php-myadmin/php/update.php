<?php

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

require('./reqClass.php');
require('../php-validation/validationCLass.php');

$server_validate = new validation();

if(!$server_validate->addressValidation($address)) {
    echo 'Enter a valid address';
    return;
}else if(!$server_validate->validatePhone($phone)) {
    echo 'Enter a valid phone no.';
    return;
}else if(!$server_validate->validateFullname($name)){
    echo 'Enter a valid Name';
    return;
}else if(!$server_validate->emailValidation($email)) {
    echo 'Enter a valid Email';
    return;
}else if(!$server_validate->userValidation($email)) {
    echo 'Invalid User';
    return;
}

$reqOBJ = new request();

echo $reqOBJ->update($name,$phone,$address,$email);

?>