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
                                                                            href="updateUser.php?id=<?php echo $sub_id; ?>"><i
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
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" class="form-control" name="fullname">
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


        <?php } else if ($do == 'Insert') {

        } else if ($do == 'Edit') {

        } else if ($do == 'Update') {

        } else if ($do == 'Delete') {

        }


        ?>

    </div>
    <!-- /.content-header -->


<?php include 'inc/footer.php'; ?>