<?php

$sno = $_POST['sno'];

require('./reqClass.php');

$reqOBJ = new request();

$result = $reqOBJ->delete($sno);

?>