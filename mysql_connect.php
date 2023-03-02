<?php 
    $username = "root";
    $password = "passwd";
    $servername = "localhost";

    $conn = new mysqli($servername,$username,$password);

    if($conn->connect_error) {
        echo "error in mysql connection<br>";
    } else {
        echo "successfully connected<br>";
    }
?>