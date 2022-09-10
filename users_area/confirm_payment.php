<?php
    include('../includes/connect.php');
  
    session_start();

    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];

        $select_data = "select * from `user_orders` where order_id = $order_id";
        $result = mysqli_query($conn,$select_data);

        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'];
        $amount_due = $row_fetch['amount_due'];
          

    }
    if(isset($_POST['confirm_payment_btn'])){
        $invoice_number = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];

        $insert_query = "insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values($order_id, $invoice_number, $amount, '$payment_mode')";
        $result = mysqli_query($conn,$insert_query);

        if($result){
            echo "<h3 class='text-center text-light'>Payment completed successfully!!</h3>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }
        $update_orders = "update `user_orders` set order_status='Complete' where order_id=$order_id";
        $result_orders = mysqli_query($conn,$update_orders);


    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>

        <form action="" method="post">

            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                 <select name="payment_mode" id="" class="form-select w-50 m-auto">
                    <option >Select Payment Method</option>
                    <option >Nogod</option>
                    <option >Bkash</option>
                    <option >DBBL</option>
                    <option >Cash on Delivery</option>
                    <option >Pay offline</option>
                 </select>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" name="confirm_payment_btn" id="" class="bg-info py-2 px-3 border-0" value="Confirm">
            </div>

        </form>
    </div>

</body>

</html>