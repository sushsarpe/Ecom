<?php
$db=mysqli_connect("localhost","root","","homebusiness");

function getUserIP(){
    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

function addCart(){
    global $db;
    if(isset($_GET['add_cart'])){
     $c_email=$_SESSION['customer_email'];
     $sel_id="select * from customers where customer_email='$c_email'";
     $run_s=mysqli_query($db,$sel_id);
     $row_s=mysqli_fetch_array($run_s);
     $c_id=$row_s['customer_id'];
     $ip_add=getUserIP();
     $p_id=$_GET['add_cart'];
     $product_qty=$_POST['product_qty'];
     $product_size=$_POST['product_size'];
     $check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
     $run_check=mysqli_query($db,$check_product);
     if(mysqli_num_rows($run_check)>0){
         echo "<script>alert('This product is alredy addded in cart')</script>";
         echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
     }else{
         $query="insert into cart(p_id,cs_id,ip_add,qty,size) values('$p_id','$c_id','$ip_add','$product_qty','$product_size')";
         $run_query=mysqli_query($db,$query);
         echo "<script>alert(' Product addded in cart')</script>";
         echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
     }
    }
}

function Item()
{
    global $db;
    $ip_add=getUserIP();
    $c_email=$_SESSION['customer_email'];
     $sel_id="select * from customers where customer_email='$c_email'";
     $run_s=mysqli_query($db,$sel_id);
     $row_s=mysqli_fetch_array($run_s);
     $c_id=$row_s['customer_id'];
    $get_items="select * from cart where cs_id='$c_id'";
    $run_item=mysqli_query($db,$get_items);
    $count=mysqli_num_rows($run_item);
    echo $count;

}

function totalPrice()
{
   global $db;
   $ip_add=getUserIP();
   $total=0;
   $select_cart="select * from cart where ip_add='$ip_add'";
   $run_cart=mysqli_query($db,$select_cart);
   while($record=mysqli_fetch_array($run_cart)){
       $pro_id=$record['p_id'];
       $pro_qty=$record['qty'];
       $get_price="select * from product where product_id='$pro_id'";
       $run_price=mysqli_query($db,$get_price);
       while($row=mysqli_fetch_array($run_price))
       {
           $sub_total=$row['product_price']*$pro_qty;
           $total +=$sub_total;
       }
   }
   echo $total;
}


function getPro(){
    global $db;
   $get_product="select * from product order by 1 DESC LIMIT 0,4";
   $run_product=mysqli_query($db,$get_product);
    while ($row_product=mysqli_fetch_array($run_product)) {
     $c_id=$row_product['c_id']; 
     $pro_id=$row_product['product_id'];
     $pro_title=$row_product['product_title'];
     $pro_price=$row_product['product_price'];
     $pro_img1=$row_product['product_img1'];
     $c="select * from customers where customer_id='$c_id'";
     $run_c=mysqli_query($db,$c);
     $row_c=mysqli_fetch_array($run_c);
     $c_name=$row_c['customer_name'];
   
     echo "<div class='col-md-3 col-sm-6'>
         <div class='product'>
        <a href='details.php?pro_id=$pro_id'>
            <img src='Admin_area/product_img/$pro_img1' width='250px' height='250px'>

        </a> 
        <div class='text'>
            <h3>
                <a href='details.php?pro_id=$pro_id'>$pro_title</a>
            </h3>
            <p class='price'>INR $pro_price</p>
            <center><h3>Seller: $c_name</h3></center>
            <p class='buttons'>
                <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                <a href='cart.php?pro_id=$pro_id'class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
            </p>
        </div>  
    </div>   
        </div>";
    }

}


function getPCats(){
    global $db;
    $get_p_cats="select * from product_categories";
    $run_p_cats=mysqli_query($db,$get_p_cats);
    while($row=mysqli_fetch_array($run_p_cats)){
        $p_cat_id=$row['p_cat_id'];
        $p_cat_title=$row['p_cat_title'];

        echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title</a></li>";
    }
}

/*GET CATEGORYWISE PRODUCT*/
function getpcatpro(){
    global $db;
    if(isset($_GET['p_cat'])){
       $p_cat_id=$_GET['p_cat'];
       $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
       $run_p_cat=mysqli_query($db,$get_p_cat);
       $row_p_cat=mysqli_fetch_array($run_p_cat);
       $p_cat_title=$row_p_cat['p_cat_title'];
       $p_cat_desc=$row_p_cat['p_cat_desc'];

       $get_products="select * from product where p_cat_id='$p_cat_id'";
       $run_products=mysqli_query($db,$get_products);
       $count=mysqli_num_rows($run_products);
       if($count==0){
           echo "
           <div class='box'>
               <h1>
                   No Products found in this product category  
               </h1>

           </div>";
       }
       else{

        echo"
        <div class='box'>
            <h1>$p_cat_title</h1>
            <p>$p_cat_desc</p>
        </div>";
       }

       while($row_products=mysqli_fetch_array($run_products)){
        $c_id=$row_products['c_id'];
        $pro_id=$row_products['product_id'];
         $pro_title=$row_products['product_title'];
         $pro_price=$row_products['product_price'];
         $pro_img1=$row_products['product_img1'];

         $c="select * from customers where customer_id='$c_id'";
         $run_c=mysqli_query($db,$c);
         $row_c=mysqli_fetch_array($run_c);
         $c_name=$row_c['customer_name'];

       echo "<div class='col-md-4 col-sm-6'>
        <div class='product'>
       <a href='details.php?pro_id=$pro_id'>
           <img src='Admin_area/product_img/$pro_img1' width='250px' height='250px'>

       </a> 
       <div class='text'>
           <h3>
               <a href='details.php?pro_id=$pro_id'>$pro_title</a>
           </h3>
           <p class='price'>INR $pro_price</p>
           <center><h3>Seller: $c_name</h3></center>
           <p class='buttons'>
               <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
               <a href='cart.php?pro_id=$pro_id'class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
           </p>
       </div>  
   </div>   
       </div>";  
    }
    }
}

function item2()
{
    global $db;
    $customer_email=$_SESSION['customer_email'];
    $get_items="select * from lso_cart where customer_email='$customer_email'";
    $run_item=mysqli_query($db,$get_items);
    $count=mysqli_num_rows($run_item);
    echo $count;  
}

function totalPrice1() {
     global $db; 
     $customer_email=$_SESSION['customer_email']; 
     $total=0; 
     $select_cart="select * from lso_cart where customer_email='$customer_email'"; 
     $run_cart=mysqli_query($db,$select_cart); 
     while($record=mysqli_fetch_array($run_cart)){
    $pro_id=$record['lso_id']; 
    $pro_qty=$record['req']; 
    $get_price="select * from lso where lso_id='$pro_id'"; 
    $run_price=mysqli_query($db,$get_price); 
    while($row=mysqli_fetch_array($run_price)) 
    { $sub_total=$row['p_price']*$pro_qty; 
    $total +=$sub_total;
    } 
   }
echo $total; 
}
?>