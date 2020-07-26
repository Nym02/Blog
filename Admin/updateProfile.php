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
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Update Profile</li>
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
                            <h2 class="card-title">Update Profile Info</h2>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['id'])) {
                                $updateUserID = $_GET['id'];

                                $updateQuery = "SELECT * from users where id = '$updateUserID'";
                                $updateSql = mysqli_query($db, $updateQuery);

                                while ($row = mysqli_fetch_assoc($updateSql)) {
                                    $id                             = $row['id'];
                                    $full_name                       = $row['full_name'];
                                    $username                       = $row['username'];
                                    $email                          = $row['email'];
                                    $password                       = $row['password'];
                                    $phone                          = $row['phone'];
                                    $address                        = $row['address'];
                                    $role                           = $row['role'];
                                    $status                         = $row['status'];
                                    $image                          = $row['image'];
                                    $join_date                      = $row['join_date'];

                            ?>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" name="fullname" class="form-control" value="<?php echo $full_name; ?>">
                                                </div>



                                                <div class="form-group">
                                                    <label for="">Username</label>
                                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                                                </div>


                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Re-type Password</label>
                                                    <input type="password" name="rePassword" class="form-control" placeholder="Confirm Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Phone</label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                                                </div>
                                                <?php if ($role == 1) { ?>
                                                    <div class="form-group">
                                                        <label for="">Role</label>

                                                        <select name="role" id="" class="form-control">
                                                            <option value="1" <?php if ($role == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Admin</option>
                                                            <option value="2" <?php if ($role == 2) {
                                                                                    echo "selected";
                                                                                } ?>>Editor</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="status" id="" class="form-control">
                                                            <option value="0" <?php if ($status == 0) {
                                                                                    echo "selected";
                                                                                } ?>>In-Active</option>
                                                            <option value="1" <?php if ($status == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Active</option>
                                                        </select>
                                                    </div>
                                                <?php   } else if ($role == 2) { ?>
                                                    <div class="form-group">
                                                        <label for="">Role</label>

                                                        <select name="role" id="" class="form-control" disabled>
                                                            <option value="1" <?php if ($role == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Admin</option>
                                                            <option value="2" <?php if ($role == 2) {
                                                                                    echo "selected";
                                                                                } ?>>Editor</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="status" id="" class="form-control" disabled>
                                                            <option value="0" <?php if ($status == 0) {
                                                                                    echo "selected";
                                                                                } ?>>In-Active</option>
                                                            <option value="1" <?php if ($status == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Active</option>
                                                        </select>
                                                    </div>
                                                <?php } ?>



                                                <div class="form-group">
                                                    <label for="">Profile Image</label>
                                                    <input type="file" name="profileImg" class="form-control-file">

                                                    <div class="image-prev mt-4 mb-4">
                                                        <?php
                                                        if (!empty($image)) { ?>
                                                            <img src="image/users/<?php echo $image; ?>" alt="<?php echo $fullname; ?>" width="150">

                                                        <?php } else { ?>
                                                            <img src="image/users/d1.png" alt="<?php echo $fullname; ?>" width="150">
                                                        <?php }

                                                        ?>

                                                    </div>
                                                </div>

                                                <input type="submit" class="btn btn-info" name="updateCurrentUser" value="Update User">
                                            </div>
                                    </form>
                            <?php }
                            } ?>
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


<?php include 'inc/footer.php'; ?>