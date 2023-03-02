<?php 

    require("mysql_connect.php");
    require("action.php");

    echo "<br>";

    $fname=$_POST["fname"];

    echo "{$fname}";

    $lname=$_POST["lname"];

    echo "{$lname}";

    $entry = "INSERT INTO student values('{$fname}','{$lname}')";

    try {
        $conn->query($entry);
        echo "Inserted into table succesffully";
    } catch(Exception $e){
        echo "Error in creating table : {$e}";
    }

    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    redirect("http://localhost:8040/form.php");

?>  