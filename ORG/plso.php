<?php
session_start();
include("../includes/db.php");
include("../Admin_area/functions.php");
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
        <link rel="stylesheet" href="Styles/style.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    </head>

    <body>

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

        <div class="row">
            <div class="col-md-3">

            </div>

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            <i class="fa a-money fa-w"></i>Large Scale Order
                        </h3>
                    </div>

                    <?php 
                    if(isset($_SESSION['customer_email'])){
                        $c_email=$_SESSION['customer_email'];
                        $sel_cust="select * from customers where customer_email='$c_email' AND (customer_role='2' OR customer_role='3')";
                        $run_cust=mysqli_query($con,$sel_cust);
                        $count=mysqli_num_rows($run_cust);
                        if($count==1)
                        {
                       echo "
                        <div class='box same-height'>
                            <div class='icon'>
                                <i class='fa ''></i>
                                <h5>LSO</h5>
                            </div>
                            <!--icon End-->
                              
                            <table class='table' >
       
                                <tbody>";                  
                                          global $db;
                                          $get_plso="select * from posted_lso order by 1 DESC LIMIT 0,5";
                                         $run_plso=mysqli_query($db,$get_plso);
                                         while($row=mysqli_fetch_array($run_plso))
                                         {
                                        $plso_id=$row['plso_id'];
                                        $cust_email=$row['customer_email'];
                                        $get_cust="select * from customers where customer_email='$cust_email'";   
                                        $run_cust=mysqli_query($con,$get_cust);
                                        while($row_cust=mysqli_fetch_array($run_cust)){
                                        $cust_img=$row_cust['customer_image'];
                                        $cust_name=$row_cust['customer_name'];}
                                        $p_name=$row['product_name'];
                                        $req=$row['req'];
                                        $pro_id=$row['plso_id'];
                                    
                                    ?>
                    <?php echo"  </tbody>
                   
                    <tr> 
                        <td>
                             <img src='../customer/Customer-images/$cust_img' width='50px' height='50px'>
                         ";
                                        ?>
                    </td>
                    <td>
                        <?php echo $cust_name  ?>
                    </td>
                    <td>
                        <a href='lso_details.php?plso_id=<?php echo $plso_id ?>'>
                            <?php echo $p_name  ?>
                        </a>
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
        </div>
        <a style='padding: 20px 40px; font-size: large; border-radius: 15px;' href='../index.php' class='btn btn-primary'>Back</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        </div>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>