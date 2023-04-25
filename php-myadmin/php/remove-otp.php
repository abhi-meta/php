<?php

require('./reqClass.php');

$reqOBJ = new request();

$email = $_POST['email'];

$result = $reqOBJ->removeOTP($email);

echo $result;

?>