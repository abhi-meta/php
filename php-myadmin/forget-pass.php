<!DOCTYPE html>
<html>

<head>
    <title>Simple login form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="otp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div id="sign-in">
        <form id="reset" action="php/signin.php" method="POST">
            <h1>Reset password</h1>
            <div class="formcontainer">
                <hr />
                <div id='c-email' class="container">
                    <label for="email"><strong>Email</strong></label><label id='wrong-email' class="d-none" for="email">
                        <pre>    Wrong Email entered</pre>
                    </label>
                    <input id='email' type="text" placeholder="Enter email" name="email" required>
                    <button id='check-email' type="button">Confirm email</button>
                </div>
                <div id='otp-container' class="container d-none">
                    <div class="container height-100 d-flex justify-content-center align-items-center">
                        <div class="position-relative">
                            <div class="card p-2 text-center">
                                <h6>Please enter the one time password <br> to verify your account</h6>
                                <div> <span>A code has been sent to</span> <small>*******9897</small> </div>
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> <input
                                        class="m-2 text-center form-control rounded" type="text" id="first"
                                        maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text"
                                        id="second" maxlength="1" /> <input class="m-2 text-center form-control rounded"
                                        type="text" id="third" maxlength="1" /> <input
                                        class="m-2 text-center form-control rounded" type="text" id="fourth"
                                        maxlength="1" /> </div>
                                <div class="mt-4"> <button id='valid'
                                        class="btn btn-danger px-4 validate">Validate</button> </div>
                            </div>
                            <div class="card-2">
                                <div class="content d-flex justify-content-center align-items-center"> <span>Didn't get
                                        the code</span> <a href="#" class="text-decoration-none ms-3">Resend(1/3)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='c-pass' class="container d-none">
                    <label for="passd"><strong>Password</strong></label><label id='wrong-pass' class="d-none"
                        for="email">
                        <pre>    Wrong Password entered</pre>
                    </label>
                    <input id='passwd' type="password" placeholder="Enter Password" name="passd" required>

                    <label for="c-psw"><strong>Confirm Password</strong></label><label id='wrong-pass-2' class="d-none"
                        for="email">
                        <pre>    Password does not match</pre>
                    </label>
                    <input id='c-passwd' type="password" placeholder="Confirm Password" name="c-passd" required>
                    <button id='reset-pass' type="button">Reset password</button>

                </div>

            </div>
        </form>
    </div>
    <div class="modal fade" id="error" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Please enter the four digit OTP !
                </div>
                <div class="modal-footer">
                    <button id='cls' type="button" class="btn btn-danger" data-bs-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="error-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    OTP mismatched!
                </div>
                <div class="modal-footer">
                    <button id='cls' type="button" class="btn btn-danger" data-bs-dismiss="modal">Okay</button>
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
                <div class="modal-body">
                    Your password has been reset , You are being being redirected to your profile in <strong
                        id='timer'>5</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="reset-pass.js"></script>



</body>

</html>