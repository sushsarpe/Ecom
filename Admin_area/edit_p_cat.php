<?php 

if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.open('login.php','_self')</script>";
}
else{
?>
<?php
 if(isset($_GET['edit_p_cat'])){
    $edit_p_cat_id=$_GET['edit_p_cat'];
    $edit_p_cat_query= "select * FROM `product_categories` WHERE 
    `p_cat_id`='$edit_p_cat_id'";
    $run_edit=mysqli_query($con,$edit_p_cat_query);
    $row_edit=mysqli_fetch_query($run_edit);
    $p_cat_id=$row_edit['p_cat_id']
    $p_cat_title=$row_edit['p_cat_title']
    $p_cat_desc=$row_edit['p_cat_desc']
    }
 }
}
?>

<div class="row">
 <div class="col-lg-12">
 <ol class="breadcrumb">
 <li>
 <i class="fa fa-dashboard"></i> Dashboard/Edit Product Category
</li>
</ol>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<i class="fa a-money fa-w"></i>Edit Product Category
</h3>
</div>

<div class="panel-body">
<form class="form-horizontal" action="" method="post">
<div class="form-group">
<label class="col-md-3 control-label">Product Category Title</label>
<div class="col-md-6">
<input type="text" name="p_cat_title" class="form-control" value=
"<?php echo $p_cat_title; ?>">
</div>
</div>
<div class="form-group" ><!-- form-group Starts--->
<label class="col-md-3 control-label" >Product Category Description</label>
<div class="col-md-6">
<textarea type="text" name="p_cat_desc" class="form-control" > <?php echo $p_cat_desc; ?>
</textarea>
</div>
</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts-->
<label class="col-md-3 control-label" ></label>
<div class="col-md-6" >
<input type="submit" name="update" value="Update Now" class="btn btn-primary form-control" >
</div>
</div>
</form>
</div>
</div>
<?php

if(isset($_POST['update'])) {
$p_cat_title = $_POST['p_cat_title'];
$p_cat_desc $_POST['p_cat_desc'];

$update_p_cat = "update product categories set p_cat_title='$ 
p_cat_title',p_cat_desc='$p_cat_desc' where p_cat_id='$
p_cat_id";

$run_p_cat = mysqli_query($con, $update_p_cat);
if($run_p_cat) {
echo "<script>alert('Product Category has been Updated')
echo "<script>
window.open('index.php?view_p_cats', '_self')</script>

}
}
?>
<?php } ?>