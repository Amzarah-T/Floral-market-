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
    <title>Admin Dashboard</title>
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
    .admin{
    width: 7%;
    height: 7%;
    object-fit:contain;
}

   .admin1 {
    width:100px;
    object-fit:contain;
   }
</style>

</head>
<body>


<!--navbar-->
<div class="container-fluid p-0 ">
   <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
       <div class="container-fluid align-item-center">
          <img src="../img/logo.jpg" class="admin">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
              <ul class="navbar-nav">
                <li class="nav-item">
                   <a href="" class="nav-link">Admin</a>
                 
                </li>
              </ul>
           </nav>
       </div>
    </nav>

    <!--second child-->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage  Details</h3>
    </div>

    <!--third child-->
    <div class="row">
        <div class="col-md-10 bg-light p-1">
            
            <!--details button-->
            <div class="button text-center">
                <!--button*8>a.nav-link.text-light.bg-dark.my-1-->
                <button><a href="index.php?insert_product" class="nav-link text-dark bg-light my-1">Insert Products</a></button>
                <button><a href="index.php?view_products.php" class="nav-link text-dark bg-light my-1">View Products</a></button>
                
                <button><a href="index.php?insert_category" class="nav-link text-dark bg-light my-1">Insert Categories</a></button>
                <button><a href="" class="nav-link text-dark bg-light my-1">View Categories</a></button>
                
                
            </div>

        </div>
    </div>

    <!--forthn child-->
    <div class="container my-5">
        <?php 
           if(isset($_GET['insert_category'])){
            include('insert_categories.php');
           }
           if(isset($_GET['insert_product'])){
            include('insert_products.php');
           }
           if(isset($_GET['view_products'])){
            include('view_products.php');
           }
        ?>

    </div>
    


    <!--last child-->
    <?php
     include("../includes/footer.php");
     ?>

</div>

    

<!--bootstrapp js lnk-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
crossorigin="anonymous"></script>

</body>
</html>





     

    
