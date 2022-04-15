<div class="panel panel-default">
    <div class="panel-heading">
        <h3>
            <i class="fa a-money fa-w"></i>Applied Lso
        </h3>
    </div>

    <?php 
        if(isset($_SESSION['customer_email'])){
            $c_email=$_SESSION['customer_email'];
            $sel_cust="select * from customers where customer_email='$c_email' AND customer_role='2'";
            $run_cust=mysqli_query($con,$sel_cust);
            $count=mysqli_num_rows($run_cust);
            if($count==1)
            {
           echo "
            <div class='box same-height'>
                <!--icon End-->
                  
                <table class='table' >

                    <tbody>";                  
                              global $db;
                              $get_id="select * from customers where customer_email='$c_email'";
                              $run_C=mysqli_query($con,$get_id);
                              $row_c=mysqli_fetch_array($run_C);
                              $c_id=$row_c['customer_id'];
                              $get_p="select * from supplier where c_id='$c_id'";
                              $run_plso=mysqli_query($con,$get_p);
                             while($row=mysqli_fetch_array($run_plso))
                             {  $date=$row['date'];
                                $p_name=$row['product_name'];
                                $plso_id=$row['plso_id'];
                                $get_cust="select * from posted_lso where plso_id='$plso_id'";   
                               $run_cust=mysqli_query($con,$get_cust);
                               while($row_cust=mysqli_fetch_array($run_cust)){
                               $p_img=$row_cust['product_img1'];
                               $p_price=$row_cust['p_price'];
                               $req=$row_cust['req'];
                                $cst_email=$row_cust['customer_email'];}
                            
                        
                        ?>
    <?php echo"  </tbody>
       
        <tr> 
            <td>
                 <img src='../ORG/ORG_image/$p_img' width='50px' height='50px'>
             ";
                            ?>
    </td>

    <td>
        <a href='../ORG/lso_details.php?plso_id=<?php echo $plso_id ?>'>
            <?php echo $p_name  ?>
        </a>
    </td>
    <td>
        <?php echo $date ?>
    </td>
    <td>
        <?php echo $p_price ?>
    </td>

    <td>
        <?php echo $req  ?>
    </td>
    </tr>

    <?php  }  } } ?>
    </table>

</div>
<!--box-same-heigh End-->

</div>