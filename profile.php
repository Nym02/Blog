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
<div class="content-wrapper mt-5 mb-5">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-md-8 m-auto">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="profile.php">Profile</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="subPost.php?do=Manage">Manage Post</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="subPost.php?do=Add">Add Post</a>
                        </li>

                    </ul>

                </div>
            </nav>

        </div>
    </div>

    <div class="content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                User Profile
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tbody>
                                        <?php
                                        $authID = $_SESSION['sub_id'];
                                        $userProfile = "SELECT * FROM subscriber Where sub_id = '$authID'";
                                        $userSql = mysqli_query($db, $userProfile);

                                        while ($row = mysqli_fetch_assoc($userSql)) {
                                            $id = $row['sub_id'];
                                            $full_name = $row['sub_name'];
                                            $username = $row['sub_username'];
                                            $email = $row['sub_email'];
                                            $phone = $row['sub_phone'];
                                            $status = $row['sub_status'];
                                            $image = $row['sub_image'];
                                            $join_date = $row['sub_date'];


                                            ?>
                                            <tr>
                                                <th scope="row">Profile Picture</th>
                                                <td width="60%"><?php
                                                    if (!empty($image)) { ?>
                                                        <img src="Admin/image/sub/<?php echo $image; ?>"
                                                             alt="<?php echo $full_name; ?>" width="150"
                                                             style="border-radius: 50%;">

                                                    <?php } else { ?>
                                                        <img src="Admin/image/sub/p.png" alt="<?php echo $full_name; ?>"
                                                             width="150" style="border-radius: 50%;">

                                                    <?php }

                                                    ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Full Name</th>
                                                <td width="60%"><?php echo $full_name; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Username</th>
                                                <td width="60%"><?php echo $username; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td width="60%"><?php echo $email; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone</th>
                                                <td width="60%"><?php echo $phone; ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Status</th>
                                                <td width="60%"><?php if ($status == 1) { ?>
                                                        <span class="badge badge-success">Active</span>
                                                    <?php } else if ($status == 0) { ?>
                                                        <span class="badge badge-danger">In-Active</span>
                                                    <?php } ?></td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Join Date</th>
                                                <td width="60%"><?php
                                                    $acutalDate = explode(" ", $join_date);
                                                    echo $joinDate = $acutalDate[0];
                                                    ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="updateBlogger.php?id=<?php echo $id; ?>" class="btn btn-primary">Update
                                    Information</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "inc/footer.php"; ?>