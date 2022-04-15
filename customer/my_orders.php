<div class="col-md-12 box">
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
                            <?php echo $order_status ?>
                            <?php if ($order_status=='not ready'){
                           echo" <form method='POST'>
                                <button action='orders.php?order_id=' type='submit' name='submit' value='$order_id'> READY
                            </button>
                            </form>"; }?>
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

<?php 
if(isset($_POST['submit']))
{  $od_status='ready';
   $update="update customer_order set order_status='$od_status' where order_id='$order_id'" ;
   $run=mysqli_query($con,$update);
   if($run){
echo "<script>alert('working')</script>";
echo "<script>window.open('my_account.php?my_orders','_self')</script>";
   }
}