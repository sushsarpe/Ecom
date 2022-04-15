<?php
session_start();
include("includes/db.php");
include("Admin_area/functions.php");
?>
    <?php
if(isset($_GET['pro_id'])){
$pro_id=$_GET['pro_id'];
$get_product="select * from product where product_id='$pro_id'";
$run_product=mysqli_query($con,$get_product);
$row_product=mysqli_fetch_array($run_product);
$p_cat_id=$row_product['p_cat_id'];
$p_title=$row_product['product_title'];
$p_price=$row_product['product_price'];
$p_desc=$row_product['product_desc'];
$p_img1=$row_product['product_img1'];
$p_img2=$row_product['product_img2'];
$p_img3=$row_product['product_img3'];
$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
$run_p_cat=mysqli_query($con,$get_p_cat);
$row_p_cat=mysqli_fetch_array($run_p_cat);
$p_cat_id=$row_p_cat['p_cat_id'];
$p_cat_title=$row_p_cat['p_cat_title'];
$c_id=$row_product['c_id'];
$c="select * from customers where customer_id='$c_id'";
$run_c=mysqli_query($db,$c);
$row_c=mysqli_fetch_array($run_c);
$c_name=$row_c['customer_name'];
}
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

                    </div>

                    <div class="col-md-6">
                        <ul class="menu">
                            <li><a href="Customer_registration.php">Registration</a></li>
                            <li>
                                <?php
                                if(!isset($_SESSION['customer_email'])){
                                    echo "<a href='checkout.php'>My Account</a>";
                                }
                                else{
                                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                                }
                                ?>
                            </li>
                            <li>
                                <a href="cart.php">Cart</a></li>

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
                    <span class="sr-only">Toggle Navigation</span>
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
                                    <a href="shop.php">Shop</a>
                                </li>
                                <li>
                                    <a href="customer/my_account.php?my_order">My Account</a>
                                </li>
                                <li>
                                    <a href="cart.php">Shopping Cart</a>
                                </li>
                                <li>
                                    <a href="about.php">About Us</a>
                                </li>
                                <li>
                                    <a href="services.php">Services</a>
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
                     $sel_cust="select * from customers where customer_email='$c_email' AND customer_role='3'";
                     $run_cust=mysqli_query($con,$sel_cust);
                     $count=mysqli_num_rows($run_cust);
                     if($count==1)
                     {
                        echo "<a href='lso.php' class='btn btn-primary navbar-btn right'>
                            <i class='fa fa-shopping-cart'></i>
                            <span>";
                             item2(); 
                    echo " items in cart 
                            </span> </a>"; } 
                      else {  
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
                            <li><a href="shop.php">Shop</a></li>
                            <li>
                                <a href="shop.php?p_cat=<?php echo $p_cat_id;?>">
                                    <?php echo $p_cat_title ?>
                                </a>

                            </li>

                            <li>
                                <?php echo $p_title  ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <?php
                include("includes/sidebar.php");
                ?>
                    </div>


                    <div class="col-md-9">
                        <div class="box">
                            <center>
                                <h2>Seller
                                    <?php echo $c_name ?>
                                </h2>
                            </center>
                        </div>
                        <div class="row" id="productmain">
                            <div class="col-sm-5">
                                <!--sm6 start-->
                                <div id="mainimage">
                                    <div id="mycarousel" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#mycarousel" data-slide-to: "0" class="active"></li>
                                            <li data-target="#mycarousel" data-slide-to: "1"></li>
                                            <li data-target="#mycarousel" data-slide-to: "2"></li>
                                        </ol>
                                        <div class="carousel-inner">

                                            <div class="item active">
                                                <center>
                                                    <img src="customer/product_img/<?php echo $p_img1 ?>" alt="" class="img-responsive">
                                                </center>
                                            </div>
                                            <div class="item">
                                                <center>
                                                    <img src="customer/product_img/<?php echo $p_img2 ?>" alt="" class="img-responsive">
                                                </center>
                                            </div>
                                            <div class="item ">
                                                <center>
                                                    <img src="customer/product_img/<?php echo $p_img3 ?>" alt="" class="img-responsive">
                                                </center>
                                            </div>



                                        </div>
                                        <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a href="#mycarousel" class="right carousel-control" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--sm6 end-->
                            <div class="col-sm-6">
                                <div class="box">
                                    <h1 class="text-center">
                                        <?php echo $p_title  ?>
                                    </h1>
                                    <?php
                                    addCart();
                                    ?>
                                        <form action="details.php?add_cart=<?php echo $pro_id  ?> " method="post" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Product Quantity</label>
                                                <div class="col-md-7">
                                                    <select name="product_qty" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Product Size</label>
                                                <div class="col-md-7">
                                                    <select name="product_size" class="form-control" id="">
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>
                                        </select>
                                                </div>

                                            </div>
                                            <p class="price">

                                                <center>
                                                    INR
                                                    <?php echo $p_price ?> </center>
                                            </p>
                                            <p class="text-center buttons">
                                                <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-shopping-cart"></i>Add to Cart
                                  </button>
                                            </p>
                                        </form>
                                </div>
                                <div class="col-xs-4">
                                    <a href="#" class="thumb">
                                        <img src="" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="box" id="details">
                            <h4>Product Details</h4>
                            <p>
                                <?php echo $p_desc ?>
                            </p>
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