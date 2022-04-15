<?php
session_start();
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
                                echo "<a href='lso.php'>LSO Cart</a>";
                              }
                               else
                             {  echo "<a href='cart.php'>Shopping Cart</a>";}
                            } 
                        ?></li>

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
                                echo "<a href='checkout.php'>Login</a>";
                            }else{
                                echo "<a href='logout.php'>LOGOUT</a>";
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
                            <li>
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
                                <?php
                                if(isset($_SESSION['customer_email']))
                                {
                                 $c_email=$_SESSION['customer_email'];
                                 $sel_cust="select * from customers where customer_email='$c_email' AND customer_role='3'";
                                 $run_cust=mysqli_query($con,$sel_cust);
                                 $count=mysqli_num_rows($run_cust);
                                 if($count==1)
                                 {
                                    echo "<a href='lso.php'>LSO Cart</a>";
                                  }
                                   else
                                 {  echo "<a href='cart.php'>Shopping Cart</a>";}
                                } 
                            ?>
                            </li>

                            <li class="active">
                                <a href="contactus.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <?php
                    if(isset($_SESSION['customer_email']))
                    {
                     $c_email=$_SESSION['customer_email'];
                     $sel_cust="select * from customers where customer_email='$c_email'";
                     $run_cust=mysqli_query($con,$sel_cust);
                     $row=mysqli_fetch_array($run_cust);
                                     $c_role=$row['customer_role'];
                                     if($c_role==3)
                     {
                        echo "<a href='lso.php' class='btn btn-primary navbar-btn right'>
                            <i class='fa fa-shopping-cart'></i>
                            <span>";
                             item2(); 
                    echo " items in cart 
                            </span> </a>"; } 
                      else if($c_role==1){  
                        echo "<a href='cart.php' class='btn btn-primary navbar-btn right'>
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
                        <li><a href="index.php">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>


                <div class="col-md-9">
                    <div class="box">
                        <!--box start-->
                        <div class="box-header">
                            <center>
                                <h2>Contact Us</h2>

                            </center>
                        </div>
                    </div>
                    <!--box end-->
                    <form action="contactus.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" required="" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" required="" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" required="" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" name="message"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">
                     <i class="fa fa-user-md"></i>Send message   
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
$senderName=$_POST['name'];
$senderEmail=$_POST['email'];
$senderSubject=$_POST['subject'];
$senderMessage=$_POST['message'];
$receiverEmail="myhomebusiness321@gmail.com";
mail($receiverEmail,$senderName,$senderSubject,$senderMessage,$senderEmail);

$email=$_POST['email'];
$subject="Welcome to our Website";
$msg="I shall get to you soon, thank to contact us";
$from="myhomebusiness321@gmail.com";
mail($email,$subject,$msg,$from);
echo "<h2 align='center'>Mail sent</h2>";
}
?>