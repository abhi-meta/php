<!DOCTYPE html>
<html>

<head>
    <title>Simple login form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
            <div id='p-pass' class='d-block' style='margin:50px;'>
            <label for="c-psw"><strong>Previous Password</strong></label><label id='prev-pass-2' class="d-none"
                    for="email">
                    <pre>    Password does not match</pre>
                </label>
                <input id='p-passwd' type="password" placeholder="Previous Password" name="p-passd" required>
                <button id='confirm-pass' type="button">Confirm password</button>
            </div>

            <div id='c-pass' class="container d-none">
                <label for="passd"><strong>Password</strong></label><label id='wrong-pass' class="d-none" for="email">
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
                    Wrong password Entered !!
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
                    <button id='pass-change' type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="reset.js"></script>

</body>

</html>