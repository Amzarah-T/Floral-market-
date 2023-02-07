
<?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])){
  $Product_category=$_POST['Product_category'];
  $product_title=$_POST['product_title'];
  $product_description=$_POST['product_description'];
  $product_total_length=$_POST['product_total_length'];
  $flower_diameter=$_POST['flower_diameter'];
  $product_color=$_POST['product_color'];
  $product_price=$_POST['product_price'];
  $product_status='true';

  //accessing images
  $product_image=$_FILES["product_image"]["name"];

  //accessing image temp name
  $temp_name=$_FILES["product_image"]["tmp_name"];

  //checking empty condition
  if($Product_category=='' or $product_title=='' or $product_description=='' or 
  $product_total_length=='' or $product_color=='' or $product_price=='' or 
  $product_image==''){
    echo "<script>alert('you have missed a required feild, fill it!')</script>";
    exit();
  }else{
    move_uploaded_file($temp_name,"./product_images/$product_image");

    //insert query
    $insert_products="insert into `products` (category_id,product_title,
    product_material,product_total_length,flower_diameter,product_image,
    product_color,product_price,date,status) values ('$Product_category',
    '$product_title','$product_description','$product_total_length',
    '$flower_diameter','$product_image','$product_color','$product_price',
    NOW(),'$product_status')";
    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
      echo "<script>alert('successfully inserted product details')</script>";
    }
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Products</title>

  <!--bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
 rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
 crossorigin="anonymous">

<!--font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="bg-light">

  <div class="container mt-3">
      <h1 class="text-center">Insert Products</h1>
      <form action="" method="POST" enctype="multipart/form-data">
      <!--enctype="multipart/form-data - using for insert images-->

      <!--1-Product_category-->
      <div class="form-outline md-4 w-50 m-auto mt-3">
         <select name="Product_category" id="" class="form-select">
             <option value=""> Select a category </option>
            
            <?php
            
            $select_query="Select * from `categories`"; //pass connection variable
            $result_query=mysqli_query($con,$select_query); //query variable
            
            while($row=mysqli_fetch_assoc($result_query)){
              $category_title=$row['category_title'];
              $category_id=$row['category_id'];
              echo "<option value='$category_id'>$category_title</option>";
            }

            ?>

            <!--
              <option value="">category2</option>
             <option value="">category3</option>
             <option value="">category4</option>   -->
             
         </select>   
      </div> 

      <!--2-title-->
         <div class="form-outline md-4 w-50 m-auto mt-3">
            <label for="Product_Title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="Product_Title"
            class="form-control" placeholder="Enter product tilte" autocomplete="off" required>
<!--label for="Product_Title" and input type id="Product_Title"- should be same
autocomplete="off" - using for not renderring the data alrady entered
-->
         </div>

      <!--3-material-->
         <div class="form-outline md-4 w-50 m-auto mt-3">
            <label for="description" class="form-label">Product Material</label>
            <input type="text" name="product_description" id="description"
            class="form-control" placeholder="Enter product material" autocomplete="off" required>
          </div> 
      
      <!--4-total length-->
      <div class="form-outline md-4 w-50 m-auto mt-3">
            <label for="length" class="form-label">Product Total Length</label>
            <input type="text" name="product_total_length" id="length"
            class="form-control" placeholder="Enter product total length" autocomplete="off" required>
      </div> 

      <!--5-flower diameter-->
       <div class="form-outline md-4 w-50 m-auto mt-3">
            <label for="diameter" class="form-label">Flower Diameter</label>
            <input type="text" name="flower_diameter" id="diameter"
            class="form-control" placeholder="Enter flower diameter" autocomplete="off">
       </div> 
          
      <!--6-image 1-->
      <div class="form-outline md-4 w-50 m-auto mt-3">
            <label for="product_image" class="form-label">Product Image</label>
            <input type="file" name="product_image" id="product_image"
            class="form-control"  required>
      </div>  
          
      <!--7-color-->
      <div class="form-outline md-4 w-50 m-auto mt-3">
            <label for="color" class="form-label">Product Color</label>
            <input type="text" name="product_color" id="color"
            class="form-control" placeholder="Enter product color" autocomplete="off" required>
      </div> 

      <!--8-price-->
       <div class="form-outline md-4 w-50 m-auto mt-3">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="price"
            class="form-control" placeholder="Enter product price" autocomplete="off" required>
       </div>    
      
      <!--submit button-->
      <div class="form-outline md-4 w-50 m-auto mt-3">
            <input type="submit" name="insert_product" class="btn btn-dark text-light mb-3 px-3" value="Insert Product">
      </div>     
          
      </form>

  </div>
  
</body>
</html>




