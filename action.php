<?php 
    $sql = "CREATE DATABASE myDB";

    $checkdb = "SHOW DATABASES LIKE 'myDB'";

    if ($conn->query($checkdb)) {
        echo "Database already created <br>";
    } else {

        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully<br>";
        } else {
            echo "Error creating database: " ;
        }
    }

    $sql = "use myDB";

    try {
        $conn->query($sql);
        echo "Database is in use<br>"; 
    } catch(Exception $e){
        echo "Error in using database: {$e}" ;
    }

    $createtable = "CREATE TABLE student(First_name varchar(50), Last_name varchar(50));";

    try {
        $conn->query($createtable);
        echo "Created table succesffully";
    } catch(Exception $e){
        echo "Error in creating table : {$e}";
    }
?>