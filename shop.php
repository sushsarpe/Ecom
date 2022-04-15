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
                                echo "<a href='checkout.php'>LOGIN</a>";
                            } 
                            else{
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
                            <li class="active">
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


        <div id="content">
            <div class="container">
                <!--container start-->
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <?php
                include("includes/sidebar.php");
                ?>
                </div>
                <div class="col-md-9">
                    <?php
                if(!isset($_GET['p_cat'])){
                    echo "<div class='box'>
                        <h1>Shop</h1>
                        <p>Here are product, which have something more <br> Find Your Desired One
                        </p>
                    </div>";
                }
                if(isset($_GET['p_cat'])){
                

                }
                ?>
                        <div class="row">
                            <?php
                  if(!isset($_GET['p_cat'])){
                    $per_page=6;
                    if(isset($_GET['page'])){
                        $page=$_GET['page'];
                    }else{
                        $page=1;
                    }

                    $start_from=($page-1)* $per_page;
                    $get_product="select* from product order by 1 DESC LIMIT $start_from, $per_page";
                    $run_pro=mysqli_query($con,$get_product);
                    while ($row=mysqli_fetch_array($run_pro)){
                        $c_id=$row['c_id'];
                        $c="select * from customers where customer_id='$c_id'";
                        $run_c=mysqli_query($db,$c);
                        $row_c=mysqli_fetch_array($run_c);
                        $c_name=$row_c['customer_name'];
    
                        $pro_id=$row['product_id'];
                        $pro_title=$row['product_title'];
                        $pro_price=$row['product_price'];
                        $pro_img1=$row['product_img1'];
                        

                        echo " 
                        <div class='col-md-4 col-sm-6 center responsive'>
                            <div class='product'>
                                <a href='details.php?pro_id=$pro_id/'>
                                <img src='Admin_area/product_img/$pro_img1' width='250 px' height='250px'>
                                 </a>
                         <div class='text'>
                              <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                              <p class='price'> INR $pro_price</p>
                              <center><h3>Seller: $c_name</h3></center>
                              <p class='buttons'>
                                  <a href='details.php?pro_id=$pro_id' class='btn btn-default'>Veiw Details</a>
                                  <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>
                                Add to cart</a>
                              </p>
                            </div>
                            </div>
                        </div>
                            ";
                    }
                  }
                  ?>
                        </div>
                        <!--row end-->
                        <div class=row>
                            <?php
                          getpcatpro();
                          ?>
                        </div>
                        <center>
                            <ul class="pagination">
                                <?php
                                $per_page=6; 
                                $query="select * from product";
                                $result=mysqli_query($con,$query);
                                 $total_record=mysqli_num_rows($result);
                                 $total_pages=ceil($total_record / $per_page);
                                 echo "
                                 <li>
                                     <a href='shop.php?page=1'> ".'First Page'."</a>
                                 </li>";
                                 for($i=2; $i<=$total_pages;$i++){
                                     echo "
                                     <li> <a href='shop.php?page=".$i."'>".$i."</a></li>
                                     ";

                                 };

                                 echo "
                                 <li>
                                    <a href='shop.php?page=$total_pages'> ".'Last Page'."</a>  
                                 </li>";
                            
                            
                    ?>
                            </ul>
                        </center>

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