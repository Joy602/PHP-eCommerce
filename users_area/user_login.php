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
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">

                    <!-- Username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter username"
                            autocomplete="off" required="required" name="user_username" />
                    </div>
                    <!-- Email field -->
                     
                    <!-- Image field -->
                     
                    <!-- Password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter password"
                            autocomplete="off" required="required" name="user_password" />
                    </div>
                    <!-- Confirm Password field -->
                     
                    <!-- Address field -->
                     
                    <!-- Contact field -->
                     
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