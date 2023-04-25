<?php

require('./reqClass.php');

$reqOBJ = new request();


$psswd = PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT);
$email = $_POST['email'];

echo $reqOBJ->changePassword($email,$psswd);

?>