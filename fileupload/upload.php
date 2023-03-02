<?php 

    session_start();

    if($_FILES['fileToUpload']['size'] != 0) {

        echo "{$_FILES['fileToUpload']['size']}";

        // echo mime_content_type($_FILES['fileToUpload']['tmp_name']);

        $fileName = $_FILES['fileToUpload']['name'];
        $ext = mime_content_type($_FILES['fileToUpload']['tmp_name']);

        echo $ext;
        $array_ext = ['image/png','image/jpeg','image/jpg','image/gif','application/pdf'];
        $array_ext_2 = ['png','jpg','jpeg','pdf','gif'];

        $ext_2 = substr(strrchr($fileName, '.'), 1);

        if(in_array($ext,$array_ext) && in_array($ext_2,$array_ext_2)) {
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
            redirect("http://localhost:8040/fileupload/form-file.php");
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