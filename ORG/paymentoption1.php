<div class="box">
    <?php
$session_email=$_SESSION['customer_email'];
$select_customer="select * from customers where customer_email='$session_email'";
$run_cust=mysqli_query($con,$select_customer);
$row_customer=mysqli_fetch_array($run_cust);
$customer_id=$row_customer['customer_id'];
$c_role=$row_customer['customer_role'];
$plso_id=$_GET['plso_id'];
$c_id=$_GET['c_id'];


?>

        <h1 class="text-center">PAYMENT OPTION
            <h1>
                <p class="lead text-center">

                    <?php
             echo "<a href='order2.php?plso_id=$plso_id&c_id=$c_id'>PAY OFFLINE</a>";
               ?>
                </p>
                <center>
                    <p class="lead">
                        <a href="#">PAY WITH PAYTM
          <img src="../images/paytm.png"width="250 " height="230" class="img-responsive"></a>
                    </p>
                </center>

</div>