<?php
session_start();
include("../includes/db.php");
include("../Admin_area/functions.php");
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea'
            });
        </script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Post Order</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="Styles/style.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    </head>

    <body>

        <div class="row">

            <div class="col-lg-12">
                <div class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard/POST ORDER
                    </li>
                    <li>
                        <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='checkout.php'>Login</a>";
                        }else{
                            echo "<a href='logout.php'>LOGOUT</a>";
                        }
                        ?></li>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">

            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            <i class="fa a-money fa-w"></i>Post Large Scale Order
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Name</label>
                                <input type="text" name="product_title" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product category</label>
                                <input type="text" name="pro_cat" class="form-control" required="">

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product img1</label>
                                <input type="file" name="product_img1" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product img2</label>
                                <input type="file" name="product_img2" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product image3</label>
                                <input type="file" name="product_img3" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Order price</label>
                                <input type="text" name="order_price" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Requirement</label>
                                <input type="text" name="req" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Order details</label>
                                <textarea name="order_detail" id="form-control" cols="19" rows="6"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" value="Add Product" class="btn btn-primary form-control">
                                    Post Order
                            </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>


    <?php
    if (isset($_POST['submit'])) {
        if(isset($_SESSION['customer_email'])){
            $product_title=$_POST['product_title'];
            $pro_cat=$_POST['pro_cat'];
            $order_detail=$_POST['order_detail'];
            $req=$_POST['req'];
            $order_price=$_POST['order_price'];
            
            $customer_email=$_SESSION['customer_email'];
        }
       

        $product_img1=$_FILES['product_img1']['name'];
        $product_img2=$_FILES['product_img2']['name'];
        $product_img3=$_FILES['product_img3']['name'];

        $temp_name1=$_FILES['product_img1']['tmp_name'];
        $temp_name2=$_FILES['product_img2']['tmp_name'];
        $temp_name3=$_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "ORG_image/$product_img1");
        move_uploaded_file($temp_name2, "ORG_image/$product_img2");
        move_uploaded_file($temp_name3, "ORG_image/$product_img3");
  
        $post_order="insert into lso(customer_email,pro_cat,date,product_name,product_img1,product_img2,product_img3,p_price,req,order_desc) values('$customer_email','$pro_cat',NOW(),'$product_title',
        '$product_img1','$product_img2','$product_img3','$order_price','$req','$order_detail')";
        
        $run_order=mysqli_query($con,$post_order);
    
        if($run_order){
        echo "<script>alert('Order Posted Successfully')</script>";
        add_to_Cart();
        echo "<script>window.open('post_order.php','_self')</script>";
        }
    }
 
        function add_to_Cart(){
            
         if(isset($_SESSION['customer_email'])){
            global $db;
            $req=$_POST['req'];
            $product_title=$_POST['product_title'];
            $customer_email=$_SESSION['customer_email'];
         $get_lso="select * from lso where customer_email='$customer_email' AND product_name='$product_title' AND req='$req'";
         $run_lso=mysqli_query($db,$get_lso);
         $row_lso=mysqli_fetch_array($run_lso);
         $p_id=$row_lso['lso_id'];
         $product_qty=$row_lso['req'];
         $price=$row_lso['p_price'];
             $query="insert into lso_cart(lso_id,customer_email,req,p_price) values('$p_id','$customer_email','$product_qty','$price')";
             $run_query=mysqli_query($db,$query);
             if($run_query){
             echo "<script>alert(' order addded in cart')</script>";
             echo "<script>window.open('post_order.php','_self')</script>";
             }
         }
        
        }

    ?>