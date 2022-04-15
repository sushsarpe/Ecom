<?php
include("../includes/db.php");
?>

    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!--col-md-3 col-sm-6 start-->
                    <h4>Pages</h4>
                    <ul>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="customer/my_account.php">My Account</a></li>
                    </ul>
                    <hr>
                    <h4>User Section</h4>
                    <ul>
                        <li><a href="checkout.php">Login</a></li>
                        <li><a href="registration.php">Registration</a></li>
                    </ul>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <!--col-md-3 col-sm-6 end-->
                <div class="col-md-3 col-sm-6">
                    <!--col-md-3 col-sm-6 start-->
                    <h4>Top Product Categories</h4>
                    <ul>
                        <?php
                $get_p_cats="select * from product_categories";
                $run_p_cats=mysqli_query($con,$get_p_cats);
                while ($row_p_cat=mysqli_fetch_array($run_p_cats))
                {
                    $p_cat_id=$row_p_cat['p_cat_id'];
                    $p_cat_title=$row_p_cat['p_cat_title'];
                    echo "<li><a href='shop.php?p_cat_id'>$p_cat_title</a></li>";
                }
                 ?>
                    </ul>
                    <hr class="hidden-md hidden-lg">
                </div>
                <!--col-md-3 col-sm-6 end-->
                <div class="col-md-3 col-sm-6">
                    <h4>Where to Find Us</h4>
                    <p>
                        <strong>Home Business Group</strong>
                        <br>Nerul
                        <br>Juinagar
                        <br>Vashi
                        <br>homebusiness@gmail.com
                        <br>+91 9876544569
                    </p>
                    <a href="contactus.php">Goto Contact us Page</a>
                    <hr class="hidden-md hidden-lg">

                </div>
                <div class="col-md-3 col-sm-6">
                    <h4>Get news</h4>
                    <p class="text-muted">
                        Connect Here to get new updates and news about daily deals
                        <br>Enter Email Id:
                    </p>
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" name="email" class="form-control">
                            <span class="input-group-btn">
                           <input type="submit" class="btn btn-default" val="subscribe">
                       </span>
                        </div>
                    </form>
                    <hr>
                    <h4>Stay in Touch</h4>
                    <p class="social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>