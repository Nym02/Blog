<?php
include "inc/header.php";

?>
<?php
include "access.php";

?>
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li>
                                <a href="index.html">Home <i class="fa fa-angle-double-right"></i></a>
                            </li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Blog</li>
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
                <!-- Blog Posts Start -->
                <div class="col-md-8">
                    <?php
                    if (isset($_GET['id'])) {
                        $postID = $_GET['id'];

                        $postCategory = "SELECT * FROM post WHERE category_id = '$postID' order by id desc";
                        $postCategorySql = mysqli_query($db, $postCategory);
                        $totalCategory = mysqli_num_rows($postCategorySql);


                        while ($row = mysqli_fetch_assoc($postCategorySql)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $description = $row['description'];
                            $tags = $row['tags'];
                            $image = $row['image'];
                            $category_id = $row['category_id'];
                            $author_id = $row['author_id'];
                            $status = $row['status'];
                            $post_date = $row['post_date'];

                            $postCategory1 = "SELECT * FROM post WHERE category_id = '$postID' AND status = '0'";
                            $postCategorySql1 = mysqli_query($db, $postCategory1);
                            $totalCategory1 = mysqli_num_rows($postCategorySql1);


                            ?>


                            <!-- Single Item Blog Post End -->
                            <!-- Blog Paginetion Design Start -->
                            <!--                                <div class="paginetion">-->
                            <!--                                    <ul>-->
                            <!--                                        Next Button -->
                            <!--                                        <li class="blog-prev">-->
                            <!--                                            <a href=""><i class="fa fa-long-arrow-left"></i> Previous</a>-->
                            <!--                                        </li>-->
                            <!--                                        <li><a href="">1</a></li>-->
                            <!--                                        <li><a href="">2</a></li>-->
                            <!--                                        <li class="active"><a href="">3</a></li>-->
                            <!--                                        <li><a href="">4</a></li>-->
                            <!--                                        <li><a href="">5</a></li>-->
                            <!--                                       Previous Button -->
                            <!--                                        <li class="blog-next">-->
                            <!--                                            <a href=""> Next <i class="fa fa-long-arrow-right"></i></a>-->
                            <!--                                        </li>-->
                            <!--                                    </ul>-->
                            <!--                                </div>-->
                            <!-- Blog Paginetion Design End -->


                        <?php }


                        $postCategory2 = "SELECT * FROM post WHERE category_id = '$postID' order by id desc";
                        $postCategorySql2 = mysqli_query($db, $postCategory2);
                        $totalCategory2 = mysqli_num_rows($postCategorySql2);
                        if ($totalCategory2 == 0) {
                            echo '<div class="alert alert-danger">Sorry!!! No post availabe.</div>';
                        } else if ($totalCategory2 == $totalCategory1) {
                            echo '<div class="alert alert-danger">Sorry!!! No post availabe.</div>';
                        } else {
                            while ($row = mysqli_fetch_assoc($postCategorySql2)) {
                                $idd = $row['id'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $tags = $row['tags'];
                                $image = $row['image'];
                                $category_id = $row['category_id'];
                                $author_id = $row['author_id'];
                                $sub_id = $row['sub_id'];
                                $status = $row['status'];
                                $post_date = $row['post_date'];


                                if ($status == 0) { ?>

                                <?php } else { ?>
                                    <!-- Single Item Blog Post Start -->
                                    <div class="blog-post">
                                        <!-- Blog Banner Image -->
                                        <div class="blog-banner">
                                            <a href="single.php?post=<?php echo $idd; ?>">
                                                <?php
                                                if (!empty($image)) { ?>
                                                    <img src="Admin/image/post/<?php echo $image; ?>"
                                                         alt="Blog thumbnail">
                                                <?php } else { ?>
                                                    <img src="Admin/image/post/blog.jpg" alt="Blog thumbnail">
                                                <?php }


                                                ?>

                                                <!-- Post Category Names -->
                                                <div class="blog-category-name">
                                                    <?php
                                                    $categoryPost = "SELECT * FROM category WHERE id = '$category_id'";
                                                    $categoryPostSql = mysqli_query($db, $categoryPost);


                                                    while ($row = mysqli_fetch_assoc($categoryPostSql)) {
                                                        $id = $row['id'];
                                                        $cat_name = $row['cat_name']; ?>
                                                        <h6><?php echo $cat_name; ?></h6>
                                                    <?php }

                                                    ?>

                                                </div>
                                            </a>
                                        </div>
                                        <!-- Blog Title and Description -->
                                        <div class="blog-description">
                                            <a href="single.php?post=<?php echo $idd; ?>">
                                                <h3 class="post-title">
                                                    <?php echo $title; ?>
                                                </h3>
                                            </a>
                                            <p>
                                                <?php echo substr($description, 0, 300) . ' .......'; ?>
                                            </p>
                                            <!-- Blog Info, Date and Author -->
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="blog-info">
                                                        <ul>
                                                            <li><i class="fa fa-calendar"></i><?php
                                                                $PostDate = explode(" ", $post_date);
                                                                $actualPostDate = $PostDate[0];

                                                                echo $actualPostDate; ?></li>
                                                            <li><i class="fa fa-user"></i>


                                                                <?php

                                                                if (!empty($author_id) && empty($sub_id)) {
                                                                    //getting author name
                                                                    $postAuthor1 = "SELECT * FROM users where id = '$author_id'";
                                                                    $firePostAuthor1 = mysqli_query($db, $postAuthor1);
                                                                    while ($row = mysqli_fetch_array($firePostAuthor1)) {
                                                                        $authorName = $row['full_name'];
                                                                        echo "by-" . $authorName;
                                                                    }
                                                                } else if (empty($author_id) && !empty($sub_id)) {
                                                                    //getting author name
                                                                    $postAuthor1 = "SELECT * FROM subscriber where sub_id = '$sub_id'";
                                                                    $firePostAuthor1 = mysqli_query($db, $postAuthor1);
                                                                    while ($row = mysqli_fetch_array($firePostAuthor1)) {
                                                                        $authorName = $row['sub_name'];
                                                                        echo "by-" . $authorName;
                                                                    }
                                                                } else if (!empty($author_id) && !empty($sub_id)) {
                                                                    //getting author name
                                                                    $postAuthor1 = "SELECT * FROM subscriber where sub_id = '$sub_id'";
                                                                    $firePostAuthor1 = mysqli_query($db, $postAuthor1);
                                                                    while ($row = mysqli_fetch_array($firePostAuthor1)) {
                                                                        $authorName = $row['sub_name'];
                                                                        echo "by-" . $authorName;
                                                                    }
                                                                }

                                                                ?>


                                                            </li></li>
                                                            <li><i class="fa fa-heart"></i>(50)</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 read-more-btn">
                                                    <a href="single.php?post=<?php echo $idd; ?>" class="btn-main">
                                                        Read More <i class="fa fa-angle-double-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>


                            <?php }
                        }

                    }


                    ?>


                </div>

                <?php include "inc/sidebar.php"; ?>
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->

<?php include "inc/footer.php"; ?>