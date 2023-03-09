<!DOCTYPE html>
<html>
    <head>
        <style>
            form{
                display:flex;
                justify-content:center;
                flex-direction:column;
                max-width:300px;
            }
            form input{
                margin-top: 10px;
                margin-bottom: 10px;
            }
            form input[type=submit] {
                max-width:200px;
            }
        </style>
    </head>
<body>

<?php 

    session_start();
    // echo "message is ".$_SESSION['message'];

    // if($_SESSION['message']) {
        echo '<script>alert('.'"'.$_SESSION['message'].'"'.')</script>';
    // }
    session_reset();

?>

<form action="upload.php" method="post" id="formtoupload" name="formtoupload" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit" id="uploadbtn">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script.js"></script>
</body>
</html>

<!-- feature abhinav branch -->