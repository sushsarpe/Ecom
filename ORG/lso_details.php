<?php
session_start();
include("../includes/db.php");
include("../Admin_area/functions.php");
?>
    <?php 
if(isset($_GET['plso_id']))
{  global $con;
  $plso_id=$_GET['plso_id'];
  $get_plso="select * from posted_lso where plso_id='$plso_id'";
  $run_plso=mysqli_query($con,$get_plso);
  $row=mysqli_fetch_array($run_plso);
  $p_name=$row['product_name'];
  $p_cat=$row['pro_cat'];
  $p_img1=$row['product_img1'];
  $p_img2=$row['product_img2'];
  $p_img3=$row['product_img3'];
  $p_price=$row['p_price'];
  $req=$row['req'];
  $t_price=$p_price*$req;
  $o_desc=$row['order_desc'];

  $customer_email=$row['customer_email'];
  $get_cust="select * from customers where customer_email='$customer_email'";
 $run_cust=mysqli_query($con,$get_cust);
 $row_c=mysqli_fetch_array($run_cust);
 $c_name=$row_c['customer_name'];
 $c_image=$row_c['customer_image'];
 $c_id=$row_c['customer_id']; 
}
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
        <title>LSO</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Styles/style.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    </head>

    <body>
        <form action="lso_details.php?plso_id=<?php echo $plso_id  ?>" method="post" class="form-horizontal">
            <div class="row">

                <div class="col-lg-12">
                    <div class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i>LARGE SCALE ORDERS (LSO)
                        </li>
                        <li>
                            <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='../checkout.php'>Login</a>";
                        }else{
                            echo "<a href='../logout.php'>LOGOUT</a>";
                        }
                        ?></li>
                    </div>
                </div>

            </div>

            <div class="row" style="background-color:rgb(236, 247, 247);">
                <div class="col-md-8">
                    <div class="col-md-1">

                    </div>
                    <div class="product">
                        <div class="container1" style="padding-left: 50px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                            <h3> Product details:</h3>
                            <h4>
                                <img src="ORG_image/<?php echo $p_img1 ?>" width="300px" height="300px" style="border:blueviolet; border-radius: 35px; padding: 15px;">
                                <img src="ORG_image/<?php echo $p_img2 ?>" width="300px" height="300px" style="border:blueviolet; border-radius: 35px; padding: 15px;">
                                <img src="ORG_image/<?php echo $p_img3 ?>" width="300px" height="300px" style="border:blueviolet; border-radius: 35px; padding: 15px;">
                            </h4>

                            <h4> Name:
                                <?php echo $p_name ?>
                            </h4>
                            <h4>
                                Product Category:
                                <?php echo $p_cat ?>
                            </h4>

                            <h4>
                                Product price:
                                <?php echo $p_price ?> Rs
                            </h4>
                            <h3> Order details:</h3>
                            <p class='buttons' style="float:right;">
                                <?php
                            if(isset($_SESSION['customer_email']))
                            {
                         $c_email=$_SESSION['customer_email'];
                         $sel_cust="select * from customers where customer_email='$c_email' AND customer_role='2'";
                         $run_cust=mysqli_query($con,$sel_cust);
                         $count1=mysqli_num_rows($run_cust);
                         if($count1==1)
                         { 
                           echo " <a style='padding: 20px 40px; font-size: large; border-radius: 15px;' href='plso.php' class='btn btn-primary'>Back</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                           &nbsp;
                           <button style='padding: 20px 40px; font-size: large; border-radius: 15px;' type='submit' name='submit' value='<?php echo $c_id ?>' class='btn btn-primary'> Apply
                                    </button>
                                    ";} else { echo "<a style='padding: 20px 40px; font-size: large; border-radius: 15px;' href='my_account.php?my_lso' class='btn btn-primary' value=''>Back</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;"; } } ?>
                            </p>

                            <h4>
                                Requirement of products:
                                <?php echo $req ?> Pieces
                            </h4>
                            <h4>
                                Order price=
                                <?php echo $t_price ?> Rs
                            </h4>
                            <h4>
                                Order Description:
                                <?php echo $o_desc ?>
                            </h4>

                        </div>

                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="container2 " style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
                        <div class="box ">
                            <h3>
                                <center>
                                    <?php echo $c_name ?>
                                </center>
                            </h3>
                            <h4>
                                <img src="../customer/Customer-images/<?php echo $c_image ?>" width="460px" height="460px">
                            </h4>
                            <h4>
                                Email:
                                <?php echo $customer_email ?>
                            </h4>
                        </div>

                    </div>
                </div>
            </div>
        </form>



        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php 
     if(isset($_POST['submit'])){
     $plso_id=$_GET['plso_id'];
     $c_email=$_SESSION['customer_email'];
     $get="select * from customers where customer_email='$c_email'";
     $run=mysqli_query($con,$get);
     $row=mysqli_fetch_array($run);
     $c_id=$row['customer_id'];
     $c_name=$row['customer_name'];

     $check_product="select * from supplier where c_id='$c_id' AND plso_id='$plso_id'";
     $run_check=mysqli_query($con,$check_product);
     if(mysqli_num_rows($run_check)>0){
         echo "<script>alert('Applied alredy')</script>";
         echo "<script>window.open('lso_details.php?plso_id=$plso_id','_self')</script>";
     }
    
    else    
     {
     $send="insert into supplier(plso_id,product_name,date,c_id,c_name)values('$plso_id','$p_name',NOW(),'$c_id','$c_name')";
     $run1=mysqli_query($con,$send);
     if($run1){
      echo"<script>alert('Applied successfully')</script>"; 
    }}
}
     ?>