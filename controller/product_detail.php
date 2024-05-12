<?php
include "../connect.php";
$result = mysqli_query($conn, "SELECT * FROM `orderdetail` WHERE `order_id` = " . $_GET['id']);
$product = mysqli_fetch_assoc($result);
// var_dump($product);
// exit();
?>