<?php include("inc/header.php"); ?>
<?php include("inc/topbar.php"); ?>
<?php include("inc/sidebar-menu.php"); ?>


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
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <?php

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';


    if ($do == 'Manage') { ?>



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                Manage Users
                            </div>
                            <div class="card-body">
                                <?php
                                $i = 0;
                                $userQuery = "SELECT * from users";
                                $userSql = mysqli_query($db, $userQuery);
                                $userNum = mysqli_num_rows($userSql);
                                if ($userNum == 0) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        No registered users at this moment.
                                    </div>
                                <?php   } else if ($userNum > 0) { ?>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead class="thead-dark">


                                                <tr>
                                                    <th>#SL.</th>
                                                    <th>Image</th>
                                                    <th>Full Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Action</th>


                                                </tr>
                                            </thead>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($userSql)) {
                                                $id             = $row['id'];
                                                $full_name      = $row['full_name'];
                                                $username       = $row['username'];
                                                $email          = $row['email'];
                                                $password       = $row['password'];
                                                $phone          = $row['phone'];
                                                $address        = $row['address'];
                                                $role           = $row['role'];
                                                $status         = $row['status'];
                                                $image          = $row['image'];
                                                $join_date      = $row['join_date'];
                                                $i++;




                                            ?>

                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td>

                                                            <?php
                                                            if (!empty($image)) { ?>
                                                                <img src="image/users/<?php echo $image; ?>" alt="<?php echo $full_name; ?>" width="35">

                                                            <?php } else { ?>
                                                                <img src="image/users/d1.png" alt="<?php echo $full_name; ?>" width="35">
                                                            <?php  }

                                                            ?>
                                                        </td>
                                                        <td><?php echo $full_name; ?></td>
                                                        <td><?php echo $username; ?></td>
                                                        <td><?php echo $email; ?></td>
                                                        <td><?php echo $phone; ?></td>
                                                        <td><?php echo $address; ?></td>
                                                        <td><?php if ($role == 1) { ?>
                                                                <span class="badge badge-primary">Admin</span>

                                                            <?php } else if ($role == 2) { ?>
                                                                <span class="badge badge-info">Editor</span>
                                                            <?php } ?></td>
                                                        <td><?php if ($status == 1) { ?>
                                                                <span class="badge badge-success">Active</span>

                                                            <?php } else if ($status == 0) { ?>
                                                                <span class="badge badge-danger">In-Active</span>
                                                            <?php } ?></td>
                                                        <td>
                                                            <div class="action-bar">
                                                                <ul class="list">
                                                                    <li class="list-item" title="Edit"><a class="list-link" href="users.php?do=Edit&id=<?php echo $id; ?>"><i class="fa fa-edit text-info"></i></a></li>
                                                                    <li class="list-item"><a href="" class="list-link" title="Delete" data-toggle="modal" data-target=""><i class="fa fa-trash text-danger"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>

                                                    </tr>
                                            <?php }
                                        }

                                            ?>
                                                </tbody>
                                                <tfoot class="thead-dark">
                                                    <tr>
                                                        <th>#SL.</th>
                                                        <th>Image</th>
                                                        <th>Full Name</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                        </table>
                                    </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php  } else if ($do == 'Add') { ?>

        <!-- Body content starts  -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline">
                            <div class="card-header ">
                                <h2 class="card-title">Add New User</h2>
                            </div>
                            <div class="card-body">
                                <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="fname">Full Name</label>
                                                <input type="text" class="form-control" name="full_name" id="fname" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uname">Username</label>
                                                <input type="text" class="form-control" name="username" id="uname" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uEmail">Email</label>
                                                <input type="email" class="form-control" name="email" id="uEmail" autocomplete="off">
                                            </div>

                                            <div class="form-group">
                                                <label for="pass">Password</label>
                                                <input type="password" class="form-control" name="password" id="pass" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="repass">Re-Type Password</label>
                                                <input type="password" class="form-control" name="rePassword" id="repass" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uphone">Phone</label>
                                                <input type="text" class="form-control" name="phone" id="uphone" autocomplete="off">
                                            </div>



                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="uaddress">Address</label>
                                                <input type="text" class="form-control" name="address" id="uaddress" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="urole">User Role</label>
                                                <select name="role" id="urole" class="form-control">
                                                    <option value="1">Super Admin</option>
                                                    <option value="2">Editor</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="ustatus">Status</label>
                                                <select name="status" id="ustatus" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">In-Active</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="uimage">Profile Picture</label>
                                                <input type="file" name="profileImg" id="uimage" class="form-control-file">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn bg-gradient-primary btn-flat" name="addUser" value="Register User">
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


    <?php } else if ($do == 'Insert') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $full_name = mysqli_real_escape_string($db, $_POST['full_name']);
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $password = mysqli_real_escape_string($db, $_POST['password']);
            $rePassword = mysqli_real_escape_string($db, $_POST['rePassword']);
            $phone = mysqli_real_escape_string($db, $_POST['phone']);
            $address = mysqli_real_escape_string($db, $_POST['address']);
            $role = mysqli_real_escape_string($db, $_POST['role']);
            $status = mysqli_real_escape_string($db, $_POST['status']);

            $image = $_FILES['profileImg'];
            $image_name = $_FILES['profileImg']['name'];
            $image_size = $_FILES['profileImg']['size'];
            $image_type = $_FILES['profileImg']['type'];
            $image_tmp = $_FILES['profileImg']['tmp_name'];

            $imageExt = explode('.', $image_name);
            $imageActualExt = strtolower(end($imageExt));

            $allowedExt = array('jpg', 'jpeg', 'png');

            if ($password == $rePassword) {
                $hashedPass = sha1($password);


                if ($image_name != NULL) {
                    if (in_array($imageActualExt, $allowedExt)) {
                        if ($image_size < 500000) {
                            $photo = rand(0, 1000000000000) . '_' . $image_name;
                            move_uploaded_file($image_tmp, "image/users/" . $photo);

                            $userInfoQuery = "INSERT INTO users(full_name, username, email, password, phone, address, role, status, image, join_date) VALUES('$full_name','$username','$email','$hashedPass','$phone','$address','$role','$status','$photo', now())";

                            $userInfoSql = mysqli_query($db, $userInfoQuery);
                            if ($userInfoSql) {
                                header("Location: users.php?do=Manage");
                            } else {
                                die("Error" . mysqli_error($db));
                            }
                        } else {
                            echo "Your File size is too large";
                        }
                    } else {
                        echo "Your File Type is not supported";
                    }
                } else {
                    $userInfoQuery = "INSERT INTO users(full_name, username, email, password, phone, address, role, status, image, join_date) VALUES('$full_name','$username','$email','$hashedPass','$phone','$address','$role','$status','$photo', now())";

                    $userInfoSql = mysqli_query($db, $userInfoQuery);
                    if ($userInfoSql) {
                        header("Location: users.php?do=Manage");
                    } else {
                        die("Error" . mysqli_error($db));
                    }
                }
            } else {
                echo "Your Password does not match. Please try again";
            }
        }
    } else if ($do == 'Edit') { ?>
        <!-- Body content starts  -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline">
                            <div class="card-header ">
                                <h2 class="card-title">Add New User</h2>
                            </div>
                            <div class="card-body">
                                <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="fname">Full Name</label>
                                                <input type="text" class="form-control" name="full_name" id="fname" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uname">Username</label>
                                                <input type="text" class="form-control" name="username" id="uname" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uEmail">Email</label>
                                                <input type="email" class="form-control" name="email" id="uEmail" autocomplete="off">
                                            </div>

                                            <div class="form-group">
                                                <label for="pass">Password</label>
                                                <input type="password" class="form-control" name="password" id="pass" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="repass">Re-Type Password</label>
                                                <input type="password" class="form-control" name="rePassword" id="repass" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uphone">Phone</label>
                                                <input type="text" class="form-control" name="phone" id="uphone" autocomplete="off">
                                            </div>



                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="uaddress">Address</label>
                                                <input type="text" class="form-control" name="address" id="uaddress" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="urole">User Role</label>
                                                <select name="role" id="urole" class="form-control">
                                                    <option value="1">Super Admin</option>
                                                    <option value="2">Editor</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="ustatus">Status</label>
                                                <select name="status" id="ustatus" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">In-Active</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="uimage">Profile Picture</label>
                                                <input type="file" name="profileImg" id="uimage" class="form-control-file">
                                            </div>
                                            <div class="m-auto" style="width:130px; height: 130px">
                                                <img src="image/users/d1.png" alt="" style="width:130px; height: 130px">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn bg-gradient-primary btn-flat" name="addUser" value="Register User">
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php } else if ($do == 'Update') {
    } else if ($do == 'Delete') {
    }

    ?>


    <?php include("inc/footer.php"); ?>