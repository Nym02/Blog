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
                            <?php
                            $catQuery = "SELECT * from category order by id desc";
                            $catSql = mysqli_query($db, $catQuery);
                            $totalCatRow = mysqli_num_rows($catSql);
                            $i = 0;
                            if ($totalCatRow == 0) {
                                echo "No Category Available";
                            } else {





                            ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#SL.</th>
                                                <th>Category Name</th>
                                                <th>Category Status</th>
                                                <th>Action</th>

                                            </tr>
                                            <?php

                                            while ($row = mysqli_fetch_assoc($catSql)) {
                                                $id         = $row['id'];
                                                $cat_name   = $row['cat_name'];
                                                $cat_desc   = $row['cat_desc'];
                                                $cat_status = $row['cat_status'];


                                                $i++;
                                            ?>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $cat_name; ?></td>
                                                <td><?php if ($cat_status == 1) { ?>
                                                        <span class="badge badge-success">Active</span>
                                                    <?php } else if ($cat_status == 0) { ?>
                                                        <span class="badge badge-danger">In-Active</span>
                                                    <?php } ?></td>
                                                <td>

                                                    <div class="action-bar">
                                                        <ul class="list">
                                                            <li class="list-item" title="Edit"><a class="list-link" href="category.php?do=Edit&id=<?php echo $id; ?>"><i class="fa fa-edit text-info"></i></a></li>
                                                            <li class="list-item"><a href="" class="list-link" title="Delete" data-toggle="modal" data-target="#delete<?php echo $id; ?>"><i class="fa fa-trash text-danger"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>

                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this category?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="btn-group">
                                                                <a href="category.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
                                                                <a href="#" data-dismiss="modal" class="btn btn-success">No</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </tbody>
                                <?php
                                            }
                                        }
                                ?>
                                    </table>
                                </div>


                        </div>
                    </div>
                </div>
            </section>
        <?php } else if ($do == 'Add') { ?>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-md-6 m-auto">

                            <div class="card card-info">
                                <div class="card-header">
                                    Add New Category
                                </div>
                                <div class="card-body">
                                    <form action="category.php?do=Insert" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="catName">Category Name</label>
                                            <input type="text" id="catName" name="cat_name" class="form-control" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="catDes">Category Description</label>
                                            <textarea name="cat_desc" id="catDes" cols="30" rows="4" class="form-control"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="catStatus">Category Status</label>
                                            <select name="cat_status" id="catStatus" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">In-Active</option>
                                            </select>

                                        </div>
                                        <input type="submit" value="Add Category" name="add_cat" class="btn btn-info btn-flat">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php  } else if ($do == 'Insert') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $cat_name = mysqli_real_escape_string($db, $_POST['cat_name']);
                $cat_desc = mysqli_real_escape_string($db, $_POST['cat_desc']);
                $cat_status = mysqli_real_escape_string($db, $_POST['cat_status']);


                //category insert query

                $categoryQuery = "INSERT INTO category(cat_name, cat_desc, cat_status) values ('$cat_name', '$cat_desc', '$cat_status')";
                $categorySql = mysqli_query($db, $categoryQuery);

                if ($categorySql) {
                    header("Location: category.php?do=Manage");
                } else {
                    die("Connection Error" . mysqli_error($db));
                }
            }
        } else if ($do == 'Edit') {
            if (isset($_GET['id'])) {
                $editID = $_GET['id'];

                $editQuery = "SELECT * from category where id = '$editID'";
                $editSql = mysqli_query($db, $editQuery);

                while ($row = mysqli_fetch_assoc($editSql)) {
                    $id = $row['id'];
                    $cat_name = $row['cat_name'];
                    $cat_desc = $row['cat_desc'];
                    $cat_status = $row['cat_status']; ?>


                    <div class="row ">
                        <div class="col-md-6 m-auto">

                            <div class="card card-info">
                                <div class="card-header">
                                    Update Category
                                </div>
                                <div class="card-body">
                                    <form action="category.php?do=Update" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="catName">Category Name</label>
                                            <input type="text" id="catName" name="cat_name" class="form-control" value="<?php echo $cat_name; ?>" required autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="catDes">Category Description</label>
                                            <textarea name="cat_desc" id="catDes" cols="30" rows="4" class="form-control"><?php echo $cat_desc; ?></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="catStatus">Category Status</label>
                                            <select name="cat_status" id="catStatus" class="form-control">
                                                <option value="1" <?php if ($cat_status == 1) {
                                                                        echo "selected";
                                                                    } ?>>Active</option>
                                                <option value="0" <?php if ($cat_status == 0) {
                                                                        echo "selected";
                                                                    } ?>>In-Active</option>
                                            </select>

                                        </div>
                                        <input type="hidden" name="updateCategory" value="<?php echo $id; ?>">
                                        <input type="submit" value="Update Category" name="add_cat" class="btn btn-info btn-flat">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

        <?php   }
            }
        } else if ($do == 'Update') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $updateID = $_POST['updateCategory'];
                $cat_name = $_POST['cat_name'];
                $cat_desc = $_POST['cat_desc'];
                $cat_status = $_POST['cat_status'];


                $updateQuery = "UPDATE category SET cat_name ='$cat_name', cat_desc='$cat_desc', cat_status='$cat_status' where id = '$updateID'";
                $updateSql = mysqli_query($db, $updateQuery);

                if ($updateSql) {
                    header("Location: category.php?do=Manage");
                } else {
                    die("Connection Error" . mysqli_error($db));
                }
            }
        } else if ($do == 'Delete') {
            if (isset($_GET['id'])) {
                $delID = $_GET['id'];

                $delQuery = "DELETE from category where id = '$delID'";
                $delSql = mysqli_query($db, $delQuery);

                if ($delSql) {
                    header("Location: category.php?do=Manage");
                } else {
                    die("DConnection Error" . mysqli_error($db));
                }
            }
        }

        ?>



        <?php include("inc/footer.php"); ?>
</body>

</html>