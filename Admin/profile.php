<?php include("inc/header.php"); ?>
<?php include("inc/topbar.php"); ?>
<?php include("inc/sidebar-menu.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile || Admin</title>
</head>

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    User Profile
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <tbody>
                                                <?php
                                                $authID             = $_SESSION['id'];
                                                $userProfile        = "SELECT * FROM users Where id = '$authID'";
                                                $userSql            = mysqli_query($db, $userProfile);

                                                while ($row  = mysqli_fetch_assoc($userSql)) {
                                                    $id                         = $row['id'];
                                                    $full_name                  = $row['full_name'];
                                                    $username                   = $row['username'];
                                                    $email                      = $row['email'];
                                                    $phone                      = $row['phone'];
                                                    $address                    = $row['address'];
                                                    $role                       = $row['role'];
                                                    $status                     = $row['status'];
                                                    $image                      = $row['image'];
                                                    $join_date                  = $row['join_date'];


                                                ?>
                                                    <tr>
                                                        <th scope="row">Profile Picture</th>
                                                        <td width="60%"><?php
                                                                        if (!empty($image)) { ?>
                                                                <img src="image/users/<?php echo $image; ?>" alt="<?php echo $full_name; ?>" width="150" style="border-radius: 50%;">

                                                            <?php } else { ?>
                                                                <img src="image/users/d1.png" alt="<?php echo $full_name; ?>" width="150" style="border-radius: 50%;">

                                                            <?php   }

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
                                                        <th scope="row">Address</th>
                                                        <td width="60%"><?php echo $address; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Role</th>
                                                        <td width="60%"><?php if ($role == 1) { ?>
                                                                <span class="badge badge-success">Admin</span>
                                                            <?php   } else if ($role == 2) { ?>
                                                                <span class="badge badge-primary">Editor</span>
                                                            <?php  } ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Status</th>
                                                        <td width="60%"><?php if ($status == 1) { ?>
                                                                <span class="badge badge-success">Active</span>
                                                            <?php   } else if ($status == 0) { ?>
                                                                <span class="badge badge-danger">In-Active</span>
                                                            <?php  } ?></td>
                                                    </tr>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Join Date</th>
                                                        <td width="60%"><?php echo $join_date; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="updateProfile.php?id=<?php echo $id; ?>" class="btn btn-primary">Update Information</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "inc/footer.php"; ?>