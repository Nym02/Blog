<?php
include "Admin/inc/db.php";
session_start();
ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration || Blog</title>
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
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
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
					<span class="login100-form-title p-b-49">
						Login
					</span>

                <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" placeholder="Type your username">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Type your password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a href="#">
                        Forgot password?
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" name="login" type="submit" id="login">
                            Login
                        </button>

                    </div>
                </div>


                <?php
                if (isset($_POST['login'])) {

                    $username = mysqli_real_escape_string($db, $_POST['username']);
                    $password = mysqli_real_escape_string($db, $_POST['password']);

                    $loginHashedPassword = sha1($password);


                    //fetching login information for user from the database
                    $loginInfo = "SELECT * FROM subscriber WHERE sub_username = '$username'";
                    $loginInfoQuery = mysqli_query($db, $loginInfo);


                    while ($row = mysqli_fetch_array($loginInfoQuery)) {
                        $_SESSION['sub_id'] = $row['sub_id'];
                        $_SESSION['sub_name'] = $row['sub_name'];
                        $_SESSION['sub_username'] = $row['sub_username'];
                        $_SESSION['sub_email'] = $row['sub_email'];
                        $_SESSION['sub_password'] = $row['sub_password'];
                        $_SESSION['sub_status'] = $row['sub_status'];
                        $_SESSION['sub_image'] = $row['sub_image'];

                    }

                    if (empty($username) && !empty($password)) {

                        header("Location: login.php?msg=emptyUsername"); ?>

                    <?php } else if (!empty($username) && empty($password)) {
                        header("Location: login.php?msg=emptyPassword");
                    } else if (empty($username) && empty($password)) {
                        header("Location: login.php?msg=usernamePassEmpty");
                    } else if ($username == $_SESSION['sub_username'] && $loginHashedPassword == $_SESSION['sub_password'] && $_SESSION['sub_status'] == 1) {

                            if (isset($_GET['post'])) {
                            $postID = $_GET['post']; ?>

                            <?php  header("Location: single.php?post=$postID&msg=loginSuccess");
                            } else {
                            ?>

                            <?php
                            header("Location: index.php?msg=loginSuccess");
                            }




                    } else if ($username == $_SESSION['sub_username'] && $loginHashedPassword == $_SESSION['sub_password'] && $_SESSION['sub_status'] == 0) {
                        header("Location: login.php?msg=inactiveUser");
                    } else if ($username == $_SESSION['sub_username'] && $loginHashedPassword != $_SESSION['sub_password']) {
                        header("Location: login.php?msg=usernamePassDoNotMatch");
                    }

                }

                ?>
                <div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
                </div>


                <div class="flex-c-m">
                    <a href="#" class="login100-social-item bg1">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="login100-social-item bg2">
                        <i class="fa fa-twitter"></i>
                    </a>

                    <a href="#" class="login100-social-item bg3">
                        <i class="fa fa-google"></i>
                    </a>
                </div>

                <div class="flex-col-c p-t-15">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>
                    <?php
                    if (isset($_GET['post'])) {
                        $postid = $_GET['post'];
                        ?>

                        <a href="register.php?post=<?php echo $postid; ?>" class="txt2">
                            Sign Up
                        </a>
                    <?php } else { ?>
                        <a href="register.php" class="txt2">
                            Sign Up
                        </a>
                    <?php }


                    ?>

                </div>
            </form>

        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    <?php
    if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    if($msg == 'emptyUsername'){  ?>
    toastr.error("Your Username is empty.");
    <?php     } else if ($msg == 'emptyPassword') { ?>
    toastr.error("Your Password is empty.");
    <?php  } else if ($msg == 'usernamePassEmpty') { ?>
    toastr.error("Your Username & Password is empty.");
    <?php  } else if ($msg == 'inactiveUser') { ?>
    toastr.error("Your are an in-active member. Please contact ADMIN");
    <?php   } else if ($msg == 'usernamePassDoNotMatch') { ?>
    toastr.error("Username & Password do not match");
    <?php    }

    }

    ?>




</script>
<?php ob_end_flush(); ?>
</body>
</html>