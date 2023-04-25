<?php

$email = $_POST['email'];

require('./reqClass.php');

$reqOBJ = new request();

echo $reqOBJ->getPerson($email);

?>