<?php
include "Admin/inc/db.php";

ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login || Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-40">
						Register
					</span>
                <div class="wrap-input100 validate-input m-b-23" data-validate="Fullname is reauired">
                    <span class="label-input100">Fullname</span>
                    <input class="input100" type="text" name="fullname" placeholder="Type your Fullname">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" placeholder="Type your username">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-23" data-validate="Email is reauired">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email" name="email" placeholder="Type your email">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Type your password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>
                <div class="wrap-input100 validate-input p-t-20" data-validate="Password is required">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100" type="password" name="rePassword" placeholder="Re-Type your password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>


                <div class="container-login100-form-btn p-t-20">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit" name="registerUser">
                            Register
                        </button>
                    </div>
                </div>


                <div class="flex-col-c p-t-15">
						<span class="txt1 p-b-17">
							Or Already have an account?
						</span>

                    <a href="login.php" class="txt2">
                        Sign In
                    </a>
                </div>
            </form>
            <?php
            if (isset($_POST['registerUser'])) {
                $fullname  = mysqli_real_escape_string($db, $_POST['fullname']);
                $username  = mysqli_real_escape_string($db, $_POST['username']);
                $email     = mysqli_real_escape_string($db, $_POST['email']);
                $password  = mysqli_real_escape_string($db, $_POST['password']);
                $rePassword = mysqli_real_escape_string($db, $_POST['rePassword']);

                if($password == $rePassword){
                    $hashedPass  = sha1($password);

                    $registerSubscriber = "INSERT INTO subscriber(sub_name	,sub_username, sub_email, sub_password,sub_status,sub_date) VALUES ('$fullname', '$username', '$email', '$hashedPass', 1, now())";
                    $registerSubscriberQuery = mysqli_query($db, $registerSubscriber);

                    if($registerSubscriberQuery){
                        header("Location: login.php?msg=registrationSuccess");
                    } else {
                        header("Location: register.php?msg=registrationNotSuccess");
                    }

                } else {
                    header("Location: register.php?msg=noMatchPass");
                }

            }

            ?>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/bootstrap/js/popper.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="assets/js/main.js"></script>
<?php ob_end_flush(); ?>
</body>
</html>