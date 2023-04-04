
<?php 
   
   session_start();

   include '../admin/connect.php';
 

   $user_id = $_POST['user_id'];
   $user_name = $_POST['username'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $payment = $_POST['payment_type'];
   $cardno = $_POST['cardno'];
 
   $query = "INSERT INTO orders(`order_date`,`coustomer_id`,`delivery_name`,`delivery_phone`,`delivery_address`,`status`) Values (now(),'$user_id','$user_name','$phone','$address',0 )";
 
   $go_query = mysqli_query($conn, $query);
 

  $order_id = mysqli_insert_id($conn);

  foreach($_SESSION['cart'] as $id => $qty){

    $getprice = mysqli_query($conn, "SELECT * FROM product where `product_id` = '$id'");
    
    while($out = mysqli_fetch_array($getprice)){

        $db_price = $out['price'];

    }

    $amount = $db_price * $qty ;
    $query = "INSERT INTO order_detail(`order_id`,`product_id`,`product_qty`,`amount`) Values('$order_id','$id','$qty','$amount') ";

    $go_query = mysqli_query($conn, $query);

  }

  $_SESSION['order_id'] = $order_id;
  unset($_SESSION['cart']);
  header("Location: show_success.php");



 

?>