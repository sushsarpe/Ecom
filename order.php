<?php
session_start();
include("includes/db.php");
include("Admin_area/functions.php");
?>
    <?php
if(isset($_GET['c_id'])){
$customer_id=$_GET['c_id'];
}
$ip_add=getUserIP();

$status="not ready";
$invoice_no=mt_rand();
$select_cart="select * from cart where cs_id='$customer_id'";
$run_cart=mysqli_query($con,$select_cart);
while($row_cart=mysqli_fetch_array($run_cart)) {
    $pro_id=$row_cart['p_id'];
    $size=$row_cart['size'];
    $qty=$row_cart['qty'];

 $get_product="select * from product where product_id='$pro_id'";
 $run_pro=mysqli_query($con,$get_product);
  while($row_pro=mysqli_fetch_array($run_pro)) {
      $sub_total=$row_pro['product_price'] * $qty;

      $insert_cust="insert into customer_order
      (customer_id,product_id,due_amount,invoice_no,qty,size,order_date,order_status) values('$customer_id','$pro_id','$sub_total','$invoice_no','$qty','$size',NOW(),'$status')
      ";
      
     $run_cust=mysqli_query($con,$insert_cust);

     $delete_cart="delete  from cart where ip_add='$ip_add'";
     $run_del=mysqli_query($con,$delete_cart);
     echo"<script>alert('Your order has been submitted,THANKS')</script>";
     echo"<script>window.open('customer/my_account.php?my_order','_self')</script>";
  }

}
?>