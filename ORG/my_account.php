<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','self')</script>";
}else{
    include("../includes/db.php");
    include("../customer/Functions/functions.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../customer/Styles/style.css">

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
                        <?php 
                        if(isset($_SESSION['customer_email']))
                        {
                              $c_email=$_SESSION['customer_email'];
                              $sel_cust="select * from customers where customer_email='$c_email' AND customer_role='3'";
                              $run_cust=mysqli_query($con,$sel_cust);
                              $count1=mysqli_num_rows($run_cust);
                              if($count1==1)
                              {
                                 item2(); 
                                 echo " items in cart<br> Total INR:";
                                 totalPrice1();
                             } 
                             else { 
                             item(); 
                             echo " items in cart<br> Total INR: ";
                             totalPrice() ;
                             } 
                         }
                                 ?>
                    </a>

                </div>

                <div class="col-md-6">
                    <ul class="menu">
                        <li><a href="../registration.php">Registration</a></li>
                        <li>
                            <?php
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='../checkout.php'>My Account</a>";
                            }
                            else{
                                echo "<a href='my_account.php?my_order'>My Account</a>";
                            }
                            ?></li>
                        <li>
                            <?php
                            if(isset($_SESSION['customer_email']))
                            {
                             $c_email=$_SESSION['customer_email'];
                             $sel_cust="select * from customers where customer_email='$c_email' AND customer_role='3'";
                             $run_cust=mysqli_query($con,$sel_cust);
                             $count=mysqli_num_rows($run_cust);
                             if($count==1)
                             {
                                echo "<a href='../lso.php'>LSO Cart</a>";
                              }
                               else
                             {  echo "<a href='../cart.php'>Shopping Cart</a>";}
                            } 
                        ?>

                                <li>

                                    <div id="google_translate_element"></div>

                                    <script type="text/javascript">
                                        function googleTranslateElementInit() {
                                            new google.translate.TranslateElement({
                                                pageLanguage: 'en'
                                            }, 'google_translate_element');
                                        }
                                    </script>

                                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                                </li>
                                <li>
                                    <?php
                                if(!isset($_SESSION['customer_email'])){
                                    echo "<a href='checkout.php'>LOGIN</a>";
                                } 
                                else{
                                    echo "<a href='../logout.php'>LOGOUT</a>";
                                }
                                ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default" id="navbar">
            <div class="container">
                <div class="navbar-head">
                    <a class="navbar-brand home" href="index.php">
                        <img src="../customer/images/40522313.jpg" width=141px height=100px alt="logo">
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
                            <li>
                                <a href="../index.php">Home</a>
                            </li>
                            <li>
                                <?php
                                if(isset($_SESSION['customer_email']))
                                {
                                 $c_email=$_SESSION['customer_email'];
                                 $sel_cust="select * from customers where customer_email='$c_email' AND customer_role='2'";
                                 $run_cust=mysqli_query($con,$sel_cust);
                                 $count=mysqli_num_rows($run_cust);
                                 if($count==1)
                                 {
                                    echo "<a href='my_products.php'>My Products</a>";
                                  }
                                   else
                                 {  echo "<a href='shop.php'>Shop</a>";}
                                } 
                                else 
                                {
                                    echo "<a href='shop.php'>Shop</a>"; 
                                }
                            ?>
                            </li>
                            <li class="active">
                                <?php
                                if(!isset($_SESSION['customer_email'])){
                                    echo "<a href='../checkout.php'>My Account</a>";
                                }
                                else{
                                    echo "<a href='my_account.php?my_order'>My Account</a>";
                                }
                                ?>
                            </li>
                            <li>
                                <?php
                                if(isset($_SESSION['customer_email']))
                                {
                                 $c_email=$_SESSION['customer_email'];
                                 $sel_cust="select * from customers where customer_email='$c_email' AND customer_role='3'";
                                 $run_cust=mysqli_query($con,$sel_cust);
                                 $count=mysqli_num_rows($run_cust);
                                 if($count==1)
                                 {
                                    echo "<a href='../lso.php'>LSO Cart</a>";
                                  }
                                   else
                                 {  echo "<a href='../cart.php'>Shopping Cart</a>";}
                                } 
                            ?>
                            </li>

                            <li>
                                <a href="../contactus.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <?php
                    if(isset($_SESSION['customer_email']))
                    {
                     $c_email=$_SESSION['customer_email'];
                     $sel_cust="select * from customers where customer_email='$c_email' AND customer_role='3'";
                     $run_cust=mysqli_query($con,$sel_cust);
                     $count=mysqli_num_rows($run_cust);
                     if($count==1)
                     {
                        echo "<a href='../lso.php' class='btn btn-primary navbar-btn right'>
                            <i class='fa fa-shopping-cart'></i>
                            <span>";
                             item2(); 
                    echo " items in cart 
                            </span> </a>"; } 
                      else {  
                        echo "<a href='../cart.php' class='btn btn-primary navbar-btn right'>
                                    <i class='fa fa-shopping-cart'></i>
                                    <span>"; item();  
                                echo "items in Cart</span>
                        </a>";} } ?>

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
                        <li><a href="../index.php">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <?php
                include("includes/sidebar2.php");
                ?>
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <?php
            if(isset($_GET['my_order'])){
                include("my_order.php");
            }
           ?>
                            <?php
            if(isset($_GET['my_lso'])){
                include("my_lso.php");
            }
           ?>

                                <?php
           if(isset($_GET['edit_act'])){
               include("../customer/edit_act.php");
           }
           ?>

                                    <?php
           if(isset($_GET['change_pass'])){
               include("../customer/change_pass.php");
           }
             ?>

                                        <?php
             if(isset($_GET['delete_account'])){
                 include("../customer/delete_account.php");
             }
             ?>

                    </div>
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
    <?php } ?>