<?php
include("includes/db.php");
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insert Product</title>
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
                        <i class="fa fa-dashboard"></i> Dashboard/Insert Product
                    </li>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            <i class="fa a-money fa-w"></i>Insert Product
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product title</label>
                                <input type="text" name="product_title" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product category</label>
                                <select name="product_cat" class="form-control">
                            <option>Select a product category</option>
                            <?php
                            $get_p_cats="select * from product_categories";
                            $run_p_cats=mysqli_query($con,$get_p_cats);
                            while($row=mysqli_fetch_array($run_p_cats)){
                                $id=$row['p_cat_id'];
                                $cat_title=$row['p_cat_title'];
                                echo "<option value='$id >$cat_title' > </option>"; 
                            }
                            ?>  
                            <?php
                            $get_p_cats="select * from product_categories";
                            $run_p_cats= mysqli_query($con,$get_p_cats);
                            while($row=mysqli_fetch_array($run_p_cats)){
                                $slider_name=$row['p_cat_id'];
                                $slider_image=$row['p_cat_title'];
                                echo "<option value='$id >$cat_title' > </option> ";
                             }
                            ?>
                        </select>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product title</label>
                                <input type="text" name="product_title" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product title</label>
                                <input type="text" name="product_title" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product title</label>
                                <input type="text" name="product_title" class="form-control" required="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>