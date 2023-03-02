<?php 
    $array = ["Peter"=>"35", "Ben"=>"37", "Joe"=>"43"];
    function print_array($array){
        foreach($array as $key=>$value){
            echo "{$key} : {$value}, ";
        }
        echo "<br>";
    }

    echo ("<b>Array : ");
    print_array($array); 
    echo("</b>");  
    asort($array);
    echo ("Sorted array acc. value : ");
    print_array($array);    
    ksort($array);
    echo ("Sorted array acc. key : ");
    print_array($array);
    krsort($array);
    echo("Reverse Sorted array acc. key : ");
    print_array($array);
    arsort($array);
    echo("Reverse Sorted array acc. value : ");
    print_array($array);
?>