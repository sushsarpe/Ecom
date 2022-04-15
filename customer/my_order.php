<div>
    <center>
        <h1>
            My Orders
        </h1>

    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thread>
                <tr>
                    <th>Sr. no</th>
                    <th>Product</th>
                    <th>price</th>
                    <th>Invoice_no</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Order Date</th>
                    <th>Payment method</th>
                    <th>Order Status</th>
                    <th>Rate seller with points out of 5</th>
                </tr>
            </thread>
            <tbody>
                <?php
            $customer_session= $_SESSION['customer_email'];
            $get_customer="select * from customers where customer_email='$customer_session'";
            $run_cust=mysqli_query($con,$get_customer);
            $row_cust=mysqli_fetch_array($run_cust);
            $customer_id=$row_cust['customer_id'];
            $get_order="select * from customer_order where customer_id='$customer_id'";
            $run_order=mysqli_query($con,$get_order);
            $i=0;
            while ($row_order=mysqli_fetch_array($run_order)) {
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
                            <?php echo $pro_name ?>
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
                        <td>
                            <form class="rating" method="POST">
                                <label>
                                  <input type="radio" name="stars" value="1" />
                                  <span class="icon">★</span>
                                </label>
                                <label>
                                  <input type="radio" name="stars" value="2" />
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>
                                </label>
                                <label>
                                  <input type="radio" name="stars" value="3" />
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>   
                                </label>
                                <label>
                                  <input type="radio" name="stars" value="4" />
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>
                                </label>
                                <label>
                                  <input type="radio" name="stars" value="5" />
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>
                                  <span class="icon">★</span>
                                </label>

                            </form>
                            <a href="my_order.php?order_id=">
                                <button type="submit" name="submit" value="customer_id">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </button>
                            </a>

                        </td>
                    </Tr>
                    <?php } ?>
            </tbody>


        </table>
    </div>
</div>
<?php
 if(isset($_GET['order_id']))
 {
     echo "<script>alert('rated successfully')</script>";
     echo "<script>window.open('my_account.php?my_order','_self')</script>";
     }
     ?>
    <style>
        .rating {
            display: inline-block;
            position: relative;
            height: 20px;
            line-height: 20px;
            font-size: 20px;
        }
        
        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }
        
        .rating label:last-child {
            position: static;
        }
        
        .rating label:nth-child(1) {
            z-index: 5;
        }
        
        .rating label:nth-child(2) {
            z-index: 4;
        }
        
        .rating label:nth-child(3) {
            z-index: 3;
        }
        
        .rating label:nth-child(4) {
            z-index: 2;
        }
        
        .rating label:nth-child(5) {
            z-index: 1;
        }
        
        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }
        
        .rating label .icon {
            float: left;
            color: transparent;
        }
        
        .rating label:last-child .icon {
            color: #000;
        }
        
        .rating:not(:hover) label input:checked~.icon,
        .rating:hover label:hover input~.icon {
            color: #09f;
        }
        
        .rating label input:focus:not(:checked)~.icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #09f;
        }
    </style>
    <script>
        $(':radio').change(function() {
            console.log('New star rating: ' + this.value);
        });
    </script>