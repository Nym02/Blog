<?php
include "inc/header.php";

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
        <!-- Single Item Blog Post Start -->
        <div class="blog-post">
          <!-- Blog Banner Image -->
          <div class="blog-banner">
            <a href="#">
              <img src="assets/images/blog/test.jpg" />
              <!-- Post Category Names -->
              <div class="blog-category-name">
                <h6>Technology</h6>
              </div>
            </a>
          </div>
          <!-- Blog Title and Description -->
          <div class="blog-description">
            <a href="#">
              <h3 class="post-title">
                CONSECTETUR ADIPISICING ELIT, SED DO EIUSMOD.
              </h3>
            </a>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur. Excepteur sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt mollit anim id est eserunt
              mollit anim id labor laborumlabor laborum est.
            </p>
            <!-- Blog Info, Date and Author -->
            <div class="row">
              <div class="col-md-8">
                <div class="blog-info">
                  <ul>
                    <li><i class="fa fa-calendar"></i>7th Nov, 2018</li>
                    <li><i class="fa fa-user"></i>by - admin</li>
                    <li><i class="fa fa-heart"></i>(50)</li>
                  </ul>
                </div>
              </div>

              <div class="col-md-4 read-more-btn">
                <button type="button" class="btn-main">
                  Read More <i class="fa fa-angle-double-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Single Item Blog Post End -->



        <!-- Blog Paginetion Design Start -->
        <div class="paginetion">
          <ul>
            <!-- Next Button -->
            <li class="blog-prev">
              <a href=""><i class="fa fa-long-arrow-left"></i> Previous</a>
            </li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li class="active"><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <!-- Previous Button -->
            <li class="blog-next">
              <a href=""> Next <i class="fa fa-long-arrow-right"></i></a>
            </li>
          </ul>
        </div>
        <!-- Blog Paginetion Design End -->
      </div>

      <?php include "inc/sidebar.php"; ?>
    </div>
  </div>
</section>
<!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->