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
                        <li>
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
                            <a href="lso.php">LSO Cart</a></li>
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
                                <a href="lso.php">LSO Cart</a>
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
                <div class="col-md-12 ">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Large Scale Orders</li>

                    </ul>
                </div>
                <div class="col-md-9" id="cart">
                    <div class="box">
                        <form action="lso.php" method="post" enctype="multipart-form-data">
                            <h1>lso_cart </h1>
                            <?php
                           if(isset($_SESSION['customer_email']))
                           { 
                             $c_email=$_SESSION['customer_email'];
                             $select_cart="select * from lso_cart where customer_email='$c_email'";
                             $run_cart=mysqli_query($con,$select_cart);
                             $count=mysqli_num_rows($run_cart);
                           
                            ?>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th colspan="1">Delete</th>
                                                <th colspan="1">Total</th>
                                                <th colspan="1">Post</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                            $total=0; 
                        while($row=mysqli_fetch_array($run_cart)){
                         $pro_id=$row['lso_id'];
                         $pro_qty=$row['req'];
                         $get_order="select * from lso where lso_id='$pro_id'";
                         $run_pro=mysqli_query($con,$get_order);
                         while($row=mysqli_fetch_array($run_pro)){
                    $p_title=$row['product_name'];
                    $p_cat=$row['pro_cat'];
                    $p_img1=$row['product_img1'];
                    $p_img2=$row['product_img2'];
                    $p_img3=$row['product_img3'];
                    $p_price=$row['p_price'];
                    $o_desc=$row['order_desc'];
                    $sub_total=$row['p_price']*$pro_qty;
                      $total+=$sub_total;
                           
                    ?>
                                                <tr>
                                                    <td><img src="ORG/ORG_image/<?php echo $p_img1 ?>" alt=""></td>
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
                                                    <td>
                                                        <button type="submit" name="submit[]" value="<?php echo $pro_id ?>" class="btn btn-primary form-control">
                                                            Post Order
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php    
                                            
                                        }
                                            }  ?>
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
                                            <?php echo $total;
                                           }
                                            ?>

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

                                    </div>
                                </div>
                        </form>
                    </div>
                </div>

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
    <?php
       global $con;
        if(isset($_POST['submit'])){
        foreach ($_POST['submit'] as $submit_id){
            $submit_order="select * from lso where lso_id='$submit_id'";
            $run_sub=mysqli_query($con,$submit_order);
            while($row=mysqli_fetch_array($run_sub)){
            $c_email=$_SESSION['customer_email'];
            $p_cat=$row['pro_cat'];
            $p_title=$row['product_name'];
            $p_img1=$row['product_img1'];
            $p_img2=$row['product_img2'];
            $p_img3=$row['product_img3'];
            $p_price=$row['p_price'];
            $pro_qty=$row['req'];
            $o_desc=$row['order_desc'];
            $post_order="insert into posted_lso(customer_email,pro_cat,date,product_name,product_img1,product_img2,product_img3,p_price,req,order_desc) values('$c_email','$p_cat',NOW(),'$p_title',
            '$p_img1','$p_img2','$p_img3','$p_price','$pro_qty','$o_desc')";
             $run_order=mysqli_query($con,$post_order);
            if($run_order){
                echo"<script>alert('order posted successfully')</script>";
                echo "<script>window.open('lso.php','_self')</script>";
            }
        }
        $del_post="delete from lso_cart where lso_id='$submit_id'";
        $run_del=mysqli_query($con,$del_post);
        
    }  
}

?>