<!--connect file-->
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
    <title>cart details</title>
    
<!--bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
 rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
 crossorigin="anonymous">

<!--font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--css file link-->
<link rel="stylesheet" href="style.css">
<style>
  .cart_img{
    width: 50%;
    height: 100px;
    object-fit: contain;
  }
  </style>

</head>
<body>
    <!--navbar-->
<div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup>
            <?php d_cart_num(); ?> 
          </sup></a>
        </li>

       
        
      </ul>
      
      <!--<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form> -->
    </div>
  </div>
  </nav>

<!--calling cart function-->
  <?php

   cart();

  ?>


    <!--second child-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
          <<?php
     if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
                   </li>";
       }else{
        echo "<li class='nav-item'>
          <a class='nav-link' href=''>welcome".$_SESSION['username']."</a>
               </li>";
         }
     if(!isset($_SESSION['username'])){
       echo "<li class='nav-item'>
       <a class='nav-link' href='./user_area/user_login.php'>Login</a>
       </li>";
     }else{
        echo "<li class='nav-item'>
       <a class='nav-link' href='./user_area/user_logout.php'>Logout</a>
      </li>";
     }
        ?>
      </ul>
    </nav>


    <!--third child-->
    <div class="bg-light">
      <h1 class="h1 text-center mt-2">
       Floral Market
      </h1>
       <p class="text-center"><i>“Love is the flower you've got to let grow.”</i></p>
    </div>

       <!-- fourth child -->
       <div class="container">
        <div class="row">
          <form action="" method="post">
            <table class="table table-bordered text-center">
                
                <tbody>
                  <!-- php code for display dynamic data -->
                <?php
                 global $con;
                 $ip_address = getIPaddress();
               $total_price=0;
               $cart_query="Select * from `cart_details` where ip_address='$ip_address' ";
               $result=mysqli_query($con,$cart_query);
               $result_count=mysqli_num_rows($result);
               if($result_count>0){
                
                  echo "<thead>
                  <tr>
                      <th>Product title</th>
                      <th>product image</th>
                      <th>Quantity</th>
                      <th>Total price</th>
                      <th>Remove</th>
                      <th col span='2'>Operations</th>
                  </tr>
              </thead>";
                
                 while($row=mysqli_fetch_array($result)){
                   $product_id=$row['product_id'];
                   $select_products="Select * from `products` where product_id='$product_id' ";
                   $result_products=mysqli_query($con,$select_products);
                   while($row_product_price=mysqli_fetch_array($result_products)){
                    $product_price=array($row_product_price['product_price']);
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image=$row_product_price['product_image'];
                    $product_values=array_sum($product_price);  
                    $total_price+=$product_values; 
                   

                ?>
                  <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./Admin/product_images/<?php echo $product_image ?>" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-info w-50"></td>
                    <?php
                    $ip_address = getIPaddress();
                    if(isset($_POST['update_cart'])){
                      $quantities=$_POST['qty'];
                      $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip_address'";
                      $result_products_quantity=mysqli_query($con,$update_cart);
                      $total_price=$total_price*$quantities; 
                    }
                    ?>

                    <td><?php echo $price_table ?>/=</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                      <!-- <button class="bg-dark text-light">update</button> -->
                      <input type="submit" value="update cart" 
                      class="bg-dark text-light px-3 py-2 border-0 mx-3" name="update_cart">
                      <!-- <button class="bg-dark text-light">Remove</button> -->
                      <input type="submit" value="remove cart" 
                      class="bg-dark text-light px-3 py-2 border-0 mx-3" name="remove_cart">
                    </td>
                  </tr>
                  <?php
                  }
                }
              }else{
               echo "<h2 class='text-center text-danger'>Cart is empty!</h2>";
              }
              

                  ?>
                </tbody>
                
            </table>
            <!-- subtotal -->
            <div class="d-flex mb-5">
              <?php
               $ip_address = getIPaddress();
               $total_price=0;
               $cart_query="Select * from `cart_details` where ip_address='$ip_address' ";
               $result=mysqli_query($con,$cart_query);
               $result_count=mysqli_num_rows($result);
               if($result_count>0){
                echo "<h4 class='px-3'>subtotal:<strong class='text-dark'> $total_price/=</strong></h4>
                      <input type='submit' value='Continue shopping' 
                             class='bg-dark text-light px-3 py-2 border-0 mx-3' name='Continue_shopping'>
                       <button class='bg-dark text-light px-3 py-2 border-0 '><a href='./user_area/checkout.php' class='bg-dark text-light text-decoration-none'>checkout</a></button>
                     ";
               }else{
                echo "<input type='submit' value='Continue shopping' 
                class='bg-dark text-light px-3 py-2 border-0 mx-3' name='Continue_shopping'>";
               }
               if(isset($_POST['Continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
               }
              ?>
              
            </div>

        </div>
       </div>
       </form>

       <!-- funtion to remove items -->
       <?php
       function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
          foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="delete fron `cart_details` where product_id=$remove_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
              echo "<script>window.open('cart.php','_self')</script>";
              echo "<script>alret('selected item is removed from cart')</script>";
            }
          }
        }
       }
       echo $remove_item=remove_cart_item();
       ?>


     <!--last child-->
     <!--included footer-->
     <?php
     include("./includes/footer.php");
     ?>
    
</div>



<!--bootstrapp js lnk-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>

</body>
</html>