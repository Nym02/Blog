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


    <?php if ($_SESSION['role'] == 1) {

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
                                    <?php } else if ($userNum > 0) { ?>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                               style="width:100%">
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
                                            $id = $row['id'];
                                            $full_name = $row['full_name'];
                                            $username = $row['username'];
                                            $email = $row['email'];
                                            $password = $row['password'];
                                            $phone = $row['phone'];
                                            $address = $row['address'];
                                            $role = $row['role'];
                                            $status = $row['status'];
                                            $image = $row['image'];
                                            $join_date = $row['join_date'];
                                            $i++;


                                            ?>

                                            <tbody>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>

                                                    <?php
                                                    if (!empty($image)) { ?>
                                                        <img src="image/users/<?php echo $image; ?>"
                                                             alt="<?php echo $full_name; ?>" width="35">

                                                    <?php } else { ?>
                                                        <img src="image/users/d1.png" alt="<?php echo $full_name; ?>"
                                                             width="35">
                                                    <?php }

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
                                                            <li class="list-item" title="Edit"><a class="list-link"
                                                                                                  href="users.php?do=Edit&id=<?php echo $id; ?>"><i
                                                                            class="fa fa-edit text-info"></i></a></li>
                                                            <li class="list-item"><a href="" class="list-link"
                                                                                     title="Delete" data-toggle="modal"
                                                                                     data-target="#delete<?php echo $id; ?>"><i
                                                                            class="fa fa-trash text-danger"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>

                                            </tr>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Do you want
                                                                to
                                                                delete this user?
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="btn-group">
                                                                <a href="users.php?do=Delete&id=<?php echo $id; ?>"
                                                                   class="btn btn-danger">Yes</a>
                                                                <a href="#" data-dismiss="modal" aria-label="Close"
                                                                   class="btn btn-success">No</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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


        <?php } else if ($do == 'Add') { ?>

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
                                                    <input type="text" class="form-control" name="full_name" id="fname"
                                                           autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="uname">Username</label>
                                                    <input type="text" class="form-control" name="username" id="uname"
                                                           autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="uEmail">Email</label>
                                                    <input type="email" class="form-control" name="email" id="uEmail"
                                                           autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="pass">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                           id="pass"
                                                           autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="repass">Re-Type Password</label>
                                                    <input type="password" class="form-control" name="rePassword"
                                                           id="repass" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="uphone">Phone</label>
                                                    <input type="text" class="form-control" name="phone" id="uphone"
                                                           autocomplete="off">
                                                </div>


                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="uaddress">Address</label>
                                                    <input type="text" class="form-control" name="address" id="uaddress"
                                                           autocomplete="off">
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
                                                    <input type="file" name="profileImg" id="uimage"
                                                           class="form-control-file">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn bg-gradient-primary btn-flat"
                                                           name="addUser" value="Register User">
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

                //checking existing username

                $checkUsername = "SELECT username from users where username = '$username'";
                $fireUsername = mysqli_query($db, $checkUsername);
                $countUsername = mysqli_num_rows($fireUsername);

                //checking existing email
                $checkEmail = "SELECT user_email from users where email = '$email'";
                $fireEmail = mysqli_query($db, $checkEmail);
                $countEmail = mysqli_num_rows($fireEmail);

                if ($password == $rePassword) {
                    $hashedPass = sha1($password);
                    if ($countUsername == 0) {
                        if ($countEmail == 0) {

                            if ($image_name != NULL) {
                                if (in_array($imageActualExt, $allowedExt)) {
                                    if ($image_size < 500000) {
                                        $photo = rand(0, 1000000000000) . '_' . $image_name;
                                        move_uploaded_file($image_tmp, "image/users/" . $photo);

                                        $userInfoQuery = "INSERT INTO users(full_name, username, email, password, phone, address, role, status, image, join_date) VALUES('$full_name','$username','$email','$hashedPass','$phone','$address','$role','$status','$photo', now())";

                                        $userInfoSql = mysqli_query($db, $userInfoQuery);
                                        if ($userInfoSql) {
                                            header("Location: users.php?do=Manage&msg=addSuccess");
                                        } else {
                                            die("Error" . mysqli_error($db));
                                        }
                                    } else {
                                        header("Location: users.php?do=Add&msg=fileError&fullname=$full_name&username=$username&email=$email&phone=$phone&address=$address");
                                    }
                                } else {
                                    header("Location: users.php?do=Add&msg=typeError&fullname=$full_name&username=$username&email=$email&phone=$phone&address=$address");
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
                            header("Location: users.php?do=Add&msg=existEmail&fullname=$full_name&username=$username&email=$email&phone=$phone&address=$address");

                        }
                    } else {
                        header("Location: users.php?do=Add&msg=existUsername&fullname=$full_name&username=$username&email=$email&phone=$phone&address=$address");

                    }

                } else {
                    header("Location: users.php?do=Add&msg=passnotmatch&fullname=$full_name&username=$username&email=$email&phone=$phone&address=$address");
                }
            }
        } else if ($do == 'Edit') { ?>

            <?php
            if (isset($_GET['id'])) {
                $editID = $_GET['id'];


                $queryEdit = "SELECT * from users where id = '$editID'";
                $sqlEdit = mysqli_query($db, $queryEdit);

                while ($row = mysqli_fetch_assoc($sqlEdit)) {
                    $id = $row['id'];
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $password = $row['password'];
                    $phone = $row['phone'];
                    $address = $row['address'];
                    $role = $row['role'];
                    $status = $row['status'];
                    $image = $row['image'];
                    $join_date = $row['join_date'];


                    ?>
                    <!-- Body content starts  -->
                    <section class="content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card card-danger card-outline">
                                        <div class="card-header ">
                                            <h2 class="card-title">Update User</h2>
                                        </div>
                                        <div class="card-body">
                                            <form action="users.php?do=Update" method="POST"
                                                  enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="fname">Full Name</label>
                                                            <input type="text" class="form-control" name="full_name"
                                                                   id="fname" value="<?php echo $full_name; ?>"
                                                                   autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="uname">Username</label>
                                                            <input type="text" class="form-control" name="username"
                                                                   id="uname" value="<?php echo $username; ?>"
                                                                   autocomplete="off" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="uEmail">Email</label>
                                                            <input type="email" class="form-control" name="email"
                                                                   id="uEmail" value="<?php echo $email; ?>"
                                                                   autocomplete="off">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="pass">Password</label>
                                                            <input type="password" class="form-control" name="password"
                                                                   id="pass" autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="repass">Re-Type Password</label>
                                                            <input type="password" class="form-control"
                                                                   name="rePassword"
                                                                   id="repass" autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="uphone">Phone</label>
                                                            <input type="text" class="form-control" name="phone"
                                                                   id="uphone"
                                                                   value="<?php echo $phone; ?>" autocomplete="off">
                                                        </div>


                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="uaddress">Address</label>
                                                            <input type="text" class="form-control" name="address"
                                                                   id="uaddress" value="<?php echo $address; ?>"
                                                                   autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="urole">User Role</label>
                                                            <select name="role" id="urole" class="form-control">
                                                                <option value="1" <?php if ($role == 1) {
                                                                    echo "selected";
                                                                } ?>>Super Admin
                                                                </option>
                                                                <option value="2" <?php if ($role == 2) {
                                                                    echo "selected";
                                                                } ?>>Editor
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ustatus">Status</label>
                                                            <select name="status" id="ustatus" class="form-control">
                                                                <option value="1" <?php if ($status == 1) {
                                                                    echo "selected";
                                                                } ?>>Active
                                                                </option>
                                                                <option value="0" <?php if ($status == 0) {
                                                                    echo "selected";
                                                                } ?>>In-Active
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="uimage">Profile Picture</label>
                                                            <input type="file" name="profileImg" id="uimage"
                                                                   class="form-control-file">
                                                        </div>
                                                        <div class="m-auto" style="width:130px; height: 130px">
                                                            <?php
                                                            if (!empty($image)) { ?>
                                                                <img src="image/users/<?php echo $image; ?>"
                                                                     alt="<?php echo $full_name; ?>"
                                                                     style="width:130px; height: 130px">

                                                            <?php } else { ?>
                                                                <img src="image/users/d1.png"
                                                                     alt="<?php echo $full_name; ?>"
                                                                     style="width:130px; height: 130px">
                                                            <?php }

                                                            ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="updateUserID"
                                                                   value="<?php echo $id; ?>">
                                                            <input type="submit"
                                                                   class="btn bg-gradient-primary btn-flat"
                                                                   name="updateUser" value="Update User">
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
                <?php }
            } ?>
        <?php } else if ($do == 'Update') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $updateUserID = $_POST['updateUserID'];
                $full_name = mysqli_real_escape_string($db, $_POST['full_name']);
                // $username = mysqli_real_escape_string($db, $_POST['username']);
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


                if (!empty($password) && !empty($image_name)) {
                    if ($password == $rePassword) {
                        $hashedPass = sha1($password);

                        if (in_array($imageActualExt, $allowedExt)) {
                            if ($image_size < 500000) {
                                $photo = rand(0, 1000000000000) . '_' . $image_name;
                                move_uploaded_file($image_tmp, "image/users/" . $photo);

                                //delete existing image from storage

                                $imageDel = "SELECT * from users where id ='$updateUserID'";
                                $imageDelSql = mysqli_query($db, $imageDel);

                                while ($row = mysqli_fetch_assoc($imageDelSql)) {
                                    $existingImg = $row['image'];
                                }
                                unlink("image/users/" . $existingImg);

                                $userInfoQuery = "UPDATE users SET full_name='$full_name', email='$email', password='$hashedPass', phone='$phone', address='$address', role='$role', status='$status', image='$photo' where id ='$updateUserID'";

                                $userInfoSql = mysqli_query($db, $userInfoQuery);
                                if ($userInfoSql) {
                                    header("Location: users.php?do=Manage&msg=updateSuccess");
                                } else {
                                    die("Error" . mysqli_error($db));
                                }
                            } else {
                                header("Location: users.php?do=Edit&msg=fileError&fullname=$full_name&email=$email&phone=$phone&address=$address");

                            }
                        } else {
                            header("Location: users.php?do=Edit&msg=typeError&fullname=$full_name&email=$email&phone=$phone&address=$address");

                        }
                    } else {
                        header("Location: users.php?do=Edit&msg=passnotmatch&fullname=$full_name&email=$email&phone=$phone&address=$address");

                    }
                } else if (!empty($password) && empty($image_name)) {
                    if ($password == $rePassword) {
                        $hashedPass = sha1($password);


                        $userInfoQuery = "UPDATE users SET full_name='$full_name', email='$email', password='$hashedPass', phone='$phone', address='$address', role='$role', status='$status' where id ='$updateUserID'";

                        $userInfoSql = mysqli_query($db, $userInfoQuery);
                        if ($userInfoSql) {
                            header("Location: users.php?do=Manage&msg=updateSuccess");
                        } else {
                            die("Error" . mysqli_error($db));
                        }
                    } else {
                        header("Location: users.php?do=Edit&msg=passnotmatch&fullname=$full_name&email=$email&phone=$phone&address=$address");
                    }
                } else if (empty($password) && !empty($image_name)) {

                    if (in_array($imageActualExt, $allowedExt)) {
                        if ($image_size < 500000) {
                            $photo = rand(0, 1000000000000) . '_' . $image_name;
                            move_uploaded_file($image_tmp, "image/users/" . $photo);

                            //delete existing image from storage

                            $imageDel = "SELECT * from users where id ='$updateUserID'";
                            $imageDelSql = mysqli_query($db, $imageDel);

                            while ($row = mysqli_fetch_assoc($imageDelSql)) {
                                $existingImg = $row['image'];
                            }
                            unlink("image/users/" . $existingImg);

                            $userInfoQuery = "UPDATE users SET full_name='$full_name', email='$email', phone='$phone', address='$address', role='$role', status='$status', image='$photo' where id ='$updateUserID'";

                            $userInfoSql = mysqli_query($db, $userInfoQuery);
                            if ($userInfoSql) {
                                header("Location: users.php?do=Manage&msg=updateSuccess");
                            } else {
                                die("Error" . mysqli_error($db));
                            }
                        } else {
                            header("Location: users.php?do=Edit&msg=fileError&fullname=$full_name&email=$email&phone=$phone&address=$address");
                        }
                    } else {
                        header("Location: users.php?do=Edit&msg=typeError&fullname=$full_name&email=$email&phone=$phone&address=$address");
                    }
                } else if (empty($password) && empty($image_name)) {

                    $userInfoQuery = "UPDATE users SET full_name='$full_name', email='$email', phone='$phone', address='$address', role='$role', status='$status' where id ='$updateUserID'";

                    $userInfoSql = mysqli_query($db, $userInfoQuery);
                    if ($userInfoSql) {
                        header("Location: users.php?do=Manage&msg=updateSuccess");
                    } else {
                        die("Error" . mysqli_error($db));
                    }
                }
            }
        } else if ($do == 'Delete') {
            if (isset($_GET['id'])) {

                $delete_user_id = $_GET['id'];

                //delete existing image from storage

                $imageDel = "SELECT * from users where id ='$delete_user_id'";
                $imageDelSql = mysqli_query($db, $imageDel);

                while ($row = mysqli_fetch_assoc($imageDelSql)) {
                    $existingImg = $row['image'];
                }
                unlink("image/users/" . $existingImg);

                $queryDel = "DELETE from users where id = '$delete_user_id'";
                $queryDelSql = mysqli_query($db, $queryDel);


                if ($queryDelSql) {
                    header("Location: users.php?do=Manage&msg=deleteSuccess");
                } else {
                    die("Error while deleting user" . mysqli_error($db));
                }
            }
        }
    } else {
        echo '<div class="alert alert-danger" >You do not have access to this page.</div>';
    }
    ?>


    <?php include("inc/footer.php"); ?>

    <script>
        <?php
        if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        if($msg == 'fileError'){ ?>
        toastr.error("File is too large.");

        <?php } else if ($msg == 'typeError'){ ?>
        toastr.error("Invalid image type. Valid Type: jpg, jpeg, png");

        <?php } else if ($msg == 'existUsername'){ ?>
        toastr.error("Username already exist.");

        <?php } else if ($msg == 'existEmail'){ ?>
        toastr.error("Email already exist.");

        <?php } else if ($msg == 'passnotmatch'){ ?>
        toastr.error("Password do not match.");

        <?php }else if ($msg == 'addSuccess'){ ?>
        toastr.success("User added successfully.");

        <?php }else if ($msg == 'updateSuccess'){ ?>
        toastr.success("User info update successfully");

        <?php }else if ($msg == 'deleteSuccess'){ ?>
        toastr.success("User deleted successfully");
        <?php }
        }

        ?>

    </script>
