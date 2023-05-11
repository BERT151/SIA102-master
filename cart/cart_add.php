<?php
	require '../connection.php';
    session_start();
	$quantity = "";	
	$price = "";	
	$quantity = $_POST['qty'];
    $item_id=$_GET['id'];
	$price=$_POST['price'];
    $user_id=$_SESSION['id'];
	$q ='1';
	if ($quantity < 1){
    $add_to_cart_query="insert into cart(Item_ID,Account_ID,Qty,price,status) values ('$item_id','$user_id','$q','$price','Added to cart')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: ../productstore.php');
	}else{
	$add_to_cart_query="insert into cart(Item_ID,Account_ID,Qty,price,status) values ('$item_id','$user_id','$quantity','$price','Added to cart')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: ../productstore.php');
	}
?>