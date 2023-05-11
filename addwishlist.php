
<?php
	require '../connection.php';
    session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
	if (isset($_GET['id'])){
    $add_to_cart_query="insert into wishlist(Product_ID,Account_ID) values ('$item_id','$user_id')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: ../productstore.php');
	}else{
	$add_to_cart_query="insert into wishlist(Product_ID,Account_ID) values ('$item_id','$user_id')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: ../productstore.php');
	}
?>