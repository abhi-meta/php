<?php

require('./reqClass.php');
require('../php-validation/validationCLass.php');

$uname = $_POST["uname"];
$email = $_POST["email"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$server_validate = new validation();



if(!$server_validate->addressValidation($address)) {
    echo 'Enter a valid address';
    return;
}else if(!$server_validate->validateUsername($uname)) {
    echo 'Enter a valid username';
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
}

$psswd = PASSWORD_HASH($_POST["passd"], PASSWORD_DEFAULT);

$reqOBJ = new request();

echo $reqOBJ->signup($uname,$email,$psswd,$phone,$address,$name);

?>