<?php
include("../includes/db.php");
?>


    <div class="panel panel-default">


        <?php 
        if(isset($_SESSION['customer_email'])){
            $c_email=$_SESSION['customer_email'];
            $sel_cust="select * from customers where customer_email='$c_email' AND (customer_role='2' OR customer_role='3')";
            $run_cust=mysqli_query($con,$sel_cust);
            $count=mysqli_num_rows($run_cust);
            if($count==1)
            {  while($row=mysqli_fetch_array($run_cust))
                { $cs_id=$row['customer_id'];
           echo "
            <div class='box same-height'>
               
                <!--icon End-->
                  
                <table class='table' >
                    <thead>
                        <tr>
                            <th>LSO</th>
                            <th>Date</th>
                            <th>Product name</th>
                            <th >Requirement</th>
                            <th>Order Price</th>
                            <th>Suppliers</th>
                            
                        </tr>
                    </thead>
                    <tbody>";                  
                              global $db;
                              $get_plso="select * from posted_lso where customer_email='$c_email'";
                             $run_plso=mysqli_query($db,$get_plso);
                             while($row=mysqli_fetch_array($run_plso))
                             {
                            $plso_id=$row['plso_id'];
                            $date=$row['date'];
                            $cust_email=$row['customer_email'];
                            $get_cust="select * from customers where customer_email='$cust_email'";   
                            $run_cust=mysqli_query($con,$get_cust);
                            while($row_cust=mysqli_fetch_array($run_cust)){
                            $cust_img=$row_cust['customer_image'];
                            $cust_name=$row_cust['customer_name'];}
                            $p_name=$row['product_name'];
                            $p_price=$row['p_price'];
                            $req=$row['req'];
                            $pro_id=$row['plso_id'];

                            $get_supplier="select * from supplier where plso_id='$plso_id'";
                            $run_s=mysqli_query($con,$get_supplier);
                            while($row_s=mysqli_fetch_array($run_s)){
                             $count=mysqli_num_rows($run_s);
                            }

                        ?>
        <?php echo"  </tbody>
       
        <tr> 
            <td>
                 <img src='../customer/Customer-images/$cust_img' width='50px' height='50px'>
             ";
                            ?>
        </td>
        <td>
            <?php echo $date  ?>
        </td>
        <td>
            <a href='lso_details.php?plso_id=<?php echo $plso_id ?>'>
                <?php echo $p_name  ?>
            </a>
        </td>
        <td>
            <?php echo $req  ?>
        </td>
        <td>
            <?php $total=$p_price * $req; echo $total ?>

        </td>
        <td>
            <a href="supplier.php?plso_id=<?php echo $plso_id ?>">
                <?php echo $count ?>
            </a>
        </td>

        </tr>

        <?php }   } } }?>
        </table>

    </div>
    <!--box-same-heigh End-->

    </div>