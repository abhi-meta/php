<?php

require('./reqClass.php');

$reqOBJ = new request();

$email = $_POST["email"];

$psswd = $_POST["passd"];

$reqOBJ->signin($email, $psswd);


?>