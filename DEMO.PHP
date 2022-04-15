<!DOCTYPE html>
<html lang="en-US">

<body>


    <div id="google_translate_element"></div>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



</body>

</html>
if(isset($_GET['pro_id'])){ $lso_id=$_GET['pro_id']; $sel_lso="select * from lso where lso_id='$lso_id'"; $run_sel=mysqli_query($con,$sel_lso); while($row=mysqli_fetch_array($run_sel)){ $c_email=$row['customer_email']; $p_cat=$row['pro_cat']; $p_title=$row['product_name'];
$p_img1=$row['product_img1']; $p_img2=$row['product_img2']; $p_img3=$row['product_img3']; $p_price=$row['p_price']; $pro_qty=$row['req']; $o_desc=$row['order_desc'];