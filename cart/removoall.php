<?php
    require "../connection.php";
    session_start();
    $Account_ID=$_SESSION['id'];
    $delete_query="delete from cart where Account_ID='$Account_ID'";
    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
    header('location: ../cart.php');
?>