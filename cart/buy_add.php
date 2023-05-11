<?php
// Import database connection and start session
require "../connection.php";
session_start();

// Get the quantity and price of the item
$quantity = isset($_POST['qty']) ? intval($_POST['qty']) : 0;
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;

// Get the item ID and user ID from the session
$item_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user_id = isset($_SESSION['id']) ? intval($_SESSION['id']) : 0;

// Validate the item ID and user ID
if ($item_id <= 0 || $user_id <= 0) {
    header('location: ../index.php');
    exit();
}

// Validate the quantity
if ($quantity < 1) {
    $quantity = 1;
}

// Sanitize the inputs to prevent SQL injection
$item_id = mysqli_real_escape_string($con, $item_id);
$user_id = mysqli_real_escape_string($con, $user_id);
$quantity = mysqli_real_escape_string($con, $quantity);
$price = mysqli_real_escape_string($con, $price);

// Insert the item into the buy table
$insert_query = "INSERT INTO buy (Item_ID, Account_ID, qty, price) VALUES ('$item_id', '$user_id', '$quantity', '$price')";
$insert_result = mysqli_query($con, $insert_query);

// Redirect the user to the buynow page
header('location: ../buynow.php');
exit();
?>
