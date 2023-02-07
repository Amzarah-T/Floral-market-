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
    <title>Admin registration

    </title>
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
<div class="container-fluid my-3">
		<h2 class="text-center">  Admin Login </h2>
		<div class="row d-flex align-items-center justify-content-center mt-5">
			<div class="col-lg-12 col-xl-6">
	<form action="" method="post"></form>
		<div class="form-outline mb-3">
			<!--user name feild-->
			<label for="user_username" class="form-label">Admin name</label>
			<input type="text" id="user_username" class="form-control" 
			placeholder="enter your user name"autocomplete="off" 
			required="required" name="user_username"/>
		</div>
		<!--email feild-->
		<div class="form-outline mb-3">
			<label for="user_email" class="form-label">Email</label>
			<input type="email" id="user_email" class="form-control" 
			placeholder="enter your Email"autocomplete="off" 
			required="required" name="user_email"/>
		</div>
	

		<!--password feild-->
		<div class="form-outline mb-3">
			<label for="admin_password " class="form-label">Password </label>
			<input type="password" id="admin_password " class="form-control" 
			placeholder="enter your password "autocomplete="off" 
			required="required" name="admin_password "/>
		</div>

		
		<div class="mt-4 pt-2">
			<input type="submit" value="login" class="bg-dark text-light py-2 px-3 border-0"
			 border-0 name="admin_login" >
			<p class="small fw-bold mt-2 pt-1 mb-0"> Don't you have an account?<a href="admin_registration.php" class="text-danger"> 
			Register </a></p>
		</div>
</form>
		</div>
	</div>
</div>
</body>
</html>

<?php
    if(isset($_POST['admin_login'])){
        $admin_username=$_POST['admin_username'];
        $admin_password=$_POST['admin_password'];

        $select_query="select * from  `admin_table` where admin_name='$admin_username'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);

		// card iteam 
        $select_query_cart="select * from `card_details` where ip_address='$user_ip'";
        $select_cart=mysqli_query($con,$select_query_cart);
		$row_count_cart=mysqli_num_rows($select_cart);
        if($row_count>0){
            if(password_verify($admin_password,$row_data['admin_password'])){
                // echo"<script>alert('Login Successfull')</script>";
				if($row_count==1 and $row_count_cart==0)
	    
		         {
		         $_SESSION['admin_name']=$admin_username;
		         echo"<script>alert('login successful')</script>";
		         echo"<script> window.open('profile.php','self')</script>";
		        }
	         else
	            {
		        $_SESSION['admin_name']=$admin_username;
		        echo"<script>alert('login successful')</script>";
		        echo"<script>window.open('payment.php','self')</script>";
		        }
            }
		else{
                echo"<script>alert('invalid credentials')</script>";
            }

        }else{
            echo"<script>alert('invalid credentials')</script>";
        }
}

?>