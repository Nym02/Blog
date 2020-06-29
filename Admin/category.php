<?php include("inc/header.php"); ?>
<?php include("inc/topbar.php"); ?>
<?php include("inc/sidebar-menu.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
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
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <?php

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Manage') { ?>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <?php } else if ($do == 'Add') { ?>
        <!-- /.content-header -->

        <!-- <section class="content">
            <div class="container-fluid">
                
                <div class="row ">
                    <div class="col-md-6 m-auto">

                        <div class="card card-info">
                            <div class="card-header">
                                Add New Category
                            </div>
                            <div class="card-body">
                                <form action="" method="" enctype="">
                                    <div class="form-group">
                                        <label for="catName">Category Name</label>
                                        <input type="text" id="catName" name="cat_name" class="form-control" required
                                            autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="catDes">Category Description</label>
                                        <textarea name="cat_des" id="catDes" cols="30" rows="4"
                                            class="form-control"></textarea>

                                    </div>
                                    <input type="submit" value="Add Category" name="add_cat"
                                        class="btn btn-info btn-flat">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <?php  } else if ($do == 'Insert') {
        } else if ($do == 'Update') {
        } else if ($do == 'Delete') {
        }

        ?>



        <?php include("inc/footer.php"); ?>
</body>

</html>