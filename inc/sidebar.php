 <!-- Blog Right Sidebar -->
 <div class="col-md-4">

     <!-- Latest News -->
     <div class="widget">
         <h4>Latest News</h4>
         <div class="title-border"></div>

         <!-- Sidebar Latest News Slider Start -->
         <div class="sidebar-latest-news owl-carousel owl-theme">
             <!-- First Latest News Start -->
             <?php

                $blogPost             = "SELECT * FROM post  order by id desc limit 3";
                $blogPostSql          = mysqli_query($db, $blogPost);

                while ($row = mysqli_fetch_assoc($blogPostSql)) {
                    $id             = $row['id'];
                    $title          = $row['title'];
                    $description    = $row['description'];
                    $tags           = $row['tags'];
                    $image          = $row['image'];
                    $category_id    = $row['category_id'];
                    $author_id      = $row['author_id'];
                    $status         = $row['status'];
                    $post_date      = $row['post_date']; ?>
                 <div class="item">
                     <div class="latest-news">
                         <!-- Latest News Slider Image -->
                         <div class="latest-news-image">
                             <a href="#">
                                 <?php
                                    if ($image != null) { ?>
                                     <img src="Admin/image/post/<?php echo $image; ?>" alt="Blog Thumbnail">
                                 <?php    } else { ?>
                                     <img src="Admin/image/post/blog.jpg" alt="Blog Thumbnail">
                                 <?php   }

                                    ?>

                             </a>
                         </div>
                         <!-- Latest News Slider Heading -->
                         <h5><?php echo $title;  ?></h5>
                         <!-- Latest News Slider Paragraph -->
                         <p><?php echo substr($description, 0, 100); ?></p>
                     </div>
                 </div>
             <?php  }

                ?>

             <!-- First Latest News End -->


         </div>
         <!-- Sidebar Latest News Slider End -->
     </div>


     <!-- Search Bar Start -->
     <div class="widget">
         <!-- Search Bar -->
         <h4>Blog Search</h4>
         <div class="title-border"></div>
         <div class="search-bar">
             <!-- Search Form Start -->
             <form>
                 <div class="form-group">
                     <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input">
                     <i class="fa fa-paper-plane-o"></i>
                 </div>
             </form>
             <!-- Search Form End -->
         </div>
     </div>
     <!-- Search Bar End -->

     <!-- Recent Post -->
     <div class="widget">
         <h4>Recent Posts</h4>
         <div class="title-border"></div>
         <div class="recent-post">
             <!-- Recent Post Item Content Start -->
             <?php
                $blogPost             = "SELECT * FROM post  order by id desc limit 5";
                $blogPostSql          = mysqli_query($db, $blogPost);

                while ($row = mysqli_fetch_assoc($blogPostSql)) {
                    $id             = $row['id'];
                    $title          = $row['title'];
                    $description    = $row['description'];
                    $tags           = $row['tags'];
                    $image          = $row['image'];
                    $category_id    = $row['category_id'];
                    $author_id      = $row['author_id'];
                    $status         = $row['status'];
                    $post_date      = $row['post_date']; ?>

                 <div class="recent-post-item">
                     <div class="row">
                         <!-- Item Image -->
                         <div class="col-md-4">
                             <?php
                                if ($image != null) { ?>
                                 <img src="Admin/image/post/<?php echo $image; ?>" alt="thumbnail">
                             <?php   } else { ?>
                                 <img src="Admin/image/post/blog.jpg" alt="thumbnail">
                             <?php   }


                                ?>
                         </div>
                         <!-- Item Tite -->
                         <div class="col-md-8 no-padding">
                             <h5><?php echo $title; ?></h5>
                             <ul>
                                 <li><i class="fa fa-clock-o"></i><?php echo $post_date; ?></li>
                                 <li><i class="fa fa-comment-o"></i>15</li>
                             </ul>
                         </div>
                     </div>
                 </div>
             <?php }
                ?>

             <!-- Recent Post Item Content End -->



         </div>
     </div>

     <!-- All Category -->
     <div class="widget">
         <h4>Blog Categories</h4>
         <div class="title-border"></div>
         <!-- Blog Category Start -->
         <div class="blog-categories">
             <ul>
                 <!-- Category Item -->
                 <?php
                    $category               = "SELECT * FROM category";
                    $categorySql            = mysqli_query($db, $category);


                    while ($row = mysqli_fetch_assoc($categorySql)) {
                        $id                 = $row['id'];
                        $cat_name           = $row['cat_name'];

                        $categoryCount      = "SELECT * from post where category_id = '$id'";
                        $categoryCountSql   = mysqli_query($db, $categoryCount);
                        $total_cat          = mysqli_num_rows($categoryCountSql);  ?>
                     <li>
                         <i class="fa fa-check"></i>
                         <?php echo $cat_name; ?>
                         <span>[<?php echo $total_cat; ?>]</span>
                     </li>
                 <?php     }


                    ?>

                 <!-- Category Item -->

             </ul>
         </div>
         <!-- Blog Category End -->
     </div>

     <!-- Recent Comments -->
     <div class="widget">
         <h4>Recent Comments</h4>
         <div class="title-border"></div>
         <div class="recent-comments">

             <!-- Recent Comments Item Start -->
             <div class="recent-comments-item">
                 <div class="row">
                     <!-- Comments Thumbnails -->
                     <div class="col-md-4">
                         <i class="fa fa-comments-o"></i>
                     </div>
                     <!-- Comments Content -->
                     <div class="col-md-8 no-padding">
                         <h5>admin on blog posts</h5>
                         <!-- Comments Date -->
                         <ul>
                             <li>
                                 <i class="fa fa-clock-o"></i>Dec 15, 2018
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!-- Recent Comments Item End -->

             <!-- Recent Comments Item Start -->
             <div class="recent-comments-item">
                 <div class="row">
                     <!-- Comments Thumbnails -->
                     <div class="col-md-4">
                         <i class="fa fa-comments-o"></i>
                     </div>
                     <!-- Comments Content -->
                     <div class="col-md-8 no-padding">
                         <h5>admin on blog posts</h5>
                         <!-- Comments Date -->
                         <ul>
                             <li>
                                 <i class="fa fa-clock-o"></i>Dec 15, 2018
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!-- Recent Comments Item End -->

             <!-- Recent Comments Item Start -->
             <div class="recent-comments-item">
                 <div class="row">
                     <!-- Comments Thumbnails -->
                     <div class="col-md-4">
                         <i class="fa fa-comments-o"></i>
                     </div>
                     <!-- Comments Content -->
                     <div class="col-md-8 no-padding">
                         <h5>admin on blog posts</h5>
                         <!-- Comments Date -->
                         <ul>
                             <li>
                                 <i class="fa fa-clock-o"></i>Dec 15, 2018
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!-- Recent Comments Item End -->

         </div>
     </div>

     <!-- Meta Tag -->
     <div class="widget">
         <h4>Tags</h4>
         <div class="title-border"></div>
         <!-- Meta Tag List Start -->
         <div class="meta-tags">
             <?php
                $blogPost             = "SELECT * FROM post  order by id desc limit 5";
                $blogPostSql          = mysqli_query($db, $blogPost);

                while ($row = mysqli_fetch_assoc($blogPostSql)) {
                    $id             = $row['id'];
                    $title          = $row['title'];
                    $description    = $row['description'];
                    $tags           = $row['tags'];
                    $image          = $row['image'];
                    $category_id    = $row['category_id'];
                    $author_id      = $row['author_id'];
                    $status         = $row['status'];
                    $post_date      = $row['post_date']; ?>

                 <span><?php echo $tags; ?></span>
             <?php } ?>
         </div>
         <!-- Meta Tag List End -->
     </div>

 </div>
 <!-- Right Sidebar End -->