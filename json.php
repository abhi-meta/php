<?php 

    $strings = ["apple", "orange", "banana", "coconut"];
    
    $json_file = json_encode($strings);
    
    echo $json_file."<br>";

    print_r(json_decode($json_file));
?>