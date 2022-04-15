<nav class="navbar navbar-inverse navbar-fixed-top" style="background:black">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>Sushil Sarpe
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile">
                        <i class="fa fa-fw-user"></i>Profile
                    </a>
                </li>
                <li>
                    <a href="index.php?view_product">
                        <i class="fa fa-fw-envelope"></i>Products
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw-user"></i>Customer
                    </a>
                </li>
                <li>
                    <a href="index.php?pro_cat">
                        <i class="fa fa-fw-gear"></i>Product Categories
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">Logout
                        <i class="fa fa-fw fa-power-off"></i> 
                     </a>
                </li>
            </ul>
        </li>

    </ul>
    <!--nav-right ends-->

    <div class="collapse navbar-ex1-collapse navbar-collapse ">
        <ul class="nav navbar-nav side-nav col-md-2">
            <li>
                <a href="index.php?dashboard">
                    <i class=" fa fa-fw fa-dashboard"></i>Dashboard
                </a>
            </li>

            <li>
                <!--Start Here--->
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-table"></i>Product</a>
                <i class="fa fa-fw fa-caret-down"></i>

                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product">Insert Product</a>
                    </li>
                    <li>
                        <a href="index.php?view_product">View Product</a>
                    </li>
                </ul>
            </li>
            <!--End Here--->

            <li>
                <!--Start Here--->
                <a href="#" data-toggle="collapse" data-target="#product_cat">
                    <i class="fa fa-fw fa-table"></i>Product Categories</a>
                <i class="fa fa-fw fa-caret-down"></i>

                <ul id="product_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_product_cat">Insert Product Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_product_cat">View Product Categories</a>
                    </li>
                </ul>
            </li>
            <!--End Here-->
            <li>
                <!--Start Here--->
                <a href="#" data-toggle="collapse" data-target="#slider">
                    <i class="fa fa-fw fa-table"></i>Slider</a>
                <i class="fa fa-fw fa-caret-down"></i>

                <ul id="slider" class="collapse">
                    <li>
                        <a href="index.php?insert_slider">Insert Slider</a>
                    </li>
                    <li>
                        <a href="index.php?view_slider">View Slider</a>
                    </li>
                </ul>
            </li>
            <!--End Here--->
            <li>
                <a href="index.php?view_customer">
                    <i class="fa fa-fw fa-edit"></i>View Customer
                </a>
            </li>

            <li>
                <a href="index.php?view_order">
                    <i class="fa fa-fw fa-lisst"></i>View Order
                </a>
            </li>



            <li>
                <!--Start Here--->
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-fw fa-table"></i>Users</a>
                <i class="fa fa-fw fa-caret-down"></i>

                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user">Insert User</a>
                    </li>
                    <li>
                        <a href="index.php?view_user">View User</a>
                    </li>
                    <li>
                        <a href="index.php?user_profile">Edit Profile</a>
                    </li>
                </ul>
            </li>
            <!--End Here--->
        </ul>
    </div>


</nav>