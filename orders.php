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
                        <?php item(); ?>items in cart<br> Total INR:
                        <?php totalPrice();  ?>
                    </a>
                </div>

                <div class="col-md-6">
                    <ul class="menu">
                        <li><a href="registration.php">Registration</a></li>
                        <li><a href="customer/my_account.php">My Account</a></li>
                        <li>
                            <a href="cart.php">Cart</a></li>
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
                                <a href="shop.php">Shop</a>
                            </li>
                            <li>
                                <a href="customer/my_account.php">My Account</a>
                            </li>
                            <li>
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
        <div class="col-md-2">

        </div>
        <div class="col-md-9 box">
            <center>
                <h1>
                    My Orders
                </h1>

            </center>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Sr. no</th>
                            <th>Buyer Name</th>
                            <th>Product</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Order Date</th>
                            <th>Payment method</th>
                            <th>Order Status</th>
                            <th>Address of buyer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $c_email=$_SESSION['customer_email'];
                        $sel_id="select * from customers where customer_email='$c_email'";
                        $run_s=mysqli_query($con,$sel_id);
                        $row_s=mysqli_fetch_array($run_s);
                        $c_id=$row_s['customer_id'];

                       $get_order = "select * from customer_order where product_id IN(select product_id from product where c_id='$c_id')";
                       $run_order=mysqli_query($con,$get_order);
                       $i=0;
                       while ($row_order=mysqli_fetch_array($run_order)) {
                         $cs_id=$row_order['customer_id'];
                         $cs="select * from customers where customer_id='$cs_id'";
                         $run_cs=mysqli_query($con,$cs);
                         $row_cs=mysqli_fetch_array($run_cs);
                         $cs_name=$row_cs['customer_name'];
                         $cs_add=$row_cs['customer_address'];

                         $pro_id=$row_order['product_id'];
                          $pro="select * from product where product_id='$pro_id'";
                          $run_p=mysqli_query($con,$pro);
                          $row_p=mysqli_fetch_array($run_p);
                          $pro_name=$row_p['product_title'];
                          $order_id=$row_order['order_id'];
                          $order_due_amount=$row_order['due_amount'];
                          $order_invoice_no=$row_order['invoice_no'];
                          $order_qty=$row_order['qty'];
                          $order_size=$row_order['size'];
                          $order_date=substr($row_order['order_date'], 0,11);
                          $order_status=$row_order['order_status'];
                          $i++;
                         $payment="COD";
                          if($order_status=='not ready'){
                             $order_status="not ready";
                          }else {
                          $order_status="ready";
                         }
                           ?>
                            <Tr>
                                <td>
                                    <?php echo $i  ?>
                                </td>
                                <td>
                                    <?php echo $cs_name ?>
                                </td>
                                <td>
                                    <?php echo $pro_name ?>
                                </td>
                                <td>
                                    <?php echo $order_due_amount  ?>
                                </td>
                                <td>
                                    <?php echo $order_qty  ?>
                                </td>
                                <td>
                                    <?php echo $order_size  ?>
                                </td>
                                <td>
                                    <?php echo $order_date  ?>
                                </td>
                                <td>
                                    <?php echo $payment ?>
                                </td>
                                <td>

                                    <form method="POST">
                                        <div class="form-group">
                                            <select name="order_status" class="form-control">
                                      <option>not ready</option>
                                      <option>ready</option>
                                         </select>
                                            <button action="orders.php?order_id=" type="submit" value="<?php echo $order_id ?>">
                                            SET
                                        </button>

                                        </div>

                                    </form>

                                </td>
                                <td>
                                    <?php echo $cs_add ?>
                                </td>
                            </Tr>
                            <?php } ?>
                    </tbody>


                </table>
            </div>
        </div>

        <!--footer Start-->
        <?php
           include("includes/footer.php ");
            ?>
            <!--Footer end-->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js "></script>
    </body>

    </html>

    <?php 
    if(isset($_POST['update']))
    {
     $status=$_POST['order_status'];
     $up="update customer_order set order_status='$status' where order_id=16";
     $run_up=mysqli_query($con,$up);

    }