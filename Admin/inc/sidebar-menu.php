<?php

$currUser = $_SESSION['id'];

$currentUserQuery = "SELECT * from users WHERE id = '$currUser'";
$sql = mysqli_query($db, $currentUserQuery);

while ($row = mysqli_fetch_array($sql)) {
    $currUserFullname = $row['full_name'];
    $currUserImage = $row['image'];

?>



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="dashboard.php" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <?php if (!empty($currUserImage)) { ?>
                        <img src="image/users/<?php echo $currUserImage; ?>" class="img-circle elevation-2" alt="User Image">
                    <?php } else if (empty($currUserImage)) { ?>
                        <img src="image/users/d1.png" class="img-circle elevation-2" alt="User Image" <?php } ?>>
                </div>
                <div class="info">
                    <a href="profile.php" class="d-block"><?php echo $currUserFullname; ?></a>
                </div>
            </div>
        <?php } ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Profile
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Profile</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="category.php?do=Manage" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="category.php?do=Add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Category</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <?php if ($_SESSION['role'] == 1) { ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="users.php?do=Manage" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="users.php?do=Add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New User</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">



                        <li class="nav-item">
                            <a href="post.php?do=Manage" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="post.php?do=Add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Comments
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Comment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/validation.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Comment</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if ($_SESSION['role'] == 1) { ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Platform Setting
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/tables/simple.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Social Media</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/data.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>General Setting</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-item has-treeview">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Logout

                        </p>
                    </a>

                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>