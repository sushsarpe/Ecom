<?php
session_start();
include("../includes/db.php");
include("../Admin_area/functions.php");
?>
    <?php
if(isset($_GET['plso_id']))
{   
  $c_id=$_GET['c_id'];
  $plso_id=$_GET['plso_id'];
    $sel_plso="select * from posted_lso where plso_id='$plso_id'";
    $run_p=mysqli_query($con,$sel_plso);
    while($row_p=mysqli_fetch_array($run_p)){
    $price=$row_p['p_price'];
    $req=$row_p['req'];
    $total=$price*$req;
    }
    $size='-';
   $status='not ready';
   $invoice_no=mt_rand();
   
   $post="insert into customer_order(customer_id,plso_id,due_amount,invoice_no,qty,size,order_date,order_status) values('$c_id','$plso_id','$total','$invoice_no','$req','$size',NOW(),'$status')";
   $run_post=mysqli_query($con,$post);
   while($run_post)
   {
     echo "<script>alert('order posted successfully :)')</script>";
     echo "<script>window.open('checkout.php','_self')</script>";
   }
   }
   ?>