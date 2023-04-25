<?php

require('./reqClass.php');

$reqOBJ = new request();

echo $reqOBJ->fetchUsers();
?>