<!DOCTYPE html>
<html>

<head>
    <title>Simple login form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php

session_start();

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

if (isset($_SESSION['token'])) {
    if ($_SESSION['is_admin']) {
        Redirect('/myadmin.php');
    } else if ($_SESSION['validate']) {
        Redirect('/myprofile.php');
    }
}

?>


<body>



    <div class="menu">
        <h1>
            Welcome to MyADMIN
        </h1>
        <button id="login_btn">Login</button>
        <p>
            or
        </p>
        <button id="sign_up_btn">Sign-up</button>
    </div>

    <div id="sign-in">
        <form id="sign-in-2" action="php/signin.php" method="POST">
            <h1>Login Form</h1>
            <div class="formcontainer">
                <hr />
                <div class="container">
                    <label for="email"><strong>Email</strong></label><label id='wrong-email' class="d-none" for="email">
                        <pre>    Wrong Email entered</pre>
                    </label>
                    <input id='email' type="text" placeholder="Enter email" name="email" required>
                    <label for="passd"><strong>Password</strong></label><label id='wrong-pass' class="d-none"
                        for="email">
                        <pre>    Wrong Password entered</pre>
                    </label>
                    <input type="password" placeholder="Enter Password" name="passd" required>
                </div>
                <button type="submit">Login</button>
                <div class="container" style="background-color: #eee">
                <span class="psw">
                        <div><input type="checkbox" checked="checked" name="remember"> Remember me</input></div>
                        <a href="/forget-pass.php"> Forgot password?</a></span>
                </div>
            </div>
        </form>
    </div>

    <div id="sign-up" class="d-none">
        <form id="sign-up-2" action="php/signup.php" method="POST">
            <h1>Sign Up</h1>
            <div class="formcontainer">
                <hr />
                <div class="container">
                    <label for="name"><strong>Full Name</strong></label><label id='wrong-fname-2' class="d-none"
                        for="fname">
                        <pre>    Enter a valid Name</pre>
                    </label>
                    <input id='fname' type="text" placeholder="Enter Full Name" name="name" required>
                    <label for="phone"><strong>Phone no</strong></label><label id='wrong-phone-2' class="d-none"
                        for="fname">
                        <pre>    Enter a Phone No.</pre>
                    </label>
                    <input id='phone' type="text" placeholder="Enter Phone number" name="phone" required>
                    <label for="address"><strong>Address</strong></label><label id='wrong-address-2' class="d-none"
                        for="email">
                        <pre>    Enter a valid Address</pre>
                    </label>
                    <textarea id='address' placeholder="Enter address" name="address" required></textarea>
                    <label for="uname"><strong>Username</strong></label><label id='wrong-username-2' class="d-none"
                        for="email">
                        <pre>    Enter a valid Username</pre>
                    </label>
                    <input id='username' type="text" placeholder="Enter Username" name="uname" required>
                    <label for="email"><strong>Email</strong></label><label id='wrong-email-2' class="d-none"
                        for="email">
                        <pre>    Enter a valid Email</pre>
                    </label>
                    <input id='email-2' type="text" placeholder="Enter Email" name="email" required>
                    <label for="psw"><strong>Password</strong></label>
                    <input id='passwd' type="password" placeholder="Enter Password" name="passd" required>
                    <label for="c-psw"><strong>Confirm Password</strong></label><label id='wrong-pass-2' class="d-none"
                        for="email">
                        <pre>    Password does not match</pre>
                    </label>
                    <input id='c-passwd' type="password" placeholder="Confirm Password" name="c-passd" required>
                </div>
                <button type="submit">Sign-up</button>
        </form>
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
                    Thank you for sign - up Please get Yourself authorized from admin for Access
                </div>
                <div class="modal-footer">
                    <button id='modalbutton' type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="notAuth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unauthorised Access</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You are not authorized!!
                </div>
                <div class="modal-footer">
                    <button id='modalbutton' type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
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
    <script type="module" src="app.js"></script>



</body>

</html>