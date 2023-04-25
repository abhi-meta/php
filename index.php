

<?= "<head><style> 
    body{
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-family: monospace;
        align-items: center;
        height: 100vh;
    } </style></head>"; ?> 

<?php
    $myfile = fopen('para.txt','r');
    echo fread($myfile,filesize('para.txt'));
    fclose($myfile);
?>