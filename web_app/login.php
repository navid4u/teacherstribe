<?php
// Include the config file
require_once 'config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to check if the username and password match
    $stmt = $conn->prepare('SELECT * FROM ttep_teacher WHERE username = ? AND password = ?');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $invalid = ""; 

    // If the query returned a row, the username and password are correct
    if ($result->num_rows == 1) {
        session_start();

        $_SESSION['username'] = $username;
        // Redirect to index.php and pass the username in the URL
        header('Location: index.php?username=' . $username);
        exit;
    } else {
        // Display an error message
        $error = "The username or password was wrong";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Teachers' Tribe Exclusive Portal</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/login.png&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Teachers' Tribe Exclusive Portal</h4>
                                    </div>
                                    <form method="post" action="login.php" class="user">
                                        <div class="mb-3"><input class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter your user name here..." name="username"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password"></div>
                                        <div style="color: red" id="error"><?php if (isset($error)) { echo $error; } ?></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                        <hr>
                                        <a href="http://www.teacherstribe.net" class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i></i>&nbsp; Go back to the home page</a> </a>
                                        <a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i ></i>&nbsp; Watch a demo</a>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forget">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></````