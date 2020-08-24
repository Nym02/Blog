<?php
include "inc/header.php";


?>


    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Single Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="">Blog <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Single Right Sidebar</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>

            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->


    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Single Posts -->
                <div class="col-md-8">
                    <?php
                    if (isset($_GET['post'])) {
                        $postID = $_GET['post'];


                        $fullPost = "SELECT * FROM post Where id = '$postID'";
                        $fullPostSql = mysqli_query($db, $fullPost);

                        while ($row = mysqli_fetch_assoc($fullPostSql)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $description = $row['description'];
                            $tags = $row['tags'];
                            $image = $row['image'];
                            $category_id = $row['category_id'];
                            $author_id = $row['author_id'];
                            $status = $row['status'];
                            $post_date = $row['post_date']; ?>

                            <div class="blog-single">
                                <!-- Blog Title -->

                                <h3 class="post-title"><?php echo $title; ?></h3>


                                <!-- Blog Categories -->
                                <div class="single-categories">
                                    <?php
                                    $categoryPost = "SELECT * FROM category WHERE id = '$category_id'";
                                    $categoryPostSql = mysqli_query($db, $categoryPost);


                                    while ($row = mysqli_fetch_assoc($categoryPostSql)) {
                                        $id = $row['id'];
                                        $cat_name = $row['cat_name']; ?>
                                        <span><?php echo $cat_name; ?></span>
                                    <?php }

                                    ?>


                                </div>

                                <!-- Blog Thumbnail Image Start -->
                                <div class="blog-banner">

                                    <?php
                                    if (!empty($image)) { ?>
                                        <img src="Admin/image/post/<?php echo $image; ?>" alt="Blog thumbnail">
                                    <?php } else { ?>
                                        <img src="Admin/image/post/blog.jpg" alt="Blog thumbnail">
                                    <?php }


                                    ?>

                                </div>
                                <!-- Blog Thumbnail Image End -->

                                <!-- Blog Description Start -->
                                <p><?php echo $description; ?></p>

                                <!-- Blog Description End -->
                            </div>
                        <?php }
                    }


                    ?>
                    <?php
                    if (!empty($_SESSION['sub_name'])) { ?>
                        <!-- Post New Comment Section Start -->
                        <div class="post-comments">
                            <h4>Post Your Comments</h4>
                            <div class="title-border"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            <!-- Form Start -->
                            <form action="" method="POST" class="contact-form">
                                <!-- Right Side Start -->
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- Comments Textarea Field -->
                                        <div class="form-group">
                                        <textarea name="comments" class="form-input"
                                                  placeholder="Your Comments Here..."></textarea>
                                            <i class="fa fa-pencil-square-o"></i>
                                        </div>
                                        <!-- Post Comment Button -->
                                        <button type="submit" name="addComments" class="btn-main"><i
                                                    class="fa fa-paper-plane-o"></i> Post Your
                                            Comments
                                        </button>
                                    </div>
                                </div>
                                <!-- Right Side End -->
                            </form>
                            <!-- Form End -->
                            <?php

                            if (isset($_POST['addComments'])) {
                                $fullname = $_SESSION['sub_name'];

                                $comment = $_POST['comments'];
                                $post_id = $postID;

                                $subID = $_SESSION['sub_id'];
                                //getting subscriber name and image
                                $subscriber = "SELECT * FROM subscriber where sub_id= '$subID'";
                                $fireSubscriber = mysqli_query($db, $subscriber);
                                while($row = mysqli_fetch_assoc($fireSubscriber)){
                                    $subName = $row['sub_name'];
                                    $subImage = $row['sub_image'];
                                }

                                $sql = "INSERT INTO comments(user_fullname, cmnt_description,	post_id,	cmnt_status	, cmnt_img, cmnt_date	) VALUES('$fullname','$comment','$post_id','1', '$subImage',  current_timestamp())";
                                $query = mysqli_query($db, $sql);

                                if ($query) {
                                    header("Location: single.php?post=$postID&msg=commentAdded");
                                } else {
                                    die("Error while posting comment" . mysqli_error($db));
                                }
                            }
                            ?>
                        </div>
                        <!-- Post New Comment Section End -->
                        <?php


                    } else { ?>
                        <br>
                        <a href="login.php?post=<?php echo $postID; ?>" class="alert alert-info mt-5">Login to post
                            comments.</a>
                        <?php


                    }


                    ?>
                    <!-- Single Comment Section Start -->
                    <div class="single-comments">
                        <!-- Comment Heading Start -->
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $showComments = "SELECT * FROM comments where post_id ='$postID' AND cmnt_status = 1 AND reply_id = 0 order by cmnt_id asc";
                                $fireShowComments = mysqli_query($db, $showComments);
                                $totalComments = mysqli_num_rows($fireShowComments);

                                ?>
                                <h4>All Latest Comments (<?php echo $totalComments; ?>)</h4>
                                <div class="title-border"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            </div>
                        </div>
                        <!-- Comment Heading End -->
                        <?php if ($totalComments == 0) {
                            echo '<div class="alert alert-warning mt-5">No comments to show.</div>';
                        } else {
                            while ($row = mysqli_fetch_assoc($fireShowComments)) {
                                $cmnt_id = $row['cmnt_id'];
                                $cmnt_name = $row['user_fullname'];
                                $cmnt_des = $row['cmnt_description'];
                                $cmnt_postId = $row['post_id'];
                                $cmnt_status = $row['cmnt_status'];
                                $cmnt_img = $row['cmnt_img'];
                                $cmnt_date = $row['cmnt_date'];



                                ?>


                                <!-- Single Comment Post Start -->
                                <div class="row each-comments">
                                    <div class="col-md-2">
                                        <!-- Commented Person Thumbnail -->
                                        <div class="comments-person">
                                            <?php
                                                if(!empty($cmnt_img)){ ?>
                                                    <img src="Admin/image/sub/<?php echo $cmnt_img; ?>">
                                                <?php    } else { ?>
                                                    <img src="Admin/image/sub/p.png" >
                                                <?php    }

                                            ?>

                                        </div>
                                    </div>

                                    <div class="col-md-10 no-padding">
                                        <!-- Comment Box Start -->
                                        <div class="comment-box">
                                            <div class="comment-box-header">
                                                <ul>
                                                    <li class="post-by-name"><?php echo $cmnt_name; ?></li>
                                                    <li class="post-by-hour">20 Hours Ago</li>
                                                </ul>
                                            </div>
                                            <p><?php echo $cmnt_des; ?></p>
                                        </div>
                                        <!-- Comment Box End -->
                                        <?php
                                        if(!empty($_SESSION['sub_id'])){ ?>
                                            <a href="" data-target="#collapseExample<?php echo $cmnt_id; ?>"
                                               data-toggle="collapse"
                                               role="button" aria-expanded="false" aria-controls="collapseExample"><i
                                                        class="fa fa-comments"> </i> Reply</a>
                                       <?php }

                                        ?>



                                        <!-- Form Start -->
                                        <form action="reply.php" method="POST" class="contact-form collapse"
                                              id="collapseExample<?php echo $cmnt_id; ?>">


                                            <!-- Right Side Start -->
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <!-- Comments Textarea Field -->
                                                    <div class="form-group">
                                                <textarea name="reply" class="form-input"
                                                          placeholder="Your Reply Here..." col="20" rows="1"></textarea>
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </div>
                                                    <!-- Post Comment Button -->
                                                    <input type="hidden" name="postID" value="<?php echo $postID; ?>">
                                                    <input type="hidden" name="replyID" value="<?php echo $cmnt_id; ?>">

                                                    <button type="submit" name="addReply" class="btn-main"><i
                                                                class="fa fa-paper-plane-o"></i> Reply
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Right Side End -->
                                        </form>
                                        <!-- Form End -->

                                    </div>
                                </div>
                                <!-- Single Comment Post End -->

                                <?php
                                $getReply = "SELECT * FROM comments WHERE reply_id != 0 AND reply_id = '$cmnt_id'";

                                $fireGetReply = mysqli_query($db, $getReply);

                                while ($row = mysqli_fetch_assoc($fireGetReply)) {
                                    $reply_id = $row['cmnt_id'];
                                    $reply_name = $row['user_fullname'];
                                    $reply_des = $row['cmnt_description'];
                                    $reply_postId = $row['post_id'];
                                    $reply_status = $row['cmnt_status'];
                                    $reply_img = $row['cmnt_img'];
                                    $reply_date = $row['cmnt_date']; ?>
                                    <!-- Comment Reply Post Start -->
                                    <div class="row each-comments">
                                        <div class="col-md-2 offset-md-2">
                                            <!-- Commented Person Thumbnail -->
                                            <div class="comments-person">
                                                <?php
                                                if(!empty($reply_img)){ ?>
                                                    <img src="Admin/image/sub/<?php echo $reply_img; ?>">
                                                <?php    } else { ?>
                                                <img src="Admin/image/sub/p.png" >
                                                <?php    }

                                                ?>

                                            </div>
                                        </div>

                                        <div class="col-md-8 no-padding">
                                            <!-- Comment Box Start -->
                                            <div class="comment-box">
                                                <div class="comment-box-header">
                                                    <ul>
                                                        <li class="post-by-name"><?php echo $reply_name; ?></li>
                                                        <li class="post-by-hour">20 Hours Ago</li>
                                                    </ul>
                                                </div>
                                                <p><?php echo $reply_des; ?></p>
                                            </div>
                                            <!-- Comment Box Start -->
                                        </div>
                                    </div>
                                    <!-- Comment Reply Post End -->
                                <?php }


                                ?>


                            <?php }

                        }


                        ?>

                    </div>
                    <!-- Single Comment Section End -->

                </div>


                <?php include "inc/sidebar.php"; ?>


            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->


<?php include "inc/footer.php"; ?>

<script>
    <?php
    if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    if($msg == 'loginSuccess'){ ?>
    toastr.success("Login Successful");
    <?php } else if($msg == 'commentAdded'){ ?>
    toastr.success("Comment Added Successfully.");
   <?php }else if($msg == 'replySuccess'){ ?>
    toastr.success("Reply Added Successfully.");
   <?php }else if($msg == 'replyUnsuccess'){ ?>
    toastr.error("Reply was not added.");
   <?php }
    }


    ?>

</script>
