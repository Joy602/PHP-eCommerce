<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<style>
    body{
        overflow-x:hidden;
    }
    .payment_img{
        width:90%;
        margin:auto;
        display:block;
    }
</style>

<body>
    <!-- php code to access user id -->
    <?php
        $user_ip = getIPAddress();
        $get_user = "select * from `user_table` where user_ip = '$user_ip'";
        $result = mysqli_query($conn,$get_user);

        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];



    ?>
    <div class="container">
        <h2 class="text-center text-info mt-3">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="blank"><img src="../images/paypal.jpg" alt="" class="payment_img"></a>

            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>" target=""><h2 class="text-center">Pay offline</h2></a>

            </div>
        </div>
    </div>
</body>

</html>