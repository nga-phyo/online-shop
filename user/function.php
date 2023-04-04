<?php 


    function show_result(){

        global $conn;
        $data = $_POST['search'];
        $query = "SELECT * FROM product where product_name like '%$data%'";
        $go_query = mysqli_query($conn, $query);
        $count_result = mysqli_num_rows($go_query);

        if($count_result == 0){
            
            echo '<div class = "well well-lg">Sorry, no result found<a href = "index.php">Back</a></div>';

        }
        elseif($count_result > 0){

            while($out = mysqli_fetch_array($go_query)){
            $product_id = $out['product_id'];
            $product_name = $out['product_name'];
            $category_id = $out['category_id'];
            $price = $out['price'];
            $qty = $out['qty'];
            $photo = $out['photo'];
            $display  = '<div class =" col-sm-3 col-md-3"><div class="thumbnail">';
            $display.= "<img src='../../images/{$photo}' alt=''>";
            $display.= '<div class="caption">';
            $display.= "<h3>{$product_name}</h3>";
            $display.= "<p>{$price}</p>";
            $display.= '<p class="text-center"><a href="add-to-cat.php?id='.$product_id.'" class="btn btn-primary">Add-to-cat</a></p>';

            $display.= "</div></div></div>";
            echo $display;
            
            }
        }
    }


    function create_accu(){

        global $conn;
        global $user_name;
        global $password;
        global $email;
        global $phone;
        global $address;
        

        $hpass = md5($password);
        $query = "SELECT * FROM user where `user_name` = '$user_name' and `password` = '$password'";
        
        $user_query = mysqli_query($conn,$query);
        $count = mysqli_num_rows($user_query);

        if($count > 0){

            echo "<script>window.alert('already exists')</script>";

        }else {

            $query = "INSERT INTO user(`user_name`,`password`,`email`,`phone`,`address`,`role`) Values ('$user_name', '$hpass', '$email', '$phone', '$address', 'user')";
            $go_query = mysqli_query($conn, $query);

            if(!$go_query){

                die("QUERY FAILLED" . mysqli_error($conn));

            }else {

                echo  "<script>window.alert('you successfully created an accuount')</script>";
            }

        }

    }
    


?>