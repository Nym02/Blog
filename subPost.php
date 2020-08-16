<?php include "inc/header.php"; ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile || Blogger</title>
    </head>

    <body>
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-5 mb-5">
        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-8 m-auto">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="profile.php">Profile</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="subPost.php?do=Add">Add Post</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="subPost.php?do=Manage">Manage Post</a>
                            </li>

                        </ul>

                    </div>
                </nav>

            </div>
        </div>

        <!-- Body content starts  -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <!-- card design start  -->
                        <div class="card card-primary card-outline">
                            <div class="card-header ">
                                Add Post
                            </div>
                            <div class="card-body">


                            </div>
                        </div>
                        <!-- /.card -->
                        <!-- card design end  -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Body content ends  -->
    </div>
    <!-- /.content-header -->



<?php include 'inc/footer.php';?>