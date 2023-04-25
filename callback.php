<?php

    function print_item($item) {
      echo "The final item ".$item."<br>";
    }

    $strings = ["apple", "orange", "banana", "coconut"];

    array_map("print_item", $strings);

?>