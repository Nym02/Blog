<?php
ob_start();
session_start();
include("inc/db.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>


            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <input type="submit" value="Login" name="login" class="btn btn-primary btn-block">
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <?php

            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];


                if ($msg == 'emptyEmailPass') { ?>
                    <div class="alert alert-danger mt-3"> Your Email & Password is empty.</div>
                <?php } else if ($msg == 'emptyEmail') {
                    echo '<div class="alert alert-danger mt-3"> Your Email is empty. </div>';
                } else if ($msg == 'emptyPass') {
                    echo '<div class="alert alert-danger mt-3"> Your Password is empty. </div>';
                } else if ($msg == 'emailPassDoesNotMatch') {
                    echo '<div class="alert alert-danger mt-3"> Your Email & Password do not match. </div>';
                }
            }


            ?>
            <?php
            if (isset($_POST['login'])) {
                $email = mysqli_real_escape_string($db, $_POST['email']);
                $password = mysqli_real_escape_string($db, $_POST['password']);


                $hashedPass = sha1($password);


                $loginQuery = "SELECT * from users where email = '$email'";
                $authUser = mysqli_query($db, $loginQuery);


                while ($row = mysqli_fetch_array($authUser)) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['full_name'] = $row['full_name'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['status'] = $row['status'];
                    $_SESSION['image'] = $row['image'];
                    $_SESSION['join_date'] = $row['join_date'];


                }
                if (empty($email) && !empty($password)) {
                    header("Location: index.php?msg=emptyEmail");

                } else if (!empty($email) && empty($password)) {
                    header("Location: index.php?msg=emptyPass");
                } else if (empty($email) && empty($password)) {
                    header("Location: index.php?msg=emptyEmailPass");
                } else if ($email == $_SESSION['email'] && $hashedPass == $_SESSION['password'] && $_SESSION['status'] == 1) {
                    header("Location: dashboard.php?msg=success");
                } else if ($email != $_SESSION['email'] || $hashedPass != $_SESSION['password']) {
                    header("Location: index.php?msg=emailPassDoesNotMatch");

                } else if ($email == $_SESSION['email'] && $hashedPass == $_SESSION['password'] && $_SESSION['status'] == 0) {
                    header("Location: index.php?msg=inactiveUser");

                }
            }


            ?>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<?php ob_end_flush(); ?>
</body>

</html>