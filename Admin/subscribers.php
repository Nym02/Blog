<?php include("inc/header.php"); ?>
<?php include("inc/topbar.php"); ?>
<?php include("inc/sidebar-menu.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';


        if ($do == 'Manage') { ?>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Subscribers</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>

            <!-- Body content starts  -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- card design start  -->
                            <div class="card card-primary card-outline">
                                <div class="card-header ">
                                    <h2 class="card-title">Manage Subscribers</h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                               style="width:100%">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>#SL.</th>
                                                <th>Avatar</th>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Join Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $subscriber = "SELECT * FROM subscriber order by sub_id desc";
                                            $fireSubscriber = mysqli_query($db, $subscriber);
                                            $i = 0;

                                            while ($row = mysqli_fetch_assoc($fireSubscriber)) {
                                                $sub_id = $row['sub_id'];
                                                $sub_fullname = $row['sub_name'];
                                                $sub_username = $row['sub_username'];
                                                $sub_email = $row['sub_email'];
                                                $sub_phone = $row['sub_phone'];
                                                $sub_status = $row['sub_status'];
                                                $sub_image = $row['sub_image'];
                                                $sub_joinDate = $row['sub_date'];
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($sub_image == NULL) { ?>
                                                            <img src="image/sub/p.png" alt="profile image" width="50">

                                                        <?php } else if ($sub_image != Null) { ?>
                                                            <img src="image/sub/<?php echo $sub_image; ?>"
                                                                 alt="profile image" width="50">
                                                        <?php }

                                                        ?>

                                                    </td>
                                                    <td><?php echo $sub_fullname; ?></td>
                                                    <td><?php echo $sub_username; ?></td>
                                                    <td><?php echo $sub_email; ?></td>
                                                    <td><?php echo $sub_phone; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($sub_status == 0) { ?>
                                                            <span class="badge badge-danger">In-Active</span>

                                                        <?php } else if ($sub_status == 1) { ?>
                                                            <span class="badge badge-success">Active</span>
                                                        <?php }

                                                        ?>


                                                    </td>
                                                    <td>
                                                        <?php
                                                        $date = explode(" ", $sub_joinDate);
                                                        $actualDate = $date[0];

                                                        echo $actualDate;

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="action-bar ">
                                                            <ul class="list d-flex">
                                                                <li class="list-item" title="Edit"><a
                                                                            class="list-link mr-2"
                                                                            href="subscribers.php?do=Edit&id=<?php echo $sub_id; ?>"><i
                                                                                class="fa fa-edit text-info"></i></a>
                                                                </li>
                                                                <li class="list-item"><a href="" class="list-link"
                                                                                         title="Delete"
                                                                                         data-toggle="modal"
                                                                                         data-target="#delete<?php echo $sub_id; ?>"><i
                                                                                class="fa fa-trash text-danger"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete<?php echo $sub_id; ?>" tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Do you
                                                                    want to
                                                                    delete this user?
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="btn-group">
                                                                    <a href="subscribers.php?do=Delete&id=<?php echo $sub_id; ?>"
                                                                       class="btn btn-danger">Yes</a>
                                                                    <a href="#" data-dismiss="modal" aria-label="Close"
                                                                       class="btn btn-success">No</a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }


                                            ?>
                                            </tbody>
                                            <tfoot class="thead-dark">
                                            <tr>
                                                <th>#SL.</th>
                                                <th>Avatar</th>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Join Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>


                                </div>
                            </div>
                            <!-- /.card -->
                            <!-- card design end  -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Body content ends  -->
        <?php } else if ($do == 'Add') { ?>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add New Blogger</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>

            <!-- Body content starts  -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- card design start  -->
                            <div class="card card-primary card-outline">
                                <div class="card-header ">
                                    <h2 class="card-title">Add New Blogger</h2>
                                </div>
                                <div class="card-body">
                                    <form action="subscribers.php?do=Insert" method="POST"
                                          enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <?php
                                                    if (isset($_GET['fullname'])) {
                                                        $subFullname = $_GET['fullname']; ?>
                                                        <input type="text" class="form-control" name="sub_fullname"
                                                               value="<?php echo $subFullname; ?>">
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="sub_fullname">
                                                    <?php }

                                                    ?>

                                                </div>
                                                <div class="form-group">
                                                    <label for="">Username</label>
                                                    <?php
                                                    if (isset($_GET['username'])) {
                                                        $subusername = $_GET['username']; ?>
                                                        <input type="text" class="form-control" name="sub_username"
                                                               value="<?php echo $subusername; ?>">
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="sub_username">
                                                    <?php }

                                                    ?>

                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <?php
                                                    if (isset($_GET['email'])) {
                                                        $subemail = $_GET['email']; ?>
                                                        <input type="text" class="form-control" name="sub_email"
                                                               value="<?php
                                                               echo $subemail;
                                                               ?>">
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="sub_email">
                                                    <?php }

                                                    ?>

                                                </div>
                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <input type="password" class="form-control" name="sub_password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Confirm Password</label>
                                                    <input type="password" class="form-control" name="sub_rePassword">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Phone</label>
                                                    <?php
                                                    if (isset($_GET['phone'])) {
                                                        $subphone = $_GET['phone']; ?>
                                                        <input type="text" class="form-control" name="sub_phone"
                                                               value="<?php echo $subphone; ?>">
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="sub_phone">
                                                    <?php }

                                                    ?>

                                                </div>
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="sub_status" class="form-control" id="">
                                                        <option value="0">In-Active</option>
                                                        <option value="1">Active</option>
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label for="">Profile Avatar</label>
                                                    <input type="file" class="form-control-file" name="sub_image">
                                                </div>

                                                <div class="form-group mt-5">
                                                    <input type="submit" class="btn btn-flat btn-info"
                                                           name="addBlogger">
                                                </div>


                                                <?php
                                                if (isset($_GET['msg'])) {
                                                    $msg = $_GET['msg'];

                                                    if ($msg == 'addUnsuccess') { ?>
                                                        <div class="alert alert-danger">Problem while adding. Please
                                                            contact <a class="btn btn-primary">admin</a></div>

                                                    <?php } else if ($msg == 'typeError') { ?>
                                                        <div class="alert alert-danger">Invalid image type. </div>
                                                    <?php } else if ($msg == 'sizeError') { ?>
                                                        <div class="alert alert-danger">File is too large.</div>
                                                    <?php } else if ($msg == 'notMatchPass') { ?>
                                                        <div class="alert alert-danger">Password do not match.</div>
                                                    <?php } else if ($msg == 'existEmail') { ?>
                                                        <div class="alert alert-danger">Email already exists.</div>
                                                    <?php } else if ($msg == 'existUsername') { ?>
                                                        <div class="alert alert-danger">Username already exists.</div>
                                                    <?php }
                                                }


                                                ?>

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- /.card -->
                            <!-- card design end  -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Body content ends  -->


        <?php } else if ($do == 'Insert') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $fullname = mysqli_real_escape_string($db, $_POST['sub_fullname']);
                $username = mysqli_real_escape_string($db, $_POST['sub_username']);
                $email = mysqli_real_escape_string($db, $_POST['sub_email']);
                $password = mysqli_real_escape_string($db, $_POST['sub_password']);
                $rePassword = mysqli_real_escape_string($db, $_POST['sub_rePassword']);
                $phone = mysqli_real_escape_string($db, $_POST['sub_phone']);
                $status = mysqli_real_escape_string($db, $_POST['sub_status']);


                $image = $_FILES['sub_image'];
                $image_name = $_FILES['sub_image']['name'];
                $image_size = $_FILES['sub_image']['size'];
                $image_type = $_FILES['sub_image']['type'];
                $image_tmp = $_FILES['sub_image']['tmp_name'];

                //getting the image extension

                $imgExtension = explode(".", $image_name);
                $actualImgExtension = strtolower(end($imgExtension));

                $allowedImgExtension = array("jpg", "jpeg", "png");


                //checking existing username
                $checkUsername = "SELECT * FROM subscriber WHERE sub_username = '$username'";
                $fireCheckUsername = mysqli_query($db, $checkUsername);
                $countUsername = mysqli_num_rows($fireCheckUsername);


                //checking existing email
                $checkEmail = "SELECT * FROM subscriber WHERE sub_email = '$email'";
                $fireCheckEmail = mysqli_query($db, $checkEmail);
                $countEmail = mysqli_num_rows($fireCheckEmail);

                if (!empty($image_name)) {
                    if ($countUsername == 0) {
                        if ($countEmail == 0) {
                            if ($password == $rePassword) {
                                $hashedPass = sha1($password);
                                if ($image_size < 500000) {
                                    if (in_array($actualImgExtension, $allowedImgExtension)) {
                                        $BloggerPhoto = uniqid("Blogger") . "_" . $image_name;
                                        move_uploaded_file($image_tmp, "image/sub/" . $BloggerPhoto);

                                        //insert blogger info to the database

                                        $bloggerInfo = "INSERT INTO subscriber(sub_name, sub_username, sub_email, sub_password, sub_phone, sub_status, sub_image, sub_date) VALUES ('$fullname', '$username', '$email', '$hashedPass', '$phone', '$status','$BloggerPhoto', current_timestamp() )";

                                        $fireBloggerInfo = mysqli_query($db, $bloggerInfo);

                                        if ($fireBloggerInfo) {
                                            header("Location: subscribers.php?do=Manage&msg=addSuccess");
                                        } else {
                                            header("Location: subscribers.php?do=Add&msg=addUnsuccess");
                                        }
                                    } else {
                                        header("Location: subscribers.php?do=Add&msg=typeError&fullname=$fullname&username=$username&email=$email&phone=$phone");
                                    }

                                } else {
                                    header("Location: subscribers.php?do=Add&msg=sizeError&fullname=$fullname&username=$username&email=$email&phone=$phone");
                                }
                            } else {
                                header("Location: subscribers.php?do=Add&msg=notMatchPass&fullname=$fullname&username=$username&email=$email&phone=$phone");

                            }

                        } else {
                            header("Location: subscribers.php?do=Add&msg=existEmail&fullname=$fullname&username=$username&email=$email&phone=$phone");
                        }

                    } else {
                        header("Location: subscribers.php?do=Add&msg=existUsername&fullname=$fullname&username=$username&email=$email&phone=$phone");
                    }


                } else {
                    if ($countUsername == 0) {
                        if ($countEmail == 0) {
                            if ($password == $rePassword) {
                                $hashedPass = sha1($password);

                                //insert blogger info to the database

                                $bloggerInfo = "INSERT INTO subscriber(sub_name, sub_username, sub_email, sub_password, sub_phone, sub_status,  sub_date) VALUES ('$fullname', '$username', '$email', '$hashedPass', '$phone', '$status', current_timestamp() )";

                                $fireBloggerInfo = mysqli_query($db, $bloggerInfo);

                                if ($fireBloggerInfo) {
                                    header("Location: subscribers.php?do=Manage&msg=addSuccess");
                                } else {
                                    header("Location: subscribers.php?do=Add&msg=addUnsuccess");
                                }
                            } else {
                                header("Location: subscribers.php?do=Add&msg=notMatchPass&fullname=$fullname&username=$username&email=$email&phone=$phone");
                            }
                        } else {
                            header("Location: subscribers.php?do=Add&msg=existEmail&fullname=$fullname&username=$username&email=$email&phone=$phone");
                        }
                    } else {
                        header("Location: subscribers.php?do=Add&msg=existUsername&fullname=$fullname&username=$username&email=$email&phone=$phone");
                    }
                }


            }

        } else if ($do == 'Edit') {
            if (isset($_GET['id'])) {
                $bloggerEditID = $_GET['id'];

                $subscriber = "SELECT * FROM subscriber WHERE sub_id = '$bloggerEditID'";
                $fireSubscriber = mysqli_query($db, $subscriber);


                while ($row = mysqli_fetch_assoc($fireSubscriber)) {
                    $sub_id = $row['sub_id'];
                    $sub_fullname = $row['sub_name'];
                    $sub_username = $row['sub_username'];
                    $sub_email = $row['sub_email'];
                    $sub_phone = $row['sub_phone'];
                    $sub_status = $row['sub_status'];
                    $sub_image = $row['sub_image'];
                    $sub_joinDate = $row['sub_date'];


                    ?>
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">Dashboard</h1>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Edit Blogger Information</li>
                                    </ol>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>

                    <!-- Body content starts  -->
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- card design start  -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-header ">
                                            <h2 class="card-title">Edit Blogger Info</h2>
                                        </div>
                                        <div class="card-body">
                                            <form action="subscribers.php?do=Update" method="POST"
                                                  enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Full Name</label>
                                                            <input type="text" class="form-control" name="sub_fullname"
                                                                   value="<?php echo $sub_fullname; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Username</label>
                                                            <input type="text" class="form-control" name="sub_username"
                                                                   value="<?php echo $sub_username; ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="text" class="form-control" name="sub_email"
                                                                   value="<?php echo $sub_email; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Password</label>
                                                            <input type="password" class="form-control"
                                                                   name="sub_password" placeholder="Enter new password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Confirm Password</label>
                                                            <input type="password" class="form-control"
                                                                   name="sub_rePassword"
                                                                   placeholder="Confirm new password">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Phone</label>
                                                            <input type="text" class="form-control" name="sub_phone"
                                                                   value="<?php echo $sub_phone; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Status</label>
                                                            <select name="sub_status" class="form-control" id="">
                                                                <option value="0" <?php if ($sub_status == 0) {
                                                                    echo "selected";
                                                                } ?>>In-Active
                                                                </option>
                                                                <option value="1" <?php if ($sub_status == 1) {
                                                                    echo "selected";
                                                                } ?>>Active
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Profile Avatar</label>
                                                            <input type="file" class="form-control-file"
                                                                   name="sub_image">
                                                        </div>

                                                        <div class="form-group mt-5">
                                                            <input type="hidden" name="updateId"
                                                                   value="<?php echo $sub_id; ?>">
                                                            <input type="submit" class="btn btn-flat btn-info"
                                                                   name="addBlogger">
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <!-- /.card -->
                                    <!-- card design end  -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Body content ends  -->

                <?php }
            }
        } else if ($do == 'Update') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $bloggerUpdateID = $_POST['updateId'];

                $fullname = mysqli_real_escape_string($db, $_POST['sub_fullname']);
                $email = mysqli_real_escape_string($db, $_POST['sub_email']);
                $password = mysqli_real_escape_string($db, $_POST['sub_password']);
                $rePassword = mysqli_real_escape_string($db, $_POST['sub_rePassword']);
                $phone = mysqli_real_escape_string($db, $_POST['sub_phone']);
                $status = mysqli_real_escape_string($db, $_POST['sub_status']);


                $image = $_FILES['sub_image'];
                $image_name = $_FILES['sub_image']['name'];
                $image_size = $_FILES['sub_image']['size'];
                $image_type = $_FILES['sub_image']['type'];
                $image_tmp = $_FILES['sub_image']['tmp_name'];

                //getting the image extension

                $imgExtension = explode(".", $image_name);
                $actualImgExtension = strtolower(end($imgExtension));

                $allowedImgExtension = array("jpg", "jpeg", "png");


                if (!empty($password) && !empty($image_name)) {
                    if ($password == $rePassword) {
                        $hashedPass = sha1($password);

                        if (in_array($actualImgExtension, $allowedImgExtension)) {
                            if ($image_size < 500000) {
                                $photo = rand(0, 1000000000000) . '_' . $image_name;
                                move_uploaded_file($image_tmp, "image/sub/" . $photo);

                                //delete existing image from storage

                                $imageDel = "SELECT * from subscriber where sub_id ='$bloggerUpdateID'";
                                $imageDelSql = mysqli_query($db, $imageDel);

                                while ($row = mysqli_fetch_assoc($imageDelSql)) {
                                    $existingImg = $row['sub_image'];
                                }
                                unlink("image/sub/" . $existingImg);

                                $userInfoQuery = "UPDATE subscriber SET sub_name='$fullname', sub_email='$email', sub_password='$hashedPass', sub_phone='$phone', sub_status='$status', sub_image='$photo' where sub_id ='$bloggerUpdateID'";

                                $userInfoSql = mysqli_query($db, $userInfoQuery);
                                if ($userInfoSql) {
                                    header("Location: subscribers.php?do=Manage&msg=updateSuccess");
                                } else {
                                    die("Error" . mysqli_error($db));
                                }
                            } else {
                                header("Location: subscribers.php?do=Edit&msg=sizeError");

                            }
                        } else {
                            header("Location: subscribers.php?do=Edit&msg=typeError");
                        }


                    } else {
                        header("Location: subscribers.php?do=Edit&msg=passError");
                    }
                } else if (!empty($password) && empty($image_name)) {
                    if ($password == $rePassword) {
                        $hashedPass = sha1($password);


                        $userInfoQuery = "UPDATE subscriber SET sub_name='$fullname', sub_email='$email', sub_password='$hashedPass', sub_phone='$phone', sub_status='$status' where sub_id ='$bloggerUpdateID'";

                        $userInfoSql = mysqli_query($db, $userInfoQuery);
                        if ($userInfoSql) {
                            header("Location: subscribers.php?do=Manage&msg=updateSuccess");
                        } else {
                            die("Error" . mysqli_error($db));
                        }


                    } else {
                        header("Location: subscribers.php?do=Edit&msg=passError");
                    }

                } else if (empty($password) && !empty($image_name)) {


                    if (in_array($actualImgExtension, $allowedImgExtension)) {
                        if ($image_size < 500000) {
                            $photo = rand(0, 1000000000000) . '_' . $image_name;
                            move_uploaded_file($image_tmp, "image/sub/" . $photo);

                            //delete existing image from storage

                            $imageDel = "SELECT * from subscriber where sub_id ='$bloggerUpdateID'";
                            $imageDelSql = mysqli_query($db, $imageDel);

                            while ($row = mysqli_fetch_assoc($imageDelSql)) {
                                $existingImg = $row['sub_image'];
                            }
                            unlink("image/sub/" . $existingImg);

                            $userInfoQuery = "UPDATE subscriber SET sub_name='$fullname', sub_email='$email', sub_phone='$phone', sub_status='$status', sub_image='$photo' where sub_id ='$bloggerUpdateID'";

                            $userInfoSql = mysqli_query($db, $userInfoQuery);
                            if ($userInfoSql) {
                                header("Location: subscribers.php?do=Manage&msg=updateSuccess");
                            } else {
                                die("Error" . mysqli_error($db));
                            }
                        } else {
                            header("Location: subscribers.php?do=Edit&msg=sizeError");

                        }
                    } else {
                        header("Location: subscribers.php?do=Edit&msg=typeError");
                    }


                } else if (empty($password) && empty($image_name)) {


                    $userInfoQuery = "UPDATE subscriber SET sub_name='$fullname', sub_email='$email',  sub_phone='$phone', sub_status='$status' where sub_id ='$bloggerUpdateID'";

                    $userInfoSql = mysqli_query($db, $userInfoQuery);
                    if ($userInfoSql) {
                        header("Location: subscribers.php?do=Manage&msg=updateSuccess");
                    } else {
                        die("Error" . mysqli_error($db));
                    }


                }


            }

        } else if ($do == 'Delete') {
            if (isset($_GET['id'])) {
                $bloggerDelID = $_GET['id'];
                //delete existing image from storage

                $imageDel = "SELECT * from subscriber where sub_id ='$bloggerDelID'";
                $imageDelSql = mysqli_query($db, $imageDel);

                while ($row = mysqli_fetch_assoc($imageDelSql)) {
                    $existingImg = $row['sub_image'];
                }
                unlink("image/sub/" . $existingImg);


                $bloggerDelete = "DELETE from subscriber where sub_id = '$bloggerDelID'";
                $fireBloggerDelete = mysqli_query($db, $bloggerDelete);


                if ($fireBloggerDelete) {
                    header("Location: subscribers.php?do=Manage&msg=deleteSuccess");
                } else {
                    header("Location: subscribers.php?do=Manage&msg=deleteUnsuccess");
                }

            }

        }


        ?>

    </div>
    <!-- /.content-header -->


<?php include 'inc/footer.php'; ?>