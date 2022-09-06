<!-- Database connection -->
<?php
    include('includes/connect.php');
    include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart details</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
    .cart_img {
        width: 80px;
        height: 80px;
        object-fit:contain;
    }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <!-- first child -->
        <!-- navBar -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="" class="logoImg">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i
                                    class="fa-solid fa-cart-plus"></i><sup><?php    cart_item();?></sup></a>
                        </li>

                    </ul>


                </div>
            </div>
        </nav>

        <!-- calling cart funtion -->
        <?php
        cart();
        ?>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of eCommerce and Community</p>
        </div>

        <!-- fourth child -->
        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Prouct Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php code to display dynamic data -->
                        <?php
                        global $conn;
                        $get_ip_add = getIPAddress(); 
                        $total_price = 0;
                
                        $cart_query = "select * from `cart_details` where ip_address = '$get_ip_add' ";
                        $result = mysqli_query($conn,$cart_query);
                
                        while($row = mysqli_fetch_array($result)){
                            $product_id = $row['product_id'];
                            $select_products = "select * from `products` where product_id  = '$product_id'";
                            $result_products = mysqli_query($conn,$select_products);
                
                            while($row_product_price = mysqli_fetch_array($result_products)){
                                $product_price = array($row_product_price['product_price']);

                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];

                                $product_values = array_sum($product_price);
                                $total_price+=$product_values;
                
                          
                    ?>
                        <tr>
                            <td><?php echo $product_title?></td>
                            <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                            
                            <td><input type="text"  name="" id="" class="form-input w-50"></td>
                            <td><?php echo $price_table?></td>
                            <td><input type="checkbox"></td>
                            <td>
                                <button class="bg-info px-3 py-2 border-0 mx-3">Update</button>
                                <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex mb-5">
                    <h4 class="px-3">Subtotal: <strong class="text-info"><?php echo $total_price?>/=</strong></h4>
                    <a href="index.php"><button class="bg-info px-3 py-2 mx-3 border-0">Continue Shopping</button></a>
                    <a href="#"><button class="bg-secondary px-3 py-2 border-0 text-light">Checkout</button></a>

                </div>
            </div>
        </div>

        <!-- last child -->
        <div class="bg-info p-3 text-center">
            <p>All rights reserved by Joy- 2022</p>
        </div>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>