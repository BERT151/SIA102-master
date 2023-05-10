<?php
ob_start();
session_start();
require_once '../connection.php';
$uid = $_SESSION['id'];
if(!isset($_SESSION['id']) & empty($_SESSION['id'])){
		header('location: login.php');
	}
	$id = $_SESSION['id'];
	 $sql = "DELETE FROM wishlist WHERE Account_ID=$id";
	$res = mysqli_query($con, $sql);
		header('location: ../productstore.php');
?>