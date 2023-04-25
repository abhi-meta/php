<?php

session_start();
if (!isset($_SESSION['token']) || !$_SESSION['validate']) {
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
    redirect("http://localhost:3000/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="myprofile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="#" target="__blank">Profile</a>
            <a class="nav-link" href="#" target="__blank">Billing</a>
            <a class="nav-link" href="#" target="__blank">Security</a>
            <a class="nav-link" href="#" target="__blank">Notifications</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2"
                            src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form id="update" action="php/update.php" method="POST">
                            <!-- Form Group (username)-->

                            <!-- Form Row-->
                            <div class="row gx-3 m-3">
                                <!-- Form Group (full name)-->

                                <div class="col-4 mb-3">
                                    <label class="small mb-1" for="inputUsername"><strong>Username</strong> </label>
                                    <input class="form-control" id="inputUsername" type="text"
                                        placeholder="Enter your username" readonly value="username">
                                </div>
                                <div class="col-4">
                                    <label class="small mb-1" for="inputFullName">First name</label>
                                    <input class="form-control" id="inputFullName" type="text"
                                        placeholder="Enter your first name" name="name" value="Valerie">
                                </div>
                                <!-- Form Group (last name)-->

                                <!-- Form Row        -->

                                <!-- Form Group (organization name)-->
                                <!-- Form Group (location)-->
                                <div class="col-4">
                                    <label class="small mb-1" for="inputLocation">Location</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" name='address' value="San Francisco, CA">
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="col-3">
                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                    <input class="form-control" id="inputEmailAddress" type="email"
                                        placeholder="Enter your email address" name='email' readonly
                                        value="name@example.com">
                                </div>
                                <!-- Form Row-->
                                <!-- Form Group (phone number)-->
                                <div class="col-3">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel"
                                        placeholder="Enter your phone number" name='phone' value="555-123-4567">
                                </div>
                            </div>

                            <!-- Save changes button-->
                            <div class='container row justify-content-evenly'>
                                <button id='save' class="col-3 btn btn-primary" disabled type="submit">Save
                                    changes</button>
                                <button type="button" id='sign-out' class=" col-3 btn btn-danger">Sign out</button>
                                <button type="button" id='change-pass' class=" col-3 btn btn-success">Change
                                    password</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Changes have been made!
                </div>
                <div class="modal-footer">
                    <button type="button" id='reload' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script type='module'>

        import validation from "./common js/validation.js";
        const validate = new validation();

        $('#sign-out').click(
            function () {
                $.ajax({
                    type: "POST",
                    url: '/php/signout.php',
                    data: {}, // serializes the form's elements.
                    success: function (res) {
                        // show response from the php script.
                        window.location.href = '/';
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
            }
        );

        let email;
        $(document).ready(function () {


            $('input').focus(function () {
                $('#save').prop("disabled", false);
            })

            console.log(sessionStorage.getItem('email'));
            email = sessionStorage.getItem('email');

            $.ajax({
                type: "POST",
                url: 'php/getperson.php',
                data: { email: email },
                success: function (data) {
                    console.log(data);
                    let user = JSON.parse(data);
                    $('#fname').attr('value', user.name);
                    $('#inputUsername').attr('value', user.username)
                    $('#inputPhone').attr('value', user.phone)
                    $('#inputFullName').attr('value', user.name)
                    $('#inputLocation').attr('value', user.address)
                    $('#inputEmailAddress').attr('value', user.email)
                    $('#phone').attr('value', user.phone);
                    $('#address').html(user.address)

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });
        });


        $("#update").submit(function (e) {

            var myModal = new bootstrap.Modal(
                document.getElementById("error")
            );

            e.preventDefault(); // avoid to execute the actual submit of the form.

            let form = $(this);
            let actionUrl = form.attr('action');
            // console.log($(form).find("#inputFullName").get(0).value);

            if (!validate.validateFullname($(form).find("#inputFullName").get(0).value)) {
                $('#error_modal_body').html('Enter a valid Name');
                myModal.show();
                $('#close').click(function () {
                    myModal.hide();
                })
                return;
            } else {
                myModal.hide();
            }

            if (!validate.validatePhone(parseInt($(form).find("#inputPhone").get(0).value))) {
                $('#error_modal_body').html('Enter a valid phone no.');
                myModal.show();
                $('#close').click(function () {
                    myModal.hide();
                })
                return;
            } else {
                myModal.hide();
            }

            if (!validate.validateAddress($(form).find("#inputLocation").get(0).value)) {
                $('#error_modal_body').html('Enter a valid address');
                myModal.show();
                $('#close').click(function () {
                    myModal.hide();
                })
                return;
            } else {
                myModal.hide();
            }

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize() + '&email=' + email, // serializes the form's elements.
                success: function (data) {
                    // alert('Changes are made'); // show response from the php script.
                    console.log(data);
                    // return;
                    var myModal = new bootstrap.Modal(
                        document.getElementById("exampleModal")
                    );
                    myModal.show();

                    $('#reload').click(function () {
                        location.reload();
                    })

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });
        });

        $('#change-pass').click(function () {

            sessionStorage.setItem("email-2", email);
            window.location.href = './reset-pass.php';
        })

    </script>
</body>

</html>