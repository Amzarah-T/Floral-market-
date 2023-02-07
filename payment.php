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
    <title>paymnet</title>
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
.pay{
    width: 200%;
    height:400px;
    object-fit: contain;
}
</style>
</head>

<body>
    
<!-- php code to access user id -->
<!-- php code to access user id -->
<?php
  $user_ip=getIPAddress();
  $get_user="select *  from `user_table` where user_ip='$user_ip'  ";
  $result=mysqli_query($con,$get_user);
  $run_query=mysqli_fetch_array($result);
  $user_id=$run_query['user_id'];
  ?>
 <div class="container">
   <h2 class="text-center text-dark">payment options</h2>
   
   
   <div class="row d-flex justify-content-center align-items-center my-5">
   <img src="../img/payment.jpg" alt="" class="pay">
       <div class="col-md-8">
            
            <a href="https://www.paypal.com" target="_blank">
            <h2 class="text-center">pay online</h2>   
            </a>
            
      </div>
      <div class="col-md-8">
            
            <a href="order.php?user_id=<?php echo $user_id  ?> ">
                <h2 class="text-center">pay offline</h2>
            </a>
      </div>
   </div>
   
 </div>

</body>
</html>