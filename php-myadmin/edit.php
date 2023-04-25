<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php

session_start();
if (!isset($_SESSION['token']) || !$_SESSION['is_admin']) {
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
    redirect("http://localhost:3000/index.php");
}
?>

<body>
    <div id="sign-up">
        <form id="update" action="php/update.php" method="POST">
            <h1>Edit Detail</h1>
            <div class="formcontainer">
                <hr />
                <div class="container">
                    <label for="name"><strong>Full Name</strong></label>
                    <input id='fname' type="text" placeholder="Enter Full Name" name="name" required>
                    <label for="phone"><strong>Phone no</strong></label>
                    <input id='phone' type="text" placeholder="Enter Phone number" name="phone" required>
                    <label for="address"><strong>Address</strong></label>
                    <textarea id='address' placeholder="Enter address" name="address" required></textarea>
                </div>
                <button type="submit">Update</button>
        </form>
        <div class="container" style="background-color: #eee">
            <span class="psw"><a href="/reset-pass.php"> Change password</a></span>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Changes have been made
                </div>
                <div class="modal-footer">
                    <button id='done' type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="error" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id='error_modal_body' class="modal-body">
                    Changes have been made!
                </div>
                <div class="modal-footer">
                    <button type="button" id='close' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="serverError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Internal server Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Something went wrong!!
                </div>
                <div class="modal-footer">
                    <button id='modalbutton' type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script type="module">
        import validation from "./common js/validation.js";
        let email;
        let validate = new validation();
        var myErrorModal = new bootstrap.Modal(
            document.getElementById("error")
        );
        $(document).ready(function () {
            // console.log(sessionStorage.getItem('email'));
            email = sessionStorage.getItem('email-3');

            sessionStorage.removeItem('email-3');

            if (!email) {
                window.location.href = 'myadmin.php';
            }

            $.ajax({
                type: "POST",
                url: 'php/getperson.php',
                data: { email: email }, // serializes the form's elements.
                success: function (data) {
                    // console.log(data);
                    let user = JSON.parse(data); // show response from the php script.
                    // window.location.href = 'php/getperson.php';
                    $('#fname').attr('value', user.name);
                    $('#phone').attr('value', user.phone);
                    $('#address').html(user.address)
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });
        });


        $("#update").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            if (!validate.validateFullname($(form).find("#fname").get(0).value)) {
                $('#error_modal_body').html('Enter a valid Name');
                myErrorModal.show();
                $('#close').click(function () {
                    myErrorModal.hide();
                })
                return;
            } else {
                myErrorModal.hide();
            }

            if (!validate.validatePhone(parseInt($(form).find("#phone").get(0).value))) {
                $('#error_modal_body').html('Enter a valid phone no.');
                myErrorModal.show();
                $('#close').click(function () {
                    myErrorModal.hide();
                })
                return;
            } else {
                myErrorModal.hide();
            }

            if (!validate.validateAddress($(form).find("#address").get(0).value)) {
                $('#error_modal_body').html('Enter a valid address');
                myErrorModal.show();
                $('#close').click(function () {
                    myErrorModal.hide();
                })
                return;
            } else {
                myErrorModal.hide();
            }

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize() + '&email=' + email, // serializes the form's elements.
                success: function (data) {

                    if (data == 'Enter a valid address' || data == 'Enter a valid phone no.' || data == 'Enter a valid Name' || data == 'Enter a valid Email' || data == 'Enter a valid username') {
                        let serverModal = new bootstrap.Modal(
                            document.getElementById("serverError")
                        );
                        serverModal.show();
                    }
                    console.log(data);
                    let myModal = new bootstrap.Modal(
                        document.getElementById("exampleModal")
                    );
                    myModal.show(); // show response from the php script.
                    $('#done').click(function () {
                        window.location.href = '/myadmin.php';
                    })
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });
        });

    </script>

</body>

</html>