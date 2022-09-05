<?php

//Including DB connection
include('./includes/connect.php');

//getting products from DB
function getProducts(){
    global $conn;

    // condition to check isset or not 
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $select_query = "Select * from `products` order by rand() limit 0,3";
    $result_query = mysqli_query($conn,$select_query);
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div>";
    }
        }
    }
    
}

//getting ALL products from DB
function get_all_products(){
    global $conn;

    // condition to check isset or not 
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $select_query = "Select * from `products` order by rand()";
    $result_query = mysqli_query($conn,$select_query);
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='#' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div>";
    }
        }
    }
}

//getting unique categories
function get_unique_categories(){
    global $conn;

    // condition to check isset or not 
    if(isset($_GET['category'])){
         $category_id = $_GET['category'];
            $select_query = "Select * from `products` where category_id=$category_id ";
    $result_query = mysqli_query($conn,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center'>No stock for this Category</h2>";
    }
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='#' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div>";
    }
        
    }
    
}

//getting unique brands
function get_unique_brands(){
    global $conn;

    // condition to check isset or not 
    if(isset($_GET['brand'])){
         $brand_id = $_GET['brand'];
            $select_query = "Select * from `products` where brand_id=$brand_id ";
    $result_query = mysqli_query($conn,$select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center'>No stock for this Brand</h2>";
    }
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div>";
    }
        
    }
    
}

//Displaying brands from DB in sideNav
function getBrands(){
    global $conn;
    $select_brands = "Select * from `brands`";
$result_brands = mysqli_query($conn, $select_brands );
//$row_data = mysqli_fetch_assoc($result_brands);
// echo $row_data['brand_title'];

while($row_data = mysqli_fetch_assoc($result_brands)){
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];

   echo "<li class='nav-item'><a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a></li>";

}
}

//Displaying categories from DB in sideNav
function getCategories(){
    global $conn;
    $select_categories = "Select * from `categories`";
                    $result_categories = mysqli_query($conn, $select_categories );
                    //$row_data = mysqli_fetch_assoc($result_brands);
                    // echo $row_data['brand_title'];

                    while($row_data = mysqli_fetch_assoc($result_categories)){
                        $category_title = $row_data['category_title'];
                        $category_id = $row_data['category_id'];

                       echo "<li class='nav-item'><a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a></li>";

                    }

}

//Searching products functions
function search_product(){
    global $conn;
    if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];

    

     
     
         
    $search_query = "Select * from `products` where product_keywords like '%search_data_value%' ";
    $result_query = mysqli_query($conn,$search_query);
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div>";
    }
}
        
    
}
//View details function
function view_details(){
    global $conn;

    // condition to check isset or not 
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $product_id = $_GET['product_id'];
            $select_query = "Select * from `products` where product_id = $product_id ";
    $result_query = mysqli_query($conn,$select_query);
    //$row = mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div>
    
    <div class='col-md-8'>
     
    <div class='row'>
        <div class='col-md-12'>
            <h4 class='text-center text-info mb-5'>Related Products</h4>
        </div>
        <div class='col-md-6'>
            <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
        </div>
        <div class='col-md-6'>
            <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
        </div>
    </div>
</div>";
    }
        }
    }
}
}

// get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 



?>