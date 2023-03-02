<?php 

    session_start();

    echo $_SESSION['message'];

    session_destroy();

    echo "I changed a code";
    

?>