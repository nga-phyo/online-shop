<?php

session_start();
include './connect.php';

$id = $_GET['id'];
$status = $_GET['status'];

if($status == 1 ){

    $sql = "UPDATE orders set `status` = 1, `send_date` = now() where `order_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: order_management.php");
}
else {
    
    $sql = "UPDATE orders set `status` = 0 where `order_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: order_management.php");
}