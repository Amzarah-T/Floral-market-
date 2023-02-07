<?php
$con=mysqli_connect('localhost','root','','mystore');
if(!$con){

    die(mysqli_error($con));
}
?>

<!--
succesfull and unsuccesful code

if($con){
    echo "connection successful";
}else{
    die(mysqli_error($con));
}

-->