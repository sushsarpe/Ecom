<?php 
include "../includes/db.php";

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
    <link rel="stylesheet" href="../Styles/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <div class='box same-height'>
            <table class="table">
                <tbody>
                    <?php 
$plso_id=$_GET['plso_id'];
$sel="select * from supplier where plso_id='$plso_id'";
$run=mysqli_query($con,$sel);
while($row=mysqli_fetch_array($run))
{   $p_name=$row['product_name'];
    $c_id=$row['c_id'];
    $c_name=$row['c_name'];
    $date=$row['date'];
?>
                </tbody>
                <tr>
                    <td>
                        <?php echo $c_id ?>
                    </td>
                    <td>
                        <?php echo $c_name ?>
                    </td>
                    <td>
                        <?php echo $date ?>
                    </td>
                    <td>
                        <form method="POST">
                            <button type="submit" name="submit" value="<?php echo $c_id ?>" class="btn btn-primary form-control">
                select
            </button>
                    </td>
                    <td>
                        <button type="submit" name="submit" value="<?php echo $c_id ?>" class="btn btn-primary form-control">
                reject
            </button>
                        </form>
                    </td>

                </tr>
            </table>

        </div>
    </div>

</body>
<?php
if (isset($_POST['submit']))
{   
    echo "<script>alert('customer is selected successfully for this lso :)')</script>";
    echo "<script>window.open('checkout.php?plso_id=$plso_id & c_id=$c_id','_self')</script>";
}
}
?>