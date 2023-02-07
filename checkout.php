<!--connect file-->
<?php
include('../includes/connect.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout page</title>
    
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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
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
  

    <!--second child-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
          <li class="nav-item">
             <a class="nav-link" href="#">Welcome Guest</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="#">Login</a>
          </li>
      </ul>
    </nav>


    <!--third child-->
    <div class="bg-light">
      <h1 class="h1 text-center mt-2">
       Floral Market
      </h1>
       <p class="text-center"><i>“Love is the flower you've got to let grow.”</i></p>
    </div>


  <!--fourth child-->
  <div class="row px-3">
    <div class="col-md-12">
      <!--products-->
      <div class="row">
        <?php
        if(isset($_SESSION['username'])){
          include('user_login.php');
        }else{
            include('payment.php');
        }
        ?>

         <!--fetching products from products table to display in the hme page-->
        <!--row end-->
      </div>

      <!--colounm end--> 
    </div>


    



  </div>


     <!--last child-->
     <!--included footer-->
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