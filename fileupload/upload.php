<?php 

    session_start();

    if($_FILES['fileToUpload']['size'] != 0) {

        echo "{$_FILES['fileToUpload']['size']}";

        // echo mime_content_type($_FILES['fileToUpload']['tmp_name']);

        $fileName = $_FILES['fileToUpload']['name'];
        $mime = mime_content_type($_FILES['fileToUpload']['tmp_name']);

        
        // $array_ext = ['image/png','image/jpeg','image/jpg','image/gif','application/pdf'];
        // $array_ext_2 = ['png','jpg','jpeg','pdf','gif'];
        
        $array1 = ['image/png'=>'png','image/jpeg'=>'jpeg','image/jpg'=>'jpg','image/gif'=>'gif','application/pdf'=>'pdf'];

        $ext = substr(strrchr($fileName, '.'), 1);

        if($array1[$mime] == $ext) {
            echo "exist";
            $image = file_get_contents($_FILES['fileToUpload']['tmp_name']);
            file_put_contents('/var/www/html/PHP/fileupload/uploads/'.$_FILES['fileToUpload']['name'], $image);
        }else{
            $_SESSION['message'] = "Enter a valid file";
            function redirect($url, $statusCode = 303)
            {
                header('Location: ' . $url, true, $statusCode);
                die();
            }
            redirect("http://localhost:4000/fileupload/form-file.php");
            echo $array1[$mime]." ".$mime;
        }
    }else{
        $_SESSION['message'] = "Enter a valid file";
        function redirect($url, $statusCode = 303)
        {
            header('Location: ' . $url, true, $statusCode);
            die();
        }
        redirect("http://localhost:8040/fileupload/form-file.php");
        // echo "file not found";
    }
?>