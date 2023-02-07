

<?php

//<!--include connect file-->
// include('./includes/connect.php');

//getting products
function get_products(){
    global $con;

    //condition to check is set or not
    if(!isset($_GET['category'])){

    

    $select_query="Select * from `products` order by rand() LIMIT 0,8";
      $result_query=mysqli_query($con,$select_query);
      //$row=mysqli_fetch_assoc($result_query);
      //echo $row['product_title'];
      
      while($row=mysqli_fetch_assoc($result_query)){
        $category_id=$row['category_id'];
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_material=$row['product_material'];
        $product_total_length=$row['product_total_length'];
        $flower_diameter=$row['flower_diameter'];
        $product_image=$row['product_image'];
        $product_color=$row['product_color'];
        $product_price=$row['product_price'];

        echo " 
        <!--box1-->
        <div class='col-md-3 mb-4'>
           <div class='card'>
             <img src='./Admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                   <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>Material-$product_material,<BR>
                    Total lenght-$product_total_length<BR>Color-$product_color<BR>
                    <h6 class='card-title'>Rs-$product_price</h6></p>
                    
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart    -  <i class='fa-solid fa-bag-shopping'></i></a>
                    
                </div>
            </div>
        </div>
        ";
      }
    }
  }  


//get all products
function get_all_products(){
  global $con;

  //condition to check is set or not
  if(!isset($_GET['category'])){

  

  $select_query="Select * from `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    
    while($row=mysqli_fetch_assoc($result_query)){
      $category_id=$row['category_id'];
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_material=$row['product_material'];
      $product_total_length=$row['product_total_length'];
      $product_diameter=$row['product_diameter'];
      $product_image=$row['product_image'];
      $product_color=$row['product_color'];
      $product_price=$row['product_price'];

      echo " 
      <!--box1-->
      <div class='col-md-3 mb-4'>
         <div class='card'>
           <img src='./Admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                 <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>Material-$product_material,<BR>
                  Total lenght-$product_total_length<BR>Color-$product_color<BR>
                  <h6 class='card-title'>Rs-$product_price</h6></p>
                  
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart    -  <i class='fa-solid fa-bag-shopping'></i></a>
                  
              </div>
          </div>
      </div>
      ";
    }
  }
}  

  


  //get unique categories
  function get_unique_categories(){
    global $con;

    //condition to check is set or not
    if(isset($_GET['category'])){
      $category_id=$_GET['category'];
    

    $select_query="Select * from `products` where category_id=$category_id";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>Out of stock for this category!</h2><br>
        <h2 class='text-center text-success'>Comming soon...!</h2>
        ";
      }
      //$row=mysqli_fetch_assoc($result_query);
      //echo $row['product_title'];
      
      while($row=mysqli_fetch_assoc($result_query)){
        $category_id=$row['category_id'];
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_material=$row['product_material'];
        $product_total_length=$row['product_total_length'];
        $flower_diameter=$row['flower_diameter'];
        $product_image=$row['product_image'];
        $product_color=$row['product_color'];
        $product_price=$row['product_price'];

        echo " 
        <!--box1-->
        <div class='col-md-3 mb-4'>
           <div class='card'>
             <img src='./Admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                   <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>Material-$product_material,<BR>
                    Total lenght-$product_total_length<BR>Color-$product_color<BR>
                    <h6 class='card-title'>Rs-$product_price/=</h6></p>
                    
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to cart    -  <i class='fa-solid fa-bag-shopping'></i></a>
                    
                </div>
            </div>
        </div>
        ";
      }
    }
  }  
// view more button - <a href='#' class='btn btn-dark'><i class='fa-solid fa-circle-chevron-down'></i></a>

//dislpay categies
function get_category(){
    global $con;
    
    $select_categories="Select * from `categories`";
    $result_categories=mysqli_query($con,$select_categories);
    //$row_data=mysqli_fetch_assoc($result_categories);
    //echo $row_data['category_title'];- display in same row
    //echo $row_data['category_title'];

    while($row_data=mysqli_fetch_assoc($result_categories)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo " <li class='nav_item'>
      <a href='index.php?category=$category_id' class='nav_link text-light text-decoration-none mt-4'>$category_title<br> </a>
             </li>";
    }

}

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
$ip = getIPAddress();  
echo 'User Real IP Address - '.$ip;  



//dislpay cart details
  function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip_address = getIPaddress();
    $get_product_id=$_GET['add_to_cart'];

    $select_query="Select * from `cart_details` where ip_address='$ip_address' and
    product_id='$get_product_id' ";
      
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows>0){
        echo "<script>alert('This item is already present inside cart')</script>";
        echo "<script>window.open('index.php' , '_self')</script>";
  }else{
    $insert_query="insert into `cart_details` (product_id,ip_address,quantity)
    values('$get_product_id','$ip_address',0)";
    $result_query=mysqli_query($con,$insert_query);
    echo "<script>alert('Selected item is added to cart')</script>";
    echo "<script>window.open('index.php' , '_self')</script>";
  }
}
  }

//function to get cart item number
  function d_cart_num()
  {
    if(isset($_GET['add_to_cart'])){
      global $con;
      $ip_address = getIPaddress();
      
      $select_query="Select * from `cart_details` where ip_address='$ip_address' ";
        
        $result_query=mysqli_query($con,$select_query);
        $count_d_cart_num=mysqli_num_rows($result_query);
    }else{
        global $con;
        $ip_address = getIPaddress();
        
        $select_query="Select * from `cart_details` where ip_address='$ip_address' ";
          
          $result_query=mysqli_query($con,$select_query);
          $count_d_cart_num=mysqli_num_rows($result_query);
    }
    echo $count_d_cart_num;
  }
 
  //total price function
  function total_cart_price(){
    global $con;
    $ip_address = getIPaddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$ip_address' ";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="Select * from `products` where product_id='$product_id' ";
      $result_products=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_products)){
       $product_price=array($row_product_price['product_price']);
       $product_values=array_sum($product_price);  
       $total_price+=$product_values; 
      }
    }
     echo $total_price;
  }

?>
