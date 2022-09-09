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
    <title>User Login</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >

                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter username"
                            autocomplete="off" required="required" name="user_username" />
                    </div>
                     
                     
                    <!-- Password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter password"
                            autocomplete="off" required="required" name="user_password" />
                    </div>
                     
                     
                    <div class="text-center mt-4 ">
                        <input type="submit" value="Login" class="bg-info mb-4 mt-3 py-2 px-3 border-0"
                            name="user_login">
                        <p class="small fw-bold">Don't have an account? <a href="user_registration.php" class="text-danger">
                                Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
    if(isset($_POST['user_login'])){
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];

        $select_query = "select * from `user_table` where username = '$user_username'";
        $result = mysqli_query($conn,$select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);
        $user_ip = getIPAddress();

        
        // cart item
        $select_query_cart = "select * from `cart_details` where ip_address = '$user_ip'";
        $select_cart = mysqli_query($conn,$select_query_cart);
        $row_count_cart = mysqli_num_rows($select_cart);

        if($row_count>0){
            $_SESSION['username'] = $user_username;
            if(password_verify($user_password,$row_data['user_password'])){
                //echo "<script>alert('Login Successfull!!!')</script>";
                if($row_count == 1 and $row_count_cart==0){
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('Login Successfull!!!')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }else{
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('Login Successfull!!!')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('Invalid Credentials!!')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials!!')</script>";
        }

    }
?>