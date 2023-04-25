<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    body {
        overflow: hidden;
    }

    html {
        scroll-behavior: smooth;
    }

    .container-xl {
        scroll-behavior: smooth;
    }
</style>

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

    <div class="container-xl px-4 mt-4" style='overflow:auto; height:100vh'>
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
        <div class="row mt-5">
            <div class="col-xl-12">
                <!-- Account details card-->

                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Validate</th>
                                    <th scope="col">Is Admin</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                require($_SERVER['DOCUMENT_ROOT'] . '/php/reqClass.php');

                                $reqOBJ = new request();

                                try {
                                    $result = $reqOBJ->fetchUsers();

                                    if ($result) {

                                        $validate;
                                        $admin;


                                        while ($row = $result->fetch_assoc()) {
                                            if (!$row['validate']) {
                                                $validate = "<form id='idForm' action='/php/validate.php' method='POST'><button id='validate' type='button' data='{$row['sno']}' class='btn btn-success validate'>Authorise</button></form>";
                                            } else if (!$row['is_admin']) {
                                                $validate = "<form id='idForm' action='/php/validate.php' method='POST'><button  type='button' data='{$row['sno']}' class='btn btn-danger unvalidate'>Remove Authority</button></form>";
                                            } else {
                                                $validate = "<form id='idForm' action='/php/validate.php' method='POST'><button disabled  type='button' data='{$row['sno']}' class='btn btn-danger validate'>Remove Authority</button></form>";

                                            }

                                            if (!$row['is_admin']) {
                                                $admin = "No";
                                            } else {
                                                $admin = "Yes";
                                            }
                                            echo "<tr>
                                    <th scope='row'>{$row['username']}</th>
                                    <td>" . $row['email'] . "</td>" . "<td>" . $validate . "</td>
                                    <td>{$admin}</td>
                                    <td><button type='button' email='{$row['email']}' class='btn btn-success edit'>Edit</button></td>
                                    <td><button type='button' sno='{$row['sno']}' class='btn btn-danger delt '>Delete</button></td>
                                </tr>";
                                        }
                                    } else {
                                        echo "<br>Wrong Credential";
                                    }
                                } catch (Exception $e) {
                                    echo "Error in creating table : {$e}";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id='edd' class="modal-body">
                    Are you sure you want to delete this user ?
                </div>
                <div class="modal-footer">
                    <button id='modal-btn-dlt' type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="completeDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id='lor' class="modal-body">
                    User has been deleted
                </div>
                <div class="modal-footer">
                    <button id='modal-btn-cls' type="button" class="btn btn-secondary"
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

    <script>

        // const scrollRestoration = history.scrollRestoration;
        // if (history.scrollRestoration) {
        //     history.scrollRestoration = "auto";
        // }

        // let table = document.querySelector('.table');
        let container = document.querySelector('.container-xl');

        // document.addEventListener("DOMContentLoaded", function (event) {
        //     // console.log(localStorage);
        //     var scrollpos = localStorage.getItem('scrollpos');
        //     if (scrollpos) container.scrollTo(0, scrollpos);
        // });


        let email;
        $(document).ready(function () {

            // var scrollpos = localStorage.getItem('scrollpos');
            // setTimeout(() => {
            //     if (scrollpos) container.scrollTo(0, scrollpos);
            // }, 100);

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

                    var scrollpos = localStorage.getItem('scrollpos');

                    if (scrollpos) container.scrollTo(0, scrollpos);

                    localStorage.removeItem('scrollpos')

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });
        });

        $('#sign-out').click(
            function () {
                $.ajax({
                    type: "POST",
                    url: '/php/signout.php',
                    data: {}, // serializes the form's elements.
                    success: function (res) {
                        // alert(res); // show response from the php script.
                        window.location.href = '/';
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
            }
        )

        $('.edit').click(function () {

            sessionStorage.setItem('email-3', $(this).attr('email'));
            window.location.href = '/edit.php';
            localStorage.setItem('scrollpos', container.scrollTop);

        })


        $('.delt').click(function () {

            let sno = $(this).attr('sno');
            var myModal = new bootstrap.Modal(
                document.getElementById("exampleModal")
            );
            $('#modal-btn-dlt').html('Delete');
            myModal.show();

            $('#modal-btn-dlt').click(function () {
                $.ajax({
                    type: "POST",
                    url: 'php/delete.php',
                    data: { sno: sno }, // serializes the form's elements.
                    success: function () {

                        var completemyModal = new bootstrap.Modal(
                            document.getElementById("completeDelete")
                        );
                        completemyModal.show();

                        $('#modal-btn-cls').click(function () {
                            completemyModal.hide();
                            location.reload();
                        })
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
            });

        })


        $('.validate').on('click', function () {

            let data_user = $(this).attr('data');
            console.log(data_user);

            let myModal = new bootstrap.Modal(
                document.getElementById("exampleModal")
            );

            $('#edd').html('Are you sure you want to authorize this user ?');
            $('#modal-btn-dlt').html('Authorize');
            myModal.show();

            $('#modal-btn-dlt').click(function () {
                $.ajax({
                    type: "POST",
                    url: 'php/validate.php',
                    data: { sno: data_user },
                    success: function () {
                        let completemyModal = new bootstrap.Modal(
                            document.getElementById("completeDelete")
                        );

                        $('#lor').html('User has been authorize');
                        completemyModal.show();

                        $('#modal-btn-cls').click(function () {
                            completemyModal.hide();
                            location.reload();
                        })

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
            });
        });

        $('.unvalidate').on('click', function () {

            let data_user = $(this).attr('data');
            console.log(data_user);

            let myModal = new bootstrap.Modal(
                document.getElementById("exampleModal")
            );
            $('#edd').html('Are you sure you want to unauthorize this user ?');
            $('#modal-btn-dlt').html('Unauthorize');
            myModal.show();

            $('#modal-btn-dlt').click(function () {
                $.ajax({
                    type: "POST",
                    url: 'php/unvalidate.php',
                    data: { sno: data_user },
                    success: function () {
                        let completemyModal = new bootstrap.Modal(
                            document.getElementById("completeDelete")
                        );

                        $('#lor').html('User has been unauthorize');
                        completemyModal.show();

                        $('#modal-btn-cls').click(function () {
                            completemyModal.hide();
                            location.reload();
                        })
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
            });
        })

        $('#change-pass').click(function () {

            sessionStorage.setItem("email-2", email);
            window.location.href = './admin/resetpass-admin.php';
        })

    </script>
</body>

</html>