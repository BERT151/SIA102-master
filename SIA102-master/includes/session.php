<?php
// session_start();
require "include/function.php";

if (!isset($_SESSION['Email_Add']) || trim($_SESSION['Email_Add']) == '') {
    // header('location: index.php');
} else {
    $sessionid = $_SESSION['id'];
    $sessionadmin = $_SESSION['Email_Add'];
    $sql = "SELECT * FROM account WHERE Email_Add = '$sessionadmin' AND Account_ID = $sessionid";
    $query = $con->query($sql);
    $user = $query->fetch_assoc();
}

?>