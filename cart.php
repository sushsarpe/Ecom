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
                        <?php item(); ?> items in cart
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
                            <li class="active">
                                <a href="cart.php">Shopping Cart</a>
                            </li>

                            <li>
                                <a href="contactus.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <a href="cart.php" class="btn btn-primary navbar-btn right">
                        <i class="fa fa-shopping-cart"></i>
                        <span>  <?php item(); ?> items in Cart</span>
                    </a>
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
                        <li>Shopping Cart</li>
                    </ul>
                </div>
                <div class="col-md-9" id="cart">
                    <div class="box">
                        <form action="cart.php" method="post" enctype="multipart-form-data">
                            <h1>Shopping Cart</h1>
                            <?php
                            $ip_add=getUserIP();
                            $c_email=$_SESSION['customer_email'];
                            $sel_id="select * from customers where customer_email='$c_email'";
                            $run_s=mysqli_query($db,$sel_id);
                            $row_s=mysqli_fetch_array($run_s);
                            $c_id=$row_s['customer_id'];
                            $select_cart="select * from cart where cs_id='$c_id'";
                            $run_cart=mysqli_query($con,$select_cart);
                            $count=mysqli_num_rows($run_cart);
                              
                            ?>
                                <p class="text-muted">Currently you have
                                    <?php echo $count ?> items in your cart
                                </p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th colspan="1">Delete</th>
                                                <th colspan="1">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total=0; 
                                        while($row=mysqli_fetch_array($run_cart)){
                                         $pro_id=$row['p_id'];
                                         $pro_qty=$row['qty'];
                                         $get_product="select * from product where product_id='$pro_id'";
                                         $run_pro=mysqli_query($con,$get_product);
                                         while($row=mysqli_fetch_array($run_pro)){
                                    $p_title=$row['product_title'];
                                    $p_img1=$row['product_img1'];
                                    $p_price=$row['product_price'];
                                    $sub_total=$row['product_price']*$pro_qty;
                                      $total+=$sub_total;

                                    ?>
                                                <tr>
                                                    <td><img src="customer/product_img/<?php echo $p_img1 ?>" alt=""></td>
                                                    <td>
                                                        <?php echo $p_title  ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $pro_qty  ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $p_price  ?>
                                                    </td>
                                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"> </td>
                                                    <td>
                                                        <?php echo $sub_total ?>
                                                    </td>
                                                </tr>
                                                <?php   } }   ?>
                                                </tfoot>
                                    </table>
                                </div>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <h4>TOTAL</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h4>
                                            INR
                                            <?php echo $total ?>
                                        </h4>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="index.php" class="btn btn-default">
                                            <i class="fa fa-chevron-left"></i>Continue Shopping
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-defaut" type="submit" name="update" value="Update Cart">
                                       <i class="fa fa-refresh">Update Cart</i>
                                   </button>
                                        <a href="checkout.php" class="btn btn-primary">
                                       Proceed to checkout<i class="fa fa-chevron-right"></i>
                                   </a>
                                    </div>
                                </div>
                        </form>
                    </div>

                    <?php 
                    function update_cart()
                    {
                          global $con;
                          if(isset($_POST['update'])){
                            foreach ($_POST['remove'] as $remove_id){
                                $delete_product="delete from cart where p_id='$remove_id'";
                                $run_del=mysqli_query($con,$delete_product);
                                if($run_del){
                                    echo "item deleted successfully from cart";
                                    echo "<script>window.open('cart.php','_self')</script>";
                                    
                                }
                            }  
                          }

                    }  

                    echo @$up_cart=update_cart();
                    ?>
                </div>
                <!--col-9 end-->
                <div class="cal-md-3">
                    <!--col-3 start-->
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order Summary</h3>
                        </div>
                        <p class="text-muted">
                            You can Delete Cart Items Anytime
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order Subtotal</td>
                                        <th>
                                            INR
                                            <?php echo $total ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handeling Charge</td>
                                        <td>INR 0</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>INR 0</td>
                                    </tr>
                                    <tr class=total>
                                        <td>Total</td>
                                        <th>INR
                                            <?php echo $total ?>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--col-md-3 end-->

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