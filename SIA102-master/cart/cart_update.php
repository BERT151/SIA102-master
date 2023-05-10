<?php
require '../connection.php';
session_start();
$user_id = $_SESSION['id'];$cart_query = mysqli_query($con, "SELECT * FROM cart WHERE Account_ID='$user_id'");

if (mysqli_num_rows($cart_query) > 0) {
    while ($product_item = mysqli_fetch_assoc($cart_query)) {
        $Product_ID = $product_item['Item_ID'];
        $quantity = $_POST['qty' . $Product_ID];
        $price = $product_item['price'];

        if ($quantity <= 0) {
            $add_to_cart_query = "UPDATE cart SET Qty = $fa WHERE Account_ID = '$user_id' AND Item_ID ='$Product_ID'";
            $add_to_cart_result = mysqli_query($con, $add_to_cart_query) or die(mysqli_error($con));
            header('location: ../checkout.php');
        } else {
            $add_to_cart_query = "UPDATE cart SET Qty = $quantity WHERE Account_ID = '$user_id' AND Item_ID ='$Product_ID'";
            $add_to_cart_result = mysqli_query($con, $add_to_cart_query) or die(mysqli_error($con));
            header('location: ../checkout.php');
        }
    }
}

?>

