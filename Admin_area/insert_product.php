<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
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
        <title>Insert Product</title>
        <script>tinymce.init({selector:'textarea'});</script>
       

   
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
            <div class="col-md-3">

            </div>

            <div class="col-lg-6">
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
                            <option>Select a product_category</option>

                            <?php
                            $get_p_cats="select * from product_categories";
                            $run_p_cats= mysqli_query($con,$get_p_cats);
                            while($row=mysqli_fetch_array($run_p_cats)){
                                $id=$row['p_cat_id'];
                                $cat_title=$row['p_cat_title'];
                                echo "<option value='$id'>$cat_title</option> ";
                             }
                            ?>
                        </select>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product img1</label>
                                <input type="file" name="product_img1" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product img2</label>
                                <input type="file" name="product_img2" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product image3</label>
                                <input type="file" name="product_img3" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product price</label>
                                <input type="text" name="product_price" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product keyword</label>
                                <input type="text" name="product_keyword" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product description</label>
                                <textarea name="product_desc" id="form-control" cols="19" rows="6"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" value="Add Product" class="btn btn-primary form-control">
                                    Add Product
                            </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>


    <?php
    if (isset($_POST['submit'])) {
        $product_title=$_POST['product_title'];
        $product_cat=$_POST['product_cat'];
        $product_desc=$_POST['product_desc'];
        $product_keyword=$_POST['product_keyword'];
        $product_price=$_POST['product_price'];

        $product_img1=$_FILES['product_img1']['name'];
        $product_img2=$_FILES['product_img2']['name'];
        $product_img3=$_FILES['product_img3']['name'];

        $temp_name1=$_FILES['product_img1']['tmp_name'];
        $temp_name2=$_FILES['product_img2']['tmp_name'];
        $temp_name3=$_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "product_img/$product_img1");
        move_uploaded_file($temp_name2, "product_img/$product_img2");
        move_uploaded_file($temp_name3, "product_img/$product_img3");

        $insert_product="insert into product(p_cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword) values('$product_cat',NOW(),'$product_title',
        '$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keyword')";
        
        $run_product=mysqli_query($con,$insert_product);

        if($run_product){
        echo "<script>alert('Product Inserted Successfully')</script>";
        echo "<script>window.open('index.php?view_product')</script>";
        }
    }
    ?>
    <?php } ?>