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
    <title>Document</title>
    <!--bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
 rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
 crossorigin="anonymous">

 <!--css file link-->
<link rel="stylesheet" href="style.css">

<!--font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .img{
            width: 50%;
    height: 100px;
    object-fit: contain;
        }
    </style>
</head>
<body>
    <h1 class="text-center text-success">All Products</h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-dark text-light">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>

                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
        </thead>
        <tbody class="bg-dark text-light">
           <?php
           $get_products="Select * from `products`";
           $result=mysqli_query($con,$get_products);
           $number=0;
           while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id']; //names should be match with table name in database
            $product_title=$row['product_title']; 
            $product_image=$row['product_image']; 
            $product_price=$row['product_price']; 
            $status=$row['status'];
            $number++;
            ?>
            <tr class='text-center'>
            <td><?php echo $number;?></td>
            <td><?php echo $product_title;?></td>
            <td><img src='./product_images/<?php echo $product_image;?>' class='img'></td>
            <td><?php echo $product_price;?>/-</td>
            <td>
           

            <td><?php echo $status;?></td>
            <td><a href='index.php?edit_products=<?php echo $product_id?>'class='text-light'><i class='class fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='' class='text-light'><i class='class fa-solid fa-trash'></i></a></td>
            </tr>" ;
            <?php
           }
            ?>
            
        </tbody>
    </table>
</body>
</html>