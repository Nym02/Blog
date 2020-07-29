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
                    $postID         = $_GET['post'];


                    $fullPost       = "SELECT * FROM post Where id = '$postID'";
                    $fullPostSql    = mysqli_query($db, $fullPost);

                    while ($row  =  mysqli_fetch_assoc($fullPostSql)) {
                        $id             = $row['id'];
                        $title          = $row['title'];
                        $description    = $row['description'];
                        $tags           = $row['tags'];
                        $image          = $row['image'];
                        $category_id    = $row['category_id'];
                        $author_id      = $row['author_id'];
                        $status         = $row['status'];
                        $post_date      = $row['post_date'];  ?>

                        <div class="blog-single">
                            <!-- Blog Title -->

                            <h3 class="post-title"><?php echo $title; ?></h3>


                            <!-- Blog Categories -->
                            <div class="single-categories">
                                <?php
                                $categoryPost       = "SELECT * FROM category WHERE id = '$category_id'";
                                $categoryPostSql    = mysqli_query($db, $categoryPost);


                                while ($row = mysqli_fetch_assoc($categoryPostSql)) {
                                    $id         = $row['id'];
                                    $cat_name   = $row['cat_name']; ?>
                                    <span><?php echo $cat_name; ?></span>
                                <?php  }

                                ?>


                            </div>

                            <!-- Blog Thumbnail Image Start -->
                            <div class="blog-banner">

                                <?php
                                if (!empty($image)) { ?>
                                    <img src="Admin/image/post/<?php echo $image; ?>" alt="Blog thumbnail">
                                <?php   } else { ?>
                                    <img src="Admin/image/post/blog.jpg" alt="Blog thumbnail">
                                <?php   }


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



                <!-- Single Comment Section Start -->
                <div class="single-comments">
                    <!-- Comment Heading Start -->
                    <div class="row">
                        <div class="col-md-12">
                            <h4>All Latest Comments (3)</h4>
                            <div class="title-border"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                    <!-- Comment Heading End -->

                    <!-- Single Comment Post Start -->
                    <div class="row each-comments">
                        <div class="col-md-2">
                            <!-- Commented Person Thumbnail -->
                            <div class="comments-person">
                                <img src="assets/images/corporate-team/team-1.jpg">
                            </div>
                        </div>

                        <div class="col-md-10 no-padding">
                            <!-- Comment Box Start -->
                            <div class="comment-box">
                                <div class="comment-box-header">
                                    <ul>
                                        <li class="post-by-name">Someone Special</li>
                                        <li class="post-by-hour">20 Hours Ago</li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <!-- Comment Box End -->
                        </div>
                    </div>
                    <!-- Single Comment Post End -->


                    <!-- Comment Reply Post Start -->
                    <div class="row each-comments">
                        <div class="col-md-2 offset-md-2">
                            <!-- Commented Person Thumbnail -->
                            <div class="comments-person">
                                <img src="assets/images/corporate-team/team-2.jpg">
                            </div>
                        </div>

                        <div class="col-md-8 no-padding">
                            <!-- Comment Box Start -->
                            <div class="comment-box">
                                <div class="comment-box-header">
                                    <ul>
                                        <li class="post-by-name">Someone Special</li>
                                        <li class="post-by-hour">20 Hours Ago</li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <!-- Comment Box Start -->
                        </div>
                    </div>
                    <!-- Comment Reply Post End -->

                    <!-- Single Comment Post Start -->
                    <div class="row each-comments">
                        <div class="col-md-2">
                            <!-- Commented Person Thumbnail -->
                            <div class="comments-person">
                                <img src="assets/images/corporate-team/team-1.jpg">
                            </div>
                        </div>

                        <div class="col-md-10 no-padding">
                            <!-- Comment Box Start -->
                            <div class="comment-box">
                                <div class="comment-box-header">
                                    <ul>
                                        <li class="post-by-name">Someone Special</li>
                                        <li class="post-by-hour">20 Hours Ago</li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <!-- Comment Box Start -->
                        </div>
                    </div>
                    <!-- Single Comment Post End -->
                </div>
                <!-- Single Comment Section End -->


                <!-- Post New Comment Section Start -->
                <div class="post-comments">
                    <h4>Post Your Comments</h4>
                    <div class="title-border"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <!-- Form Start -->
                    <form action="" method="" class="contact-form">
                        <!-- Left Side Start -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- First Name Input Field -->
                                <div class="form-group">
                                    <input type="text" name="user-name" placeholder="Your Name" class="form-input" autocomplete="off" required="required">
                                    <i class="fa fa-user-o"></i>
                                </div>
                            </div>
                            <!-- Email Address Input Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email Address" class="form-input" autocomplete="off" required="required">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Left Side End -->

                        <!-- Right Side Start -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Subject Input Field -->
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Subject" class="form-input" autocomplete="off" required="required">
                                    <i class="fa fa-diamond"></i>
                                </div>
                                <!-- Comments Textarea Field -->
                                <div class="form-group">
                                    <textarea name="comments" class="form-input" placeholder="Your Comments Here..."></textarea>
                                    <i class="fa fa-pencil-square-o"></i>
                                </div>
                                <!-- Post Comment Button -->
                                <button type="submit" class="btn-main"><i class="fa fa-paper-plane-o"></i> Post Your Comments</button>
                            </div>
                        </div>
                        <!-- Right Side End -->
                    </form>
                    <!-- Form End -->
                </div>
                <!-- Post New Comment Section End -->
            </div>


            <?php include "inc/sidebar.php"; ?>


        </div>
    </div>
</section>
<!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->


<?php include "inc/footer.php"; ?>