<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
    <div class row="row">
        <div col-lg-12>
            <ol class="breadcrumb"></ol>
            <li class="active">
                <i class="fa fa-dashboard"></i>Dashboard/View Product
            </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i>View Products
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-respomsive">
                        <table class="table table-bordered table-hover 
                 table-stripped">
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Seller name</th>
                                    <th>Product Date</th>
                                    <th>Product Delete</th>
                                    <th>Product Edit</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
        $i=0;
        $get_product="select * from product";
        $run_product=mysqli_query($con,$get_product);
        while ($row=mysqli_fetch_array($run_product)){
            $pro_id=$row['product_id'];
            $pro_title=$row['product_title'];
            $pro_img1=$row['product_img1'];
            $pro_price=$row['product_price'];
            $date=$row['date'];
            $i++;
            $c_id=$row['c_id'];
            $c="select * from customers where customer_id='$c_id'";
            $r=mysqli_query($con,$c);
            $row_c=mysqli_fetch_array($r);
            $cs_name=$row_c['customer_name'];
            ?>


                                    <tr>
                                        <td>
                                            <?php echo $i ?>
                                        </td>
                                        <td>
                                            <?php echo $pro_title ?>
                                        </td>
                                        <td><img src="product_img/<?php echo $pro_img1 ?>" width=50px height=40px></td>
                                        <td>
                                            <?php echo $pro_price ?>
                                        </td>
                                        <td>
                                            <?php echo $cs_name ?>
                                        </td>
                                        <td>
                                            <?php echo $date ?>
                                        </td>
                                        <td>
                                            <a href="index.php?delete_product=<?php echo $pro_id ?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?edit_product=<?php echo $pro_id ?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php }?>