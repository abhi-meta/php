<?php

$sno = $_POST['sno'];

require('./reqClass.php');

$reqOBJ = new request();

echo $reqOBJ->unauthorize($sno);

?>