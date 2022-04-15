<?php
include("includes/db.php");
include("Admin_area/functions.php");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="Styles/style.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    </head>

    <body>
        <div id="top">
            <div class="container">
                <div class="col-md-6 offer">
                    <a href="#" class="btn btn-success btn-sm">
                        <?php
                     if(!isset($_SESSION['customer_email'])){
                         echo "Welcome Guest";
                     }
                     else{
                         echo "Welcome: ".$_SESSION['customer_email']."";
                    }
                     ?>
                    </a>
                    <a href="#">

                    </a>
                </div>

                <div class="col-md-6">
                    <ul class="menu">
                        <li><a href="registration.php">Registration</a></li>
                        <li>
                            <?php
                                if(!isset($_SESSION['customer_email'])){
                                    echo "<a href='checkout.php'>My Account</a>";
                                }
                                else{
                                    if(isset($_SESSION['customer_email']))
                                    {
                                     $c_email=$_SESSION['customer_email'];
                                     $sel_cust="select * from customers where customer_email='$c_email'";
                                     $run_cust=mysqli_query($con,$sel_cust);
                                     $row=mysqli_fetch_array($run_cust);
                                     $c_role=$row['customer_role'];
                                     if($c_role==3)
                                     {
                                        echo "<a href='ORG/my_account.php'>My Account</a>";
                                      }
                                       else if($c_role==2)
                                     { echo "<a href='customer/my_account.php?my_orders'>My Account</a>";}
                                     else
                                    {
                                        echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                                    }
                                    } 
                                    
                                 }
                                ?></li>
                        <li>
                            <a href="cart.php">Cart</a></li>
                        <li>
                            <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>LOGIN</a>";
                            } 
                            else{
                                echo "<a href='logout.php'>LOGOUT</a>";
                            }
                            ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default" id="navbar">
            <div class="container">
                <div class="navbar-head">
                    <a class="navbar-brand home" href="index.php">
                        <img src="images/40522313.jpg" width=141px height=100px alt="logo">
                    </a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle NAvigation</span>
                    <i class="fa fa-align-justify"> </i>
                </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search"> </i>
                </button>
                </div>
                <div class="navbar-collapse collapse" id="navigation">
                    <div class="padding-nav">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="shop.php">Shop</a>
                            </li>
                            <li>
                                <?php
                                if(!isset($_SESSION['customer_email'])){
                                    echo "<a href='checkout.php'>My Account</a>";
                                }
                                else{
                                    if(isset($_SESSION['customer_email']))
                                    {
                                     $c_email=$_SESSION['customer_email'];
                                     $sel_cust="select * from customers where customer_email='$c_email'";
                                     $run_cust=mysqli_query($con,$sel_cust);
                                     $row=mysqli_fetch_array($run_cust);
                                     $c_role=$row['customer_role'];
                                     if($c_role==3)
                                     {
                                        echo "<a href='ORG/my_account.php'>My Account</a>";
                                      }
                                       else if($c_role==2)
                                     { echo "<a href='customer/my_account.php?my_orders'>My Account</a>";}
                                     else
                                    {
                                        echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                                    }
                                    } 
                                    
                                 }
                                ?>
                            </li>
                            <li>
                                <a href="cart.php">Shopping Cart</a>
                            </li>

                            <li>
                                <a href="contactus.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="navbar-collapse collapse right">
                        <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"> </i>
                    </button>
                    </div>
                    <div class="collapse clearfix" id="search">
                        <form class="navbar-form" method="get" action="result.php">
                            <div class="input-group">
                                <input type="text" name="user_query" placeholder="Search" class="form-control" required="">

                                <button type="submit" value="Search" name="search" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                        </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <div id="content">
            <div class="container">
                <!--container start-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Registration</li>
                    </ul>
                </div>


                <div class="col-md-9">
                    <div class="box">
                        <!--box start-->
                        <div class="box-header">
                            <center>
                                <h2>Customer Registration</h2>

                            </center>
                        </div>
                    </div>
                    <!--box end-->
                    <form action="registration.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Customer Name</label>
                            <input type="text" name="c_name" required="" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Customer Email</label>
                            <input type="text" name="c_email" required="" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Customer Password</label>
                            <input type="Password" name="c_password" required="" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="c_city" required="" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Contact No</label>
                            <input type="text" name="c_contact" required="" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="c_address" required="" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Profile picture</label>
                            <input type="file" name="c_img" required="" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Role</label>
                            <select name="c_role" class="form-control">
                        <option>Select Role</option>

                        <?php
                        $get_c_cats="select * from c_role";
                        $run_c_cats= mysqli_query($con,$get_c_cats);
                        while($row=mysqli_fetch_array($run_c_cats)){
                            $id=$row['c_role_id'];
                            $cat_title=$row['c_role'];
                            echo "<option value='$id'>$cat_title</option> ";
                         }
                        ?>
                    </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">
                     <i class="fa fa-user-md"></i>Register   
                    </button>
                        </div>

                    </form>
                </div>


            </div>
            <!--container end-->

        </div>


        <?php
    include("includes/footer.php");
    ?>
            <!--Footer end-->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>

    <?php
    if(isset($_POST['submit'])){
     $c_name=$_POST['c_name'];
     $c_email=$_POST['c_email'];
     $c_pass=$_POST['c_password'];
     $c_city=$_POST['c_city'];
     $c_contact=$_POST['c_contact'];
     $c_address=$_POST['c_address'];
     $c_img=$_FILES['c_img']['name'];
     $c_tmp_image=$_FILES['c_img']['tmp_name'];
     $c_ip=getUserIP();
     $c_role=$_POST['c_role'];

     move_uploaded_file($c_tmp_image,"customer/Customer-images/$c_img");
     $insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_role) values('$c_name','$c_email','$c_pass','$c_city','$c_contact','$c_address','$c_img','$c_ip','$c_role')";
    $run_customer=mysqli_query($con,$insert_customer);
    $sel_cart="select * from cart where ip_add='$c_ip'";
    $run_cart=mysqli_query($con,$sel_cart);
    $check_cart=mysqli_num_rows($run_cart);
    if($check_cart>0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You have been Registerd Successfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    else{
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You have been Registerd Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    }
    ?>