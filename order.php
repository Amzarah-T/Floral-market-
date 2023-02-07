<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

//getting toal items and total price of aall products
$ip_address = getIPaddress();
$total_price=0;
$cart_query_price="select * from ` cart_details` where ip_address='$ip_address'";

?>
