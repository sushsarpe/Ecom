<?php

$customer_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$customer_email' ";
$run_cust=mysqli_query($con,$get_customer);
$row_cust=mysqli_fetch_array($run_cust);
$customer_id=$row_cust['customer_id'];
$customer_name=$row_cust['customer_name'];
$customer_email=$row_cust['customer_email'];
$customer_city=$row_cust['customer_city'];
$customer_contact=$row_cust['customer_contact'];
$customer_address=$row_cust['customer_address'];
$customer_image=$row_cust['customer_image'];
?>
    <div class="box">
        <center>
            <h1>Edit Your Account</h1>
        </center>


        <div class="form-group">
            <label> Customer Name</label>
            <input type="text" name="c_name" required=" " class="form-control" value="<?php echo $customer_name ?>" id="">
        </div>

        <div class="form-group">
            <label>Customer Email</label>
            <input type="text" name="c_email" required=" " class="form-control" value="<?php echo $customer_email ?>" id="">
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="c_city" required=" " class="form-control" value="<?php echo $customer_city ?>" id="">
        </div>

        <div class="form-group">
            <label>Contact No</label>
            <input type="text" name="c_contact" required=" " class="form-control" value="<?php echo $customer_contact ?>" id="">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="c_address" required=" " class="form-control" value="<?php echo $customer_address ?>" id="">
        </div>

        <div class="form-group">
            <label>Profile picture</label>
            <input type="file" name="c_img" required=" " class="form-control" id="">
            <img src="../customer/Customer-images/<?php echo $customer_image; ?>" class="img-responsive" height=100px width=100px alt=" ">
        </div>

        <div class="text-center ">
            <button type="submit " name="update " class="btn btn-primary ">
         <i class="fa fa-user-md "></i>Update Now  
        </button>
        </div>

    </div>


    <?php
    if(isset($_POST['update'])){
        $update_id=$customer_id;
        $c_name=$POST['c_name'];
        $c_email=$_POST['c_email'];
        $c_city=$_POST['c_city'];
        $c_contact=$_POST['c_contact'];
        $c_address=$_POST['c_address'];
        $c_image=$_FILE['c_image']['name'];
        $c_image_tmp=$_FILE['c_image']['tmp_name'];
    
        move_uploaded_file(c_image_tmp,"customer-images/c_image");
        $update_customer= "update customers set customer_name='c_name',
          customer_email='c_email',customer_city='c_city',customer_contact='c_contact',
          customer_address='c_address',customer_image='c_image' where customer_id='$update_id'";
          
    }