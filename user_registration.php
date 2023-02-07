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
    <title>user registration

    </title>
    <!--bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
 rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
 crossorigin="anonymous">

<!--font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
<div class="container-fluid my-3">
		<h2 class="text-center"> New user registration </h2>
		<div class="row d-flex align-items-center justify-content-center">
			<div class="col-lg-12 col-xl-6">
	<form action="" method="post" enctype="multipart/form-data"></form>
		<div class="form-outline mb-3">
			<!--user name feild-->
			<label for="user_username" class="form-label">User name</label>
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
	
		<!--image feild-->
		<div class="form-outline mb-3">
			<label for="user_image" class="form-label">User image</label>
			<input type="file" id="user_image" class="form-control" 
			placeholder="enter your Email"autocomplete="off" 
			required="required" name="user_image"/>
		</div>

		<!--password feild-->
		<div class="form-outline mb-3">
			<label for="user_password " class="form-label">Password </label>
			<input type="password" id="user_password " class="form-control" 
			placeholder="enter your password "autocomplete="off" 
			required="required" name="user_password "/>
		</div>

		<!--confirm password feild-->
		<div class="form-outline mb-3">
			<label for="conf_user_password " class="form-label">onfirm password </label>
			<input type="password" id="conf_user_password " class="form-control" 
			placeholder="confirm password " autocomplete="off" 
			required="required" name="conf_user_password "/>
		</div>
	
		<!--Address feild-->
		<div class="form-outline mb-3">
			<label for="user_Address" class="form-label">Address</label>
			<input type="text" id="user_Address" class="form-control" 
			placeholder="enter your Address" autocomplete="off" 
			required="required" name="user_Address"/>
		</div>

		<!--contact feild-->
		<div class="form-outline mb-3">
			<label for="user_Mobile" class="form-label">Mobile</label>
			<input type="text" id="user_mobile" class="form-control" 
			placeholder="enter your Mobile number" autocomplete="off" 
			required="required" name="user_mobile"/>
		</div>

		<div class="mt-4 pt-2">
			<input type="submit" value="Register" class="bg-dark text-light py-2 px-3 border-0"
			 border-0 name="user_register" >
			<p class="small fw-bold mt-2 pt-1 mb-0"> Already have an account?<a href="user_login.php" class="text-danger"> 
			Login </a></p>
		</div>
</form>
		</div>
	</div>
</div>
</body>
</html>

<!-- php code -->
<?php

if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_Address=$_POST['user_Address'];
    $user_mobile=$_POST['user_mobile'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    
    $user_ip=getIPAddress();

//select query
$select_query="select * from`user_table` where username='$user_username' or user_email='$user_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
	echo"<script>alert('username and email already exist')</script>";
} else if($user_password!=$conf_user_password){
	echo"<script>alert('password do not match')</script>";
	}
else {

	//insert query
move_uploaded_file($user_image_tmp,"./user_images/$user_image");
$insert_query="insert into `user_table`
(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
values('$user_username','$user_email','$user_password','$user_image','$user_ip','$user_Address','$user_mobile')"; 
$sql_execute=mysqli_query($con,$insert_query);

if($sql_execute){
    echo "<script>alert('data inserted successfully')</script>";
}else{
    echo "<script>alert('error')</script>";
}
}
//selecting card items
$select_cart_items="select *from  'cart_details' where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
    $SESSION['username']=$user_username;
    echo"<script>alert('you have items in your cart')</script>";
    echo"<script>window.open('checkout.php','_self')</script>";
} else{
    echo"<script>window.open('../index.php','_self')</script>";
}

}

?>