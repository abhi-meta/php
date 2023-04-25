<?php 
    $array = [1,4,2,5,67,3,1];
    function print_array($array){
        foreach($array as $ele){
            echo "{$ele} ";
        }
        echo "<br>";
    }

    echo ("Array : ");
    print_array($array);   
    sort($array);
    echo ("Sorted array : ");
    print_array($array);    
    rsort($array);
    echo ("Reverse Sorted array : ");
    print_array($array);  

    //this is masteriuewbfibweiufbuwievbiuebviuebvi
    

?>