<?php
    include 'connect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
        include 'includes/login.php';
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["regis_username"]) && isset($_POST["regis_pass"])) {
        include 'includes/register.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/about_us.css">
    <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/validate.js" defer></script>
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>
    <title>WheelDeal Login</title>
</head>
<body>
    <div class="main-container container ">
        <div class="login-container" id="login-cotainer">
            <div class="input shadow-lg p-3 mb-5 bg-body rounded">    
                <form method="post" id="login_form">
                    <div class="mt-2">
                        <div class="form-floating username">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" >
                            <label for="username" class="form-label">Username</label>
                        </div >
                        <div class="password-container form-floating password">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                            <button class="mt-2 m-2 btn" id="show_pass">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                </svg>                          
                            </button>
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <p id="error_login" class="text-danger"></p>
                    </div>
                    <div class="buttons d-grid pb-1 mb-2">
                        <button id="login" type="submit" class="btn btn-dark">Log in</button>
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="register-btn d-grid gap-2">
                        <button id="register" type="button" class="btn btn-lg mt-3 mb-2">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="register-container shadow p-3 rounded align-self-center" id="register_page">
            <div class="registration-form mt-5">
                <form method="POST" onsubmit="return validateForm(event)">
                    <div class="register-input-container input shadow p-3 mb-5 bg-body rounded">
                        <div class=" mb-3 d-grid gap-2">
                            <div class="close-btn-container"><button id="close_regis" class="btn-close"></button></div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="regis_firstname" id="regis_first_name" placeholder="First name" >
                                <label for="regis_first_name" class="form-label">First name</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="regis_lastname" id="regis_last_name" placeholder="Last name" >
                                <label for="regis_last_name" class="form-label">Last name</label>
                            </div>
                            <div class="form-floating mb-3">
                            <select class="form-select" name="regis_gender" aria-label="Default select example">
                                <option value ="" selected>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control" name="regis_email" id="regis_email" placeholder="Email" >
                                <label for="regis_email" class="form-label">Email</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="regis_username" id="regis_user_name" placeholder="Username" >
                                <label for="regis_user_name" class="form-label">Username</label>
                            </div>
                            <div class="form-floating">
                                <div class="form-check">
                                    <input class="form-check-input" name="is_admin" type="checkbox" value="1" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Admin
                                    </label>
                                </div>
                            </div>
                            <div class="password-container form-floating">
                                <input type="password" class="form-control" name="regis_pass" id="regis_pass" placeholder="New password" >
                                <button class="mt-2 btn" id="show_regis_pass">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>                          
                                </button>
                                <label for="regis_pass" class="form-label">New password</label>
                            </div>
                            <div class="password-container form-floating">
                                <input type="password" class="form-control" name="regis_pass_conf" id="regis_pass_conf" placeholder="Confirm new password" >
                                <button class="mt-2 btn btn_2" id="show_regis_pass_2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>                          
                                </button>
                                <label for="regis_pass" class="form-label">Confirm new password</label>
                            </div>
                            <div class="confirm text-danger" id="error_message"></div>
                            <div class="register-btn d-grid gap-2 mb-2">
                                <button id="submit_registration" class="sbm btn btn-lg" type="submit">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer mt-5">
        <div class="footer-container p-2">
            Lauron
        </div>
    </footer>
</body>
</html>