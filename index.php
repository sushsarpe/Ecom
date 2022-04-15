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
                         $sel_cust="select * from customers where customer_email='$c_email'";
                         $run_cust=mysqli_query($con,$sel_cust);
                         $row_cust=mysqli_fetch_array($run_cust);
                         $c_role=$row_cust['customer_role'];
                         if($c_role==3)
                         {
                            item2(); 
                            echo " items in cart<br> Total INR:";
                            totalPrice1();
                        } 
                        else if($c_role==1){ 
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
                        <li class="dropdown">
                            <a href="registration.php">Registration</a>
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
                    <span class="sr-only "></span>
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
                                 $sel_cust="select * from customers where customer_email='$c_email'";
                                 $run_cust=mysqli_query($con,$sel_cust);
                                 $row_cust=mysqli_fetch_array($run_cust);
                                 $c_role=$row_cust['customer_role'];
                                 $count=mysqli_num_rows($run_cust);
                                 if($c_role==3)
                                 {
                                    echo "<a href='lso.php'>LSO Cart</a>";
                                  }
                                  else if($c_role==1)
                                  {
                                    echo "<a href='cart.php'>Shopping Cart</a>";  
                                  }
                                   
                                } 
                            ?>
                            </li>

                            <li>
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
        <div class=col-md-2>

        </div>
        <div class="container" id="slider">
            <div class="col-md-6">
                <div class="carousel slide" id="myCarousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="myCarousel" data-slide-to="0" class="action"></li>
                        <li data-target="myCarousel" data-slide-to="1"></li>
                        <li data-target="myCarousel" data-slide-to="2"></li>
                        <li data-target="myCarousel" data-slide-to="3"></li>
                        <li data-target="myCarousel" data-slide-to="4"></li>
                        <li data-target="myCarousel" data-slide-to="5"></li>
                    </ol>

                    <div class="carousel-inner">
                        <?php
                   $get_slider="select * from slider LIMIT 0,1";
                   $run_slider= mysqli_query($con,$get_slider);
                   while($row=mysqli_fetch_array($run_slider)){
                       $slider_name=$row['slider_name'];
                       $slider_image=$row['slider_image'];
                       echo "<div class='item active'>
                       <img src='Admin_area/slider_image/$slider_image' >
                       </div> ";
                    }
                   ?>

                            <?php
                   $get_slider="select * from slider LIMIT 1,5";
                   $run_slider= mysqli_query($con,$get_slider);
                   while($row=mysqli_fetch_array($run_slider)){
                       $slider_name=$row['slider_name'];
                       $slider_image=$row['slider_image'];
                       echo "<div class='item '>
                       <img src='Admin_area/slider_image/$slider_image' >
                       </div> ";
                    }
                   ?>

                    </div>
                    <!--carousel-inner End-->

                    <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a href="#myCarousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--carousel-slide End-->
            </div>
            <!--col-md-6 ends -->
            <?php 
            if(isset($_SESSION['customer_email'])){
                $c_email=$_SESSION['customer_email'];
                $sel_cust="select * from customers where customer_email='$c_email' AND (customer_role='2' OR customer_role='3')";
                $run_cust=mysqli_query($con,$sel_cust);
                $count=mysqli_num_rows($run_cust);
                if($count==1)
                {
               echo "<div class='col-md-4'>
                <div class='box same-height'>
                    <div class='icon'>
                        <i class='fa ''></i>
                        <h5>LSO</h5>
                    </div>
                    <!--icon End-->
                      <a href='ORG/plso.php'>
                    <table class='table' >
                    </a>
                        <tbody>";                  
                                  global $db;
                                  $get_plso="select * from posted_lso order by 1 DESC LIMIT 0,5";
                                 $run_plso=mysqli_query($db,$get_plso);
                                 while($row=mysqli_fetch_array($run_plso))
                                 {
                                $cust_email=$row['customer_email'];
                                $get_cust="select * from customers where customer_email='$cust_email'";   
                                $run_cust=mysqli_query($con,$get_cust);
                                while($row_cust=mysqli_fetch_array($run_cust)){
                                $cust_img=$row_cust['customer_image'];
                                $cust_name=$row_cust['customer_name'];}
                                $p_name=$row['product_name'];
                                $req=$row['req'];
                                $pro_id=$row['plso_id'];
                            
                            ?>
            <?php echo"  </tbody>
            <tr>
                <td>
                     <img src='customer/Customer-images/$cust_img' width='50px' height='50px'>
                 ";
                                ?>
            </td>
            <td>
                <?php echo $cust_name  ?>
            </td>
            <td>
                <?php echo $p_name  ?>
            </td>
            <td>
                <?php echo $req  ?>
            </td>
            </tr>
            <?php  }  } } ?>
            </table>

        </div>
        <!--box-same-heigh End-->
        </div>
        </div>
        <!--container End-->

        <div id="advantage">
            <div class="container">
                <div class="same-height-row">

                    <div class="col-sm-4">
                        <div class="box same-height">
                            <div class="icon">
                                <i class="fa "></i>
                            </div>
                            <!--icon End-->
                            <h3><a href="#">Begin</a></h3>
                            <p>Get your work start from this platform<br> We are here to hepl in this journey
                            </p>
                        </div>
                        <!--box-same-heigh End-->
                    </div>
                    <!-- col-sm-4 End-->

                    <div class="col-sm-4">
                        <div class="box same-height">
                            <div class="icon">
                                <i class="fa "></i>
                            </div>
                            <!--icon End-->
                            <h3><a href="#">Quick Help</a></h3>
                            <p>Quick Demonstration for maintaining your Account</p>
                        </div>
                        <!--box-same-heigh End-->
                    </div>
                    <!-- col-sm-4 End-->

                    <div class="col-sm-4">
                        <div class="box same-height">
                            <div class="icon">
                                <i class="fa "></i>
                            </div>
                            <!--icon End-->
                            <h3><a href="#">thank you </a></h3>
                            <p>Help us and show support to VOCAL FOR LOCAL</p>
                        </div>
                        <!--box-same-heigh End-->
                    </div>
                    <!-- col-sm-4 End-->

                </div>
                <!--same-height-row End-->
            </div>
            <!--container End-->
        </div>
        <!--advantage End-->

        <div id="hbox">
            <div class="box">
                <div class="container">
                    <div class="cal-md-12">
                        <h2>Special Deals</h2>
                    </div>
                </div>
            </div>
        </div>
        <!--hbox End-->

        <div id="content" class="container">
            <div class="row">
                <?php
                getPro();
               ?>
            </div>
        </div>
        <!--footer Start-->
        <?php
    include("includes/footer.php");
     ?>
            <!--Footer end-->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>