<nav class="navbar navbar-inverse navbar-fixed-top" style="background:black">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               
        </button>
        <a href="index.php?dashboard" class="navbar-brand"> </a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>Organisation_name
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
                    <a href="index.php?view_order">
                        <i class="fa fa-fw-gear"></i>recent orders
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

    <div class="collapse navbar-ex1-collapse navbar-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class=" fa fa-fw fa-dashboard"></i>Dashboard
                </a>
            </li>
            <li class=" <?php if(isset($_GET['my_order'])){echo " active ";}   ?> ">
                <a href="my_account.php?my_order"><i class="fa fa-list"></i>My Order</a>
            </li>
            <li class=" <?php if(isset($_GET['pay_offline'])){echo " active ";} ?> ">
                <a href="insert_order.php">
                    <i class="fa fa-bolt"></i>Post Order
                </a>
            </li>
            <li class=" <?php if(isset($_GET['edit_act'])){echo " active ";}   ?> ">
                <a href="my_account.php?edit_act"><i class="fa fa-pencil"></i>Edit Account</a>
            </li>

            <li class=" <?php if(isset($_GET['change_pass'])){echo " active ";}   ?> ">
                <a href="my_account.php?change_pass"><i class="fa fa-user"></i>Change Password</a>
            </li>
            <li class=" <?php if(isset($_GET['delete_account'])){echo " active ";}   ?> ">
                <a href="my_account.php?delete_account"><i class="fa fa-trace-o"></i>Delete Account</a>
            </li>

            <li class=" <?php if(isset($_GET['logout'])){echo " active ";}   ?> ">
                <a href="../../logout.php"><i class="fa fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>


</nav>

<div class="panel-body">
    <ul class="nav nav-pills nav-stacked">






    </ul>
</div>