<?php
include "Admin/inc/db.php";
session_start();
ob_start();


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Website Description -->
    <meta name="description" content="Blue Chip: Corporate Multi Purpose Business Template"/>
    <meta name="author" content="Blue Chip"/>

    <!--  Favicons / Title Bar Icon  -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.png"/>
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon/favicon.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon/favicon.png"/>

    <title>Blog</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <!-- Flat Icon CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

    <!-- Fency Box CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">

    <!-- Theme Main Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body>
<!-- :::::::::: Header Section Start :::::::: -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">Navbar</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">

                            <?php

                            $getCategory = "SELECT * FROM category";
                            $catSql = mysqli_query($db, $getCategory);


                            while ($row = mysqli_fetch_assoc($catSql)) {
                                $id = $row['id'];
                                $cat_name = $row['cat_name']; ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="categoryPost.php?id=<?php echo $id; ?>"><?php echo $cat_name; ?></a>
                                </li>
                            <?php }

                            if (!empty($_SESSION['sub_username'])) { ?>
                                <?php
                                //showing user information
                                $username = $_SESSION['sub_username'];
                                $loggedUser = "SELECT * FROM subscriber where sub_username = '$username' ";
                                $fireLoggedUser = mysqli_query($db, $loggedUser);

                                while ($row = mysqli_fetch_array($fireLoggedUser)) {
                                    $loggedUsername = $row['sub_username'];
                                    $loggedUserImage = $row['sub_image'];

                                    ?>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link btn btn-info text-white dropdown-toggle" href="#"
                                           id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">  <?php if ($loggedUserImage != null) { ?>
                                                <img src="Admin/image/sub/<?php echo $loggedUserImage; ?>"
                                                     alt="" class="mr-4"
                                                     width="30">
                                            <?php } else { ?>
                                                <img src="Admin/image/sub/p.png"
                                                     alt="" class="mr-4"
                                                     width="30">
                                            <?php } ?>
                                            <?php echo $loggedUsername; ?>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="profile.php">Profile </a>



                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="logout.php">Logout</a>
                                        </div>

                                    </li>

                                <?php }
                            } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="register.php">Register</a>
                                </li>
                            <?php }

                            ?>


                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- ::::::::::: Header Section End ::::::::: -->