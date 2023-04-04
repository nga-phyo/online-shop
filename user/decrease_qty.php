<?php 

    session_start();

    $id = $_GET['id'];
   

    if($_SESSION['cart'][$id] == 1){
        unset($_SESSION['cart'][$id]);
    }
    else{
        $_SESSION['cart'][$id]--;
    }
    header("Location: cart.php")

    // $id = $_GET['id'];

    // foreach($_SESSION['cart'] as $key => $value){

    //     if($value == 1){
    //         unset($_SESSION['cart'][$key]);
    //     }

    //      else{
    //         if($id == $key){
    //             $reduce_qty = $value-1;
    //             $_SESSION['cart'][$key] = $reduce_qty;
    //         }
    //      }
    // }

    // header("Location: cart.php");
?>