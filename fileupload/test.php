<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'upload.php',
            data: $('form').serialize(),
          });

        });

      });
    </script>
  </head>
  <body>
    <form>
      <input type='file' name="filename">
      <input name="submit" type="submit" value="Submit">
    </form>

    <!--  -->
  </body>
</html>

<?php
    $data =$_POST['filename'];
    echo $data."<br>";
    ?>