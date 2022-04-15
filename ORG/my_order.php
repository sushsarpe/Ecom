<div>
    <center>
        <h1>
            My Orders
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quidem alias assumenda, dolores porro, maiores velit ab recusandae nemo animi voluptates corporis nobis maxime rem?</p>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thread>
                <tr>
                    <th>Sr. no</th>
                    <th>Product</th>
                    <th>Seller</th>
                    <th>Order price</th>
                    <th>Invoice_no</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Order Date</th>
                    <th>Payment method</th>
                    <th>Order Status</th>

                </tr>
            </thread>
            <tbody>
                <?php
            $customer_session= $_SESSION['customer_email'];
            $sel="select * from customer_order where plso_id in(select plso_id from posted_lso where customer_email='$customer_session')";
            $run=mysqli_query($con,$sel);
            while($row=mysqli_fetch_array($run))
            {
              $plso_id=$row['plso_id'];
                $i=0;
                $p="select * from posted_lso where plso_id='$plso_id'";
                $run_p=mysqli_query($con,$p);
                $row_p=mysqli_fetch_array($run_p);
                $p_name=$row_p['product_name'];
                $order_due_amount=$row['due_amount'];
                 $order_invoice_no=$row['invoice_no'];
                 $order_qty=$row['qty'];
                 $order_size=$row['size'];
                 $order_date=substr($row['order_date'], 0,11);
                 $cst_id=$row['customer_id'];
                 $cs="select * from customers where customer_id='$cst_id'";
                 $run_cs=mysqli_query($con,$cs);
                 $row_cs=mysqli_fetch_array($run_cs);
                 $cs_name=$row_cs['customer_name'];
               $order_status=$row['order_status'];
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
                            <?php echo  $p_name ?>
                        </td>
                        <td>
                            <?php echo  $cs_name ?>
                        </td>
                        <td>
                            <?php echo $order_due_amount  ?>
                        </td>
                        <td>
                            <?php echo $order_invoice_no  ?>
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
                            <?php echo $order_status  ?>
                        </td>

                    </Tr>
                    <?php } ?>
            </tbody>


        </table>
    </div>
</div>