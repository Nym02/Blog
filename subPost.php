<?php include "inc/header.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-5 mb-5">
        <!-- Content Header (Page header) -->
        <div class="row">
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


        <?php

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Manage') { ?>


            <!-- Body content starts  -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <!-- card design start  -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    Manage Post
                                </div>
                                <div class="card-body mt-0">

                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                               style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>#SL.</th>
                                                <th>Thumbnail</th>
                                                <th>Title</th>
                                                <th>Body</th>
                                                <th>Category</th>
                                                <th>Author Name</th>
                                                <th>Tags</th>
                                                <th>Status</th>
                                                <th>Published</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 0;
                                            $getSubID = $_SESSION['sub_id'];
                                            $blogger = "SELECT * FROM subscriber where sub_id = '$getSubID'";
                                            $fireBlogger = mysqli_query($db, $blogger);

                                            while ($row = mysqli_fetch_array($fireBlogger)) {
                                                $bloggername = $row['sub_name'];
                                            }

                                            $getSubPost = "SELECT * FROM post where sub_id = '$getSubID' order by id desc";
                                            $fireGetSubPost = mysqli_query($db, $getSubPost);

                                            while ($row = mysqli_fetch_array($fireGetSubPost)) {
                                                $bgPostID = $row['id'];
                                                $bgPostTitle = $row['title'];
                                                $bgPostBody = $row['description'];
                                                $bgPostTag = $row['tags'];
                                                $bgPostThumb = $row['image'];
                                                $bgPostCategory = $row['category_id'];
                                                $bgPostAuthor = $bloggername;
                                                $bgPostStatus = $row['status'];
                                                $bgPostDate = $row['post_date'];
                                                $i = $i + 1; ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php
                                                        if (!empty($bgPostThumb)) { ?>
                                                            <img src="Admin/image/post/<?php echo $bgPostThumb; ?>"
                                                                 width="50" alt="">
                                                        <?php } else { ?>
                                                            <img src="Admin/image/post/blog.jpg" width="50"
                                                                 alt="">

                                                        <?php }


                                                        ?></td>
                                                    <td><?php echo $bgPostTitle; ?></td>
                                                    <td class="text-justify"><?php echo substr($bgPostBody, 0, 100) . "......."; ?></td>
                                                    <td>
                                                        <?php
                                                        $bloggerPostCat = "SELECT * FROM category";
                                                        $fireBloggerPostCat = mysqli_query($db, $bloggerPostCat);

                                                        while ($row = mysqli_fetch_assoc($fireBloggerPostCat)) {
                                                            $bgCatID = $row['id'];
                                                            $bgCatName = $row['cat_name'];
                                                            if ($bgPostCategory == $bgCatID) {
                                                                echo $bgCatName;
                                                            }
                                                        }


                                                        ?>
                                                    </td>
                                                    <td><?php echo $bgPostAuthor; ?></td>
                                                    <td><?php echo $bgPostTag; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($bgPostStatus == 1) { ?>
                                                            <span class="badge badge-success">Published</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-danger">Draft</span>
                                                        <?php }

                                                        ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                        $postDate = explode(" ", $bgPostDate);
                                                        $actualPostDate = $postDate[0];
                                                        echo $actualPostDate;

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="#" data-toggle="modal"
                                                               data-target="#view<?php echo $bgPostID; ?>"
                                                               class="btn btn-sm btn-info">View</a>
                                                            <a href="" data-toggle="modal" data-target="#edit<?php echo $bgPostID; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal"
                                                               data-target="#delete<?php echo $bgPostID; ?>">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!--view modal-->

                                                <div class="modal fade" id="view<?php echo $bgPostID; ?>" tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">View
                                                                    Post</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">




                                                                    <span><strong><?php echo $bgPostTitle; ?></strong></span>
                                                                    <hr>
                                                                    <p><?php echo $bgPostBody; ?></p>





                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Delete modal-->

                                                <div class="modal fade" id="delete<?php echo $bgPostID; ?>"
                                                     tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Want to delete this post?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="btn-group">
                                                                    <a href="subPost.php?do=Delete&id=<?php echo $bgPostID; ?>" class="btn btn-danger">Yes</a>
                                                                    <a href="" class="btn btn-success" data-dismiss="modal"
                                                                       aria-label="Close">No</a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Edit modal-->

                                                <div class="modal fade" id="edit<?php echo $bgPostID; ?>"
                                                     tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <label for="">Post Title</label>
                                                                        <input type="text" class="form-control" value="<?php echo $bgPostTitle; ?>">
                                                                    </div> <div class="form-group">
                                                                        <label for="">Post Title</label>
                                                                        <input type="text" class="form-control">
                                                                    </div> <div class="form-group">
                                                                        <label for="">Post Title</label>
                                                                        <input type="text" class="form-control">
                                                                    </div> <div class="form-group">
                                                                        <label for="">Post Title</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Post Title</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            <?php }


                                            ?>


                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#SL.</th>
                                                <th>Thumbnail</th>
                                                <th>Title</th>
                                                <th>Body</th>
                                                <th>Category</th>
                                                <th>Author Name</th>
                                                <th>Tags</th>
                                                <th>Status</th>
                                                <th>Published</th>
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


            <!-- Body content starts  -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <!-- card design start  -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    Add Post
                                </div>
                                <div class="card-body mt-0">
                                    <form action="subPost.php?do=Insert" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-8 m-auto">
                                                <div class="form-group">
                                                    <label for="">Post Title</label>
                                                    <input type="text" class="form-control" name="postTitle">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Post Category</label>
                                                    <select name="postCategory" id="" class="form-control">
                                                        <option value="">Select a post category</option>
                                                        <?php
                                                        $postCat = "SELECT * FROM category order by id asc";
                                                        $firePostCat = mysqli_query($db, $postCat);

                                                        while ($row = mysqli_fetch_assoc($firePostCat)) {
                                                            $catID = $row['id'];
                                                            $catName = $row['cat_name']; ?>

                                                            <option value="<?php echo $catID; ?>"><?php echo $catName; ?></option>
                                                        <?php }


                                                        ?>

                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label for="">Post Status</label>
                                                    <select class="form-control" name="postStatus" id="">
                                                        <option value="">Select post status</option>
                                                        <option value="0">Draft</option>
                                                        <option value="1">Publish</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Post Tags</label>
                                                    <input type="text" name="postTag" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Post Body</label>
                                                    <textarea name="postBody" id="" cols="30" rows="10"
                                                              class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Post Thumbnail</label>
                                                    <input type="file" name="postThumb" class="form-control-file">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="addPost" class="btn btn-info"
                                                           value="Add Post">
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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $post_title = mysqli_real_escape_string($db, $_POST['postTitle']);
                $post_category = $_POST['postCategory'];
                $post_status =  $_POST['postStatus'];
                $post_tag = mysqli_real_escape_string($db, $_POST['postTag']);
                $post_body = mysqli_real_escape_string($db, $_POST['postBody']);


                $post_thumb = $_FILES['postThumb'];
                $post_thumb_name = $_FILES['postThumb']['name'];
                $post_thumb_size = $_FILES['postThumb']['size'];
                $post_thumb_type = $_FILES['postThumb']['type'];
                $post_thumb_tmp = $_FILES['postThumb']['tmp_name'];

                $thumbExtenstion = explode(".", $post_thumb_name);
                $actualThumbExtension = strtolower(end($thumbExtenstion));

                $allowedThumbExtension = array("jpg", "jpeg", "png");

                $post_subID = $_SESSION['sub_id'];


                if (!empty($post_thumb_name)) {
                    if (in_array($actualThumbExtension, $allowedThumbExtension)) {
                        if ($post_thumb_size < 500000) {

                            $thumbnail = uniqid('PostThumbnail') . "_" . $post_thumb_name;
                            move_uploaded_file($post_thumb_tmp, 'Admin/image/sub/subPost/' . $thumbnail);


                            //insert post data in post table

                            $subPost = "INSERT INTO post(title, description, tags, image, category_id, sub_id, status, post_date) VALUES ('$post_title', '$post_body','$post_tag', '$thumbnail', '$post_category', '$post_subID','$post_status', current_timestamp() )";

                            $fireSubPost = mysqli_query($db, $subPost);


                            if ($fireSubPost) {
                                header("Location: subPost.php?do=Manage");
                            } else {
                                header("Location: subPost.php?do=Add&msg=postAddUnsuccess&title=$post_title&category=$post_category&status=$post_status&tag=$post_tag&body=$post_body");
                            }

                        } else {
                            header("Location: subPost.php?do=Add&msg=sizeError&title=$post_title&category=$post_category&status=$post_status&tag=$post_tag&body=$post_body");
                        }

                    } else {
                        header("Location: subPost.php?do=Add&msg=typeError&title=$post_title&category=$post_category&status=$post_status&tag=$post_tag&body=$post_body");
                    }

                } else if(empty($post_thumb_name)) {
                    //insert post data in post table

                    $subPost = "INSERT INTO post(title, description, tags, category_id, sub_id, status, post_date) VALUES ('$post_title', '$post_body','$post_tag', '$post_category', '$post_subID', '$post_status', current_timestamp() )";
                    $fireSubPost = mysqli_query($db, $subPost);

                    if ($fireSubPost) {
                        header("Location: subPost.php?do=Manage");
                    } else {
                        header("Location: subPost.php?do=Add&msg=postAddUnsuccess&title=$post_title&category=$post_category&status=$post_status&tag=$post_tag&body=$post_body");
                    }
                }


            }

        } else if ($do == 'Edit') {

        } else if ($do == 'Update') {

        } else if ($do == 'Delete') {

        }

        ?>

    </div>
    <!-- /.content-header -->


<?php include 'inc/footer.php'; ?>