<?php
require('./reqClass.php');

$reqOBJ = new request();

$psswd = $_POST["pass"];
$email = $_POST['email'];

$result = $reqOBJ->checkPass($email);

$result_decoded = json_decode($result);

// echo $result_decoded;

if ($result_decoded->is_admin != 1) {
    if (password_verify($psswd, $result_decoded->password)) {
        echo 'true';
    }else {
        echo 'false';
    }
} else {
    echo 'false';
}

?>