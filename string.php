<?php 

    $test = "Hello World";

    echo "<b>Test-word : {$test}<br></b>";

    echo "Length : ".strlen($test)."<br>";
    echo "Word Count : ".str_word_count($test)."<br>";
    echo "Reverse a String : ".strrev($test)."<br>";
    echo "Position of Wo : ".strpos($test,"Wo")."<br>";
    echo "Replace Wo with Fo : ".str_replace("Wo","Fo",$test)."<br>";
?>