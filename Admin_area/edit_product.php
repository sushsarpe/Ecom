<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{
?>

    <?php
if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    $get_p="select * from product where product_id='$edit_id'";
    $run_edit=mysqli_query($con,$get_p);
    $row_edit=mysqli_fetch_array($run_edit);
    $p_id=$row_edit['product_id'];
    $p_title=$row_edit['product_title'];
    $p_cat=$row_edit['p_cat_id'];
    $image1=$row_edit['product_img1'];
    $image2=$row_edit['product_img2'];
    $image3=$row_edit['product_img3'];
    $p_price=$row_edit['product_price'];
    $p_desc=$row_edit['product_desc'];
  
}
$get_p_cat="select * from product_categories where p_cat_id='$p_cat'";
$run_p_cat=mysqli_query($con,$get_p_cat);
$row_p_cat=mysqli_fetch_array($run_p_cat);
$p_cat_title=$row_p_cat['p_cat_title'];
?>

        <!DOCTYPE html>
        <html>

        <head>
            <title> Edit Products</title>
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <script>
                tinymce.init({
                    selector: 'textarea'
                });
            </script>
        </head>

        <body>
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard/Edit Product
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa a-money fa-w"></i>Edit Product
                            </h3>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product title</label>
                                    <div class="col-md-6">
                                        <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Category</label>
                                    <div class="col-md-6">
                                        <select name="product_cat" class="form-control">
<option value="<?php echo $p_cat ?>">
    <?php echo $p_cat_title ?>
</option>

<?php
$get_p_cats="select * from product_categories";
$run_p_cats=mysqli_query($con,$get_p_cats);
while($row_p_cats=mysqli_fetch_array($run_p_cats)){
$p_cat_id=$row_p_cats['p_cat_id'];
$p_cat_title=$row_p_cats['p_cat_title'];
echo"<option value='p_cat_id' >$p_cat_title</option>";
}
?>

</select>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Image 1</label>
                                    <div class="col-md-6">
                                        <input type="file" name="product_img1" class="form-control" required>
                                        <br><img src="../customer/product_img/<?php echo $image1; ?>" width=50px height=40px>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Image 2</label>
                                    <div class="col-md-6">
                                        <input type="file" name="product_img2" class="form-control" required>
                                        <br><img src="../customer/product_img/<?php echo $image2; ?>" width=50px height=40px>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Image 3</label>
                                    <div class="col-md-6">
                                        <input type="file" name="product_img3" class="form-control" required>
                                        <br><img src="../customer/product_img/<?php echo $image3; ?>" width=50px height=40px>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Price</label>
                                    <div class="col-md-6">
                                        <input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Description</label>
                                    <div class="col-md-6">
                                        <textarea name="product_desc" class="form-control" rows="6" cols="19">
                                          <?php echo $p_desc; ?>
                                       </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-6">
                                        <input type="submit" name="submit" value="Update Product" class="btn btn-primary form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </body>

        </html>
        <?php
      if(isset($_POST['submit'])){
        echo "<script>alert('Product has been updated successfully')</script>"; 
   $product_title=$_POST['product_title'];
   $product_cat=$_POST['product_cat'];
   $product_price=$_POST['product_price'];
   $product_desc=$_POST['product_desc'];


    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    $temp_name1=$_FILES['product_img1']['name'];
    $temp_name2=$_FILES['product_img2']['name'];
  $temp_name3=$_FILES['product_img3']['name'];

move_uploaded_file($temp_name1,"../customer/product_img/$product_img1");
move_uploaded_file($temp_name2,"../customer/product_img/$product_img2");
move_uploaded_file($temp_name3,"../customer/product_img/$product_img3");



$update_product="update product set p_cat_id='$product_cat', date=NOW(), product_title='$product_title',product_img1= '$product_img1',product_img2= '$product_img2',product_img3= '$product_img3',product_price='$product_price',product_desc='$product_desc' where product_id='$p_id'";

$run_product =mysqli_query($con, $update_product);
if($run_product){
    
    echo "<script>window.open('index.php?view_product', '_self')</script>"; 
}
}
?>
            <?php } ?>