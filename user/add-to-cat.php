
<?php 

    session_start();
    if(empty($_SESSION['user'])){

        header('location:login.php');
    }
    else{

        $id = $_GET['id'];
        $_SESSION['cart'][$id]++;
        header("Location: cart.php");
    }

?>