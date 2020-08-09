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
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Post</li>
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
                                <h2 class="card-title">Manage Post</h2>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead class="thead-dark">


                                        <tr>
                                            <th>#SL.</th>
                                            <th>Thumbnail</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $serial = 0;
                                        $post_query = "SELECT * FROM post order by id desc";
                                        $post_sql = mysqli_query($db, $post_query);

                                        while ($row = mysqli_fetch_assoc($post_sql)) {
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            $description = $row['description'];
                                            $tags = $row['tags'];
                                            $image = $row['image'];
                                            $category_id = $row['category_id'];
                                            $author_id = $row['author_id'];
                                            $status = $row['status'];
                                            $post_date = $row['post_date'];

                                            $serial++;


                                            ?>
                                            <tr>
                                                <td><?php echo $serial; ?></td>
                                                <td><?php
                                                    if (!empty($image)) { ?>
                                                        <img src="image/post/<?php echo $image; ?>" alt="thumbnail"
                                                             width="50">

                                                    <?php } else { ?>
                                                        <img src="image/post/blog.jpg" alt="thumbnail" width="50">

                                                    <?php }


                                                    ?></td>
                                                <td><?php echo $title; ?></td>
                                                <td><?php
                                                    $catQuery = "SELECT * FROM category";
                                                    $catSql = mysqli_query($db, $catQuery);
                                                    while ($row = mysqli_fetch_assoc($catSql)) {
                                                        $cat_id = $row['id'];
                                                        $cat_name = $row['cat_name'];


                                                        if ($category_id == $cat_id) {
                                                            echo $cat_name;
                                                        }
                                                    }
                                                    ?></td>

                                                <td><?php echo $_SESSION['full_name']; ?></td>
                                                <td><?php
                                                    if ($status == 1) { ?>
                                                        <span class="badge badge-success">Published</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger">Draft</span>
                                                    <?php }

                                                    ?></td>
                                                <td><?php echo $post_date; ?></td>
                                                <td>
                                                    <div class="action-bar">
                                                        <ul class="list">
                                                            <li class="list-item" title="Edit"><a class="list-link"
                                                                                                  href="post.php?do=Edit&id=<?php echo $id; ?>"><i
                                                                            class="fa fa-edit text-info"></i></a></li>
                                                            <li class="list-item"><a href="#delete<?php echo $id; ?>"
                                                                                     class="list-link" title="Delete"
                                                                                     data-toggle="modal" data-target=""><i
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
                                                                <a href="post.php?do=Delete&id=<?php echo $id; ?>"
                                                                   class="btn btn-danger">Yes</a>
                                                                <a href="#" data-dismiss="modal" aria-label="Close"
                                                                   class="btn btn-success">No</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot class="thead-dark">
                                        <tr>
                                            <th>#SL.</th>
                                            <th>Thumbnail</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>


                                <a href="post.php?do=Add" class="btn btn-info text-center">Add Post</a>
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
                            <li class="breadcrumb-item active">Add New Post</li>
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

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline">
                            <div class="card-header ">
                                <h2 class="card-title">Add New Post</h2>
                            </div>
                            <div class="card-body">
                                <form action="post.php?do=Insert" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="fname">Title</label>
                                                <input type="text" class="form-control" name="title" id="fname"
                                                       autocomplete="off">
                                            </div>
                                            <div class="form-group">

                                                <label for="urole">Category</label>
                                                <select name="category" id="urole" class="form-control">
                                                    <option value="#">Please select a category</option>
                                                    <?php
                                                    $catQuery = "SELECT * FROM category";
                                                    $catSql = mysqli_query($db, $catQuery);
                                                    while ($row = mysqli_fetch_assoc($catSql)) {
                                                        $cat_id = $row['id'];
                                                        $cat_name = $row['cat_name'];
                                                        $cat_desc = $row['cat_desc'];
                                                        $cat_status = $row['cat_status']; ?>
                                                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                                    <?php }

                                                    ?>
                                                </select>


                                            </div>
                                            <div class="form-group">
                                                <label for="ustatus">Status</label>
                                                <select name="status" id="ustatus" class="form-control">
                                                    <option value="1">Published</option>
                                                    <option value="0">Draft</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="uaddress">Tags</label>
                                                <input type="text" class="form-control" name="tags" id="uaddress"
                                                       autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uimage">Thumbnail</label>
                                                <input type="file" name="thumbnail" id="uimage"
                                                       class="form-control-file">
                                            </div>

                                        </div>
                                        <div class="col-md-6">


                                            <div class="form-group">
                                                <label for="postDesc">Description</label>
                                                <textarea name="description" id="postDesc" class="form-control"
                                                          cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn bg-gradient-primary btn-flat"
                                                       name="addPost" value="Add Post">
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
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $description = mysqli_real_escape_string($db, $_POST['description']);
            $category = $_POST['category'];
            $author = $_SESSION['id'];
            $status = $_POST['status'];
            $tags = $_POST['tags'];


            //catching the thumbnail
            $thumb = $_FILES['thumbnail'];
            $thumb_name = $_FILES['thumbnail']['name'];
            $thumb_size = $_FILES['thumbnail']['size'];
            $thumb_type = $_FILES['thumbnail']['type'];
            $thumb_tmpName = $_FILES['thumbnail']['tmp_name'];


            //finiding thumbnail type
            $thumb_ext = explode(".", $thumb_name);
            $thumb_actual_ext = strtolower(end($thumb_ext));

            //allowed thumbnail type
            $thumbnailType = array('jpg', 'jpeg', 'png');


            if (!empty($thumb_name)) {
                if (in_array($thumb_actual_ext, $thumbnailType)) {
                    if ($thumb_size < 5000000) {
                        $actual_photo = rand(0, 5000000) . "_" . $thumb_name;
                        move_uploaded_file($thumb_tmpName, "image/post/" . $actual_photo);

                        $postInsertQuery = "INSERT INTO post(title,description, tags, image, category_id, author_id, status,post_date) VALUES ('$title','$description','$tags','$actual_photo','$category','$author','$status', now())";
                        $postInsertSql = mysqli_query($db, $postInsertQuery);
                        if ($postInsertSql) {
                            header("Location: post.php?do=Manage");
                        } else {
                            die("Error In Insertion" . mysqli_error($db));
                        }
                    } else {
                        header("Location: post.php?do=Add&msg=fileSize");
                    }
                } else {
                    header("Location: post.php?do=Add&msg=fileType");
                }
            } else {
                $postInsertQuery = "INSERT INTO post(title,description, tags,category_id, author_id, status,post_date) VALUES ('$title','$description','$tags','$category','$author','$status', now())";
                $postInsertSql = mysqli_query($db, $postInsertQuery);
                if ($postInsertSql) {
                    header("Location: post.php?do=Manage");
                } else {
                    die("Error In Insertion" . mysqli_error($db));
                }
            }
        }
    } else if ($do == 'Edit') {
        if (isset($_GET['id'])) {
            $editID = $_GET['id'];


            $editPostQuery = "SELECT * FROM post where id = '$editID'";
            $editPostSql = mysqli_query($db, $editPostQuery);

            while ($row = mysqli_fetch_assoc($editPostSql)) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $tags = $row['tags'];
                $image = $row['image'];
                $category_id = $row['category_id'];
                $author_id = $row['author_id'];
                $status = $row['status'];
                $post_date = $row['post_date']; ?>


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
                                    <li class="breadcrumb-item active">Edit Post</li>
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

                        <div class="row">
                            <div class="col-md-12">

                                <div class="card card-primary card-outline">
                                    <div class="card-header ">
                                        <h2 class="card-title">Edit Post</h2>
                                    </div>
                                    <div class="card-body">
                                        <form action="post.php?do=Update" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="fname">Title</label>
                                                        <input type="text" class="form-control" name="title" id="fname"
                                                               autocomplete="off" value="<?php echo $title; ?>"
                                                               required>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="urole">Category</label>
                                                        <select name="category" id="urole" class="form-control">
                                                            <option value="#">Please select a category</option>
                                                            <?php
                                                            $catQuery = "SELECT * FROM category";
                                                            $catSql = mysqli_query($db, $catQuery);
                                                            while ($row = mysqli_fetch_assoc($catSql)) {
                                                                $cat_id = $row['id'];
                                                                $cat_name = $row['cat_name'];
                                                                $cat_desc = $row['cat_desc'];
                                                                $cat_status = $row['cat_status']; ?>
                                                                <option value="<?php echo $cat_id; ?>" <?php if ($cat_id == $category_id) {
                                                                    echo 'selected';
                                                                } ?>><?php echo $cat_name; ?></option>
                                                            <?php }

                                                            ?>
                                                        </select>


                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ustatus">Status</label>
                                                        <select name="status" id="ustatus" class="form-control">
                                                            <option value="1" <?php if ($status == 1) {
                                                                echo 'selected';
                                                            } ?>>Published
                                                            </option>
                                                            <option value="0" <?php if ($status == 0) {
                                                                echo 'selected';
                                                            } ?>>Draft
                                                            </option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uaddress">Tags</label>
                                                        <input type="text" class="form-control" name="tags"
                                                               id="uaddress" autocomplete="off"
                                                               value="<?php echo $tags; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uimage">Thumbnail</label>
                                                        <input type="file" name="thumbnail" id="uimage"
                                                               class="form-control-file">
                                                    </div>

                                                </div>
                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label for="postDesc">Description</label>
                                                        <textarea name="description" id="postDesc" class="form-control"
                                                                  cols="30"
                                                                  rows="10"><?php echo $description; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="updatePostID"
                                                               value="<?php echo $id; ?>">
                                                        <input type="submit" class="btn bg-gradient-primary btn-flat"
                                                               name="updatePost" value="Update Post">
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
        }
    } else if ($do == 'Update') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $updatePostID = $_POST['updatePostID'];
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $description = mysqli_real_escape_string($db, $_POST['description']);
            $category = $_POST['category'];
            $author = $_SESSION['id'];
            $status = $_POST['status'];
            $tags = $_POST['tags'];


            //catching the thumbnail
            $thumb = $_FILES['thumbnail'];
            $thumb_name = $_FILES['thumbnail']['name'];
            $thumb_size = $_FILES['thumbnail']['size'];
            $thumb_type = $_FILES['thumbnail']['type'];
            $thumb_tmpName = $_FILES['thumbnail']['tmp_name'];


            //finiding thumbnail type
            $thumb_ext = explode(".", $thumb_name);
            $thumb_actual_ext = strtolower(end($thumb_ext));

            //allowed thumbnail type
            $thumbnailType = array('jpg', 'jpeg', 'png');


            if ($thumb_name != null) {
                if (in_array($thumb_actual_ext, $thumbnailType)) {
                    if ($thumb_size < 500000) {
                        $actual_photo = rand(0, 5000000) . "_" . $thumb_name;
                        move_uploaded_file($thumb_tmpName, "image/post/" . $actual_photo);


                        //deleting existing thumbnail
                        $delPhoto = "SELECT * from post where id ='$updatePostID'";
                        $delPhotoSql = mysqli_query($db, $delPhoto);

                        while ($row = mysqli_fetch_assoc($delPhotoSql)) {
                            $existingImage = $row['image'];
                        }
                        unlink("image/post/" . $existingImage);

                        $updatePostQuery = "UPDATE post SET title='$title', description='$description', tags='$tags', image='$actual_photo', category_id='$category', author_id='$author', status='$status' where id = '$updatePostID'";


                        $postUpdatetSql = mysqli_query($db, $updatePostQuery);
                        if ($postUpdatetSql) {
                            header("Location: post.php?do=Manage");
                        } else {
                            die("Error In Insertion" . mysqli_error($db));
                        }
                    } else {
                        echo 'File is too large';
                    }
                } else {

                    echo 'File type do not support';
                }
            } else if (empty($thumb_name)) {
                $updatePostQuery = "UPDATE post SET title='$title', description='$description', tags='$tags', category_id='$category', author_id='$author', status='$status' where id = '$updatePostID'";


                $postUpdatetSql = mysqli_query($db, $updatePostQuery);
                if ($postUpdatetSql) {
                    header("Location: post.php?do=Manage");
                } else {
                    die("Error In Insertion" . mysqli_error($db));
                }
            }
        }
    } else if ($do == 'Delete') {
        if (isset($_GET['id'])) {
            $delete_post_id = $_GET['id'];
            //deleting existing thumbnail
            $delPhoto = "SELECT * from post where id ='$updatePostID'";
            $delPhotoSql = mysqli_query($db, $delPhoto);

            while ($row = mysqli_fetch_assoc($delPhotoSql)) {
                $existingImage = $row['image'];
            }
            unlink("image/post/" . $existingImage);


            $delPost = "DELETE FROM post WHERE id = '$delete_post_id'";
            $delPostSql = mysqli_query($db, $delPost);

            if ($delPostSql) {
                header("Location: post.php?do=Manage");
            } else {
                die("Error While Deleting Post" . mysqli_error($db));
            }
        }
    }

    include 'inc/footer.php'; ?>
</div>