<?php 

if(!isset($_SESSION['admin_email']))
{
    echo "<script>window.open('login.php','_self')</script>";
}
else{
    ?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>Dashboard / Insert Products Category
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Product Category Title</label>
                        <div class="col-md-6">
                            <input type="text" name="p_cat_title" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Product Category Description</label>
                        <div class="col-md-6">
                            <textarea type="text" name="p_cat_desc" class="form-control" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php
 if(isset($_POST['submit'])){
     $p_cat_title=$_POST['p_cat_title'];
     $p_cat_desc=$_POST['p_cat_desc'];
     $insert_p_cat="insert into product_categories(p_cat_title,p_cat_desc) values ('$p_cat_title','$p_cat_desc')";
     $run_p_cat=mysqli_query($con,$insert_p_cat);
     if($run_p_cat){
        echo "<script>alert('New Product Category Has Been Inserted')</script>";
        echo "<script>window.open('index.php?view_product_cat','_self')</script>"; 
     }
 }
 ?>

    <?php } ?>