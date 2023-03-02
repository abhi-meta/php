<?php
    require('class1.php');
    require('class2.php');

    $apple1 = new test\fruit("red","apple");
    $apple1->getname();
    $apple2 = new product\fruit("red","apple");
    $apple2->getname();
?>