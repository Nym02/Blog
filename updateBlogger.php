<?php
include "inc/header.php";

?>

<body>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="row mt-5">
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

    <!-- Body content starts  -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-6  m-auto">
                    <!-- card design start  -->
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h4 class="card-title">Update Profile Info</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['id'])) {
                                $editID = $_GET['id'];


                                $editSubInfo = "SELECT * FROM subscriber WHERE sub_id = '$editID'";
                                $fireEditSubInfo = mysqli_query($db, $editSubInfo);

                                while ($row = mysqli_fetch_assoc($fireEditSubInfo)) {
                                    $sub_id = $row['sub_id'];
                                    $full_name = $row['sub_name'];
                                    $username = $row['sub_username'];
                                    $email = $row['sub_email'];
                                    $phone = $row['sub_phone'];
                                    $status = $row['sub_status'];
                                    $image = $row['sub_image'];
                                    $join_date = $row['sub_date']; ?>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" name="bgFullname" class="form-control" value="<?php echo $full_name; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" name="bgUsername" class="form-control" value="<?php echo $username;  ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="bgEmail" class="form-control" value="<?php echo $email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="bgPassword" class="form-control" placeholder="Enter New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="bgRePassword" class="form-control" placeholder="Confirm New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" name="bgPhone" class="form-control" value="<?php echo $phone;  ?>">
                                        </div>
                                        <label for="">Image</label>
                                        <div class="custom-file mb-4">

                                            <input type="file" name="profileImg" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="updateSubID" value="<?php echo $sub_id; ?>">
                                            <input type="submit" name="updateSubscriber" value="Save Changes">
                                        </div>
                                        <!--                                notification-->
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    </form>
                                <?php }
                            }


                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $updateSubID = $_POST['updateSubID'];
                                $subFullname = mysqli_real_escape_string($db, $_POST['bgFullname']);
                                $subEmail = mysqli_real_escape_string($db, $_POST['bgEmail']);
                                $subPassword = mysqli_real_escape_string($db, $_POST['bgPassword']);
                                $subRePassword = mysqli_real_escape_string($db, $_POST['bgRePassword']);
                                $subPhone = mysqli_real_escape_string($db, $_POST['bgPhone']);

                                $image = $_FILES['profileImg'];
                                $image_name = $_FILES['profileImg']['name'];
                                $image_size = $_FILES['profileImg']['size'];
                                $image_type = $_FILES['profileImg']['type'];
                                $image_tmpName = $_FILES['profileImg']['tmp_name'];

                                $imgExt = explode(".", $image_name);
                                $actualImgExt = strtolower(end($imgExt));

                                $allowedExt = array("jpg","jpeg","png");


                                if(!empty($subPassword) && !empty($image_name)){
                                    if($subPassword == $subRePassword){
                                        $hashedPass = sha1($subPassword);
                                        if(in_array($actualImgExt, $allowedExt)){
                                            if($image_size < 50000){
                                                $actualProfileImg = uniqid("updateBlogger"). "_". $image_name;
                                                move_uploaded_file($image_tmpName, "Admin/image/sub/" . $actualProfileImg);

                                                //delete existing image
                                                $delImg = "SELECT * FROM subscriber WHERE sub_id = '$updateSubID'";
                                                $fireDelImg = mysqli_query($delImg);

                                                while($row = mysqli_fetch_assoc($fireDelImg)){
                                                    $existingImg = $row['sub_image'];
                                                }
                                                unlink("Admin/image/sub/" . $existingImg);

                                                $updateInfo = "UPDATE subscriber SET sub_name='$subFullname', sub_email= '$subEmail', sub_password = '$hashedPass', sub_phone='$subPhone', sub_image='$actualProfileImg' WHERE sub_id = '$updateSubID'";
                                                $updateInfoQuery = mysqli_query($db, $updateInfo);

                                                if($updateInfoQuery){
                                                    header("Location: profile.php?msg=updateSuccess");
                                                } else {
                                                    header("Location: updateBlogger.php?id=$updateSubID&msg=updateError");
                                                }

                                            } else{
                                                header("Location: updateBlogger.php?id=$updateSubID&msg=fileError");
                                            }

                                        } else {
                                            header("Location: updateBlogger.php?id=$updateSubID&msg=typeError");
                                        }
                                    } else {
                                        header("Location: updateBlogger.php?id=$updateSubID&msg=passnotmatch");
                                    }
                                } else if(empty($subPassword) && !empty($image_name)){
                                    if(in_array($actualImgExt, $allowedExt)){
                                        if($image_size < 500000){
                                            $actualProfileImg = uniqid("updateBlogger"). "_". $image_name;
                                            move_uploaded_file($image_tmpName, "Admin/image/sub/" . $actualProfileImg);

                                            //delete existing image
                                            $delImg = "SELECT * FROM subscriber WHERE sub_id = '$updateSubID'";
                                            $fireDelImg = mysqli_query($delImg);

                                            while($row = mysqli_fetch_assoc($fireDelImg)){
                                                $existingImg = $row['sub_image'];
                                            }
                                            unlink("Admin/image/sub/" . $existingImg);

                                            $updateInfo = "UPDATE subscriber SET sub_name='$subFullname', sub_email= '$subEmail',  sub_phone='$subPhone', sub_image='$actualProfileImg' WHERE sub_id = '$updateSubID'";
                                            $updateInfoQuery = mysqli_query($db, $updateInfo);

                                            if($updateInfoQuery){
                                                header("Location: profile.php");
                                            } else {
                                                header("Location: updateBlogger.php?id=$updateSubID&msg=updateError");
                                            }

                                        } else{
                                            header("Location: updateBlogger.php?id=$updateSubID&msg=sizeError");
                                        }

                                    } else {
                                        header("Location: updateBlogger.php?id=$updateSubID&msg=typeError");
                                    }
                                } else if(!empty($subPassword) && empty($image_name)){
                                    if($subPassword == $subRePassword){
                                        $hashedPass = sha1($subPassword);


                                                $updateInfo = "UPDATE subscriber SET sub_name='$subFullname', sub_email= '$subEmail', sub_password = '$hashedPass', sub_phone='$subPhone'WHERE sub_id = '$updateSubID'";
                                                $updateInfoQuery = mysqli_query($db, $updateInfo);

                                                if($updateInfoQuery){
                                                    header("Location: profile.php");
                                                } else {
                                                    header("Location: updateBlogger.php?id=$updateSubID&msg=updateError");
                                                }


                                    } else {
                                        header("Location: updateBlogger.php?msg=passError");
                                    }
                                } else if(empty($subPassword) && empty($image_name)){
                                    $updateInfo = "UPDATE subscriber SET sub_name='$subFullname', sub_email= '$subEmail', sub_phone='$subPhone'WHERE sub_id = '$updateSubID'";
                                    $updateInfoQuery = mysqli_query($db, $updateInfo);

                                    if($updateInfoQuery){
                                        header("Location: profile.php");
                                    } else {
                                        header("Location: updateBlogger.php?id=$updateSubID&msg=updateError");
                                    }
                                }

                            }
                            ?>



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


<!-- JQuery Library File -->
<script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script-->

<!-- Bootstrap JS -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Owl Carousel JS -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- Isotop JS -->
<script src="assets/js/isotop.min.js"></script>

<!-- Fency Box JS -->
<script src="assets/js/jquery.fancybox.min.js"></script>

<!-- Easy Pie Chart JS -->
<script src="assets/js/jquery.easypiechart.js"></script>

<!-- JQuery CounterUp JS -->
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- BlueChip Extarnal Script -->
<script type="text/javascript" src="assets/js/main.js"></script>

<?php ob_end_flush();


?>
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
    toastr.success("Subscriber added successfully.");

    <?php }else if ($msg == 'updateSuccess'){ ?>
    toastr.success("Subscriber info update successfully");

    <?php }else if ($msg == 'deleteSuccess'){ ?>
    toastr.success("Subscriber deleted successfully");
    <?php }
    }

    ?>

</script>
</body>

</html>