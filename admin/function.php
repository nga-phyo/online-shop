<?php 

    function insert_category(){

        global $conn;
        $cat_name = $_POST['cat_name'];
        
        if($cat_name == ""){
            echo "<script>window.alert('enter name')</script>";
        }

        else if($cat_name!=""){

            $query = "SELECT * from category where `cat_name` = '$cat_name'";
            $ch_query = mysqli_query($conn,$query);
            $count = mysqli_num_rows($ch_query);

            if($count > 0){

                echo "<script>window.alert('already exist')</script>";
            }
            else{

                $query = "INSERT into category(cat_name) Values('$cat_name')";
                $go_query = mysqli_query($conn,$query);

                if(!$go_query)
                {
                    die("QUERY FAILED". mysqli_error($conn));
                }else{

                    echo "<script>window.alert('Successfully inserted')</script>";
                }
            }
        }

    }


    function update_category(){

        global $conn;
        $cat_name = $_POST['cat_name'];
        $cat_id = $_GET['c_id'];
        $query = "UPDATE category set cat_name = '$cat_name' where cat_id = '$cat_id' ";
        $go_query = mysqli_query($conn, $query);


        if(!$go_query){

            die('Query failed'. mysqli_error($conn));

        }

        header("Location: category.php");

    }


        function del_categrory(){

            global $conn;
            $cat_id = $_GET['c_id'];
            $query = "DELETE from category where `cat_id` = '$cat_id'";
            $go_query = mysqli_query($conn,$query);

            header("Location: category.php");
        }


     
         
    function add_product()
    {
        global $conn;
        
        $product_name = $_POST['product_name'];
        $cat_id = $_POST['category_id'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $photo = $_FILES['photo']['name'];

        if(is_numeric($price) == false || null){

            echo "<script>window.alert('enter product price is numeric value')</script>";

        }else if(is_numeric($qty) == false || null) {

            echo "<script>window.alert('enter product quantity is numeric value')</script>";

        }else if($photo == ""){

            echo "<script>window.alert('choice product image')</script>";

        }else if(($product_name && $photo) != ""){

            $sql = "SELECT * FROM product where `product_name` = '$product_name'";
            $result = mysqli_query($conn, $sql);
            $answer = mysqli_num_rows($result);

            if($answer > 0){

                echo "<script>window.alert('This Product is already eixtst')</script>";

            }else {

                $sql = "INSERT INTO product(`product_name`,`category_id`,`price`,`qty`,`photo`) Values('$product_name','$cat_id','$price','$qty','$photo')";
                $result = mysqli_query($conn, $sql);

               

                if(!$result){

                    die("QUERY FAILLED".mysqli_error($conn));
                    

               }else {
                    move_uploaded_file($_FILES['photo']['tmp_name'],'../images/'.$photo);
                   
                    header("Location: productlist.php");
                }
            }
        }

    }

        // function update_product(){

        //     global $conn;
        //     $product_id = $_GET['p_id'];
        //     $product_name = $_POST['product_name'];
        //     $cat_id = $_POST['category_id'];
        //     $price = $_POST['price'];
        //     $qty = $_POST['qty'];
        //     $photo = $_FILES['photo']['name'];
        //     // if(!$photo){

        //     //     $query = "UPDATE product set `product_name` = '$product_name',`category_id` = '$cat_id',
        //     //      `price` = '$price', `qty` = '$qty',where `product_id` = '$product_id'";
        //     // }else{

        //     //     $query = "UPDATE product set `product_name` = '$product_name',`category_id` = '$cat_id',
        //     //     `price` =' $price', `qty` = '$qty', `photo` = '$photo',where `product_id` = '$product_id'";
        //     // }

        //     $query = "UPDATE product set `product_name` = '$product_name',`category_id` = '$cat_id',`price` =' $price', `qty` = '$qty', `photo` = '$photo' where `product_id` = '$product_id'";
         

        //     $go_query = mysqli_query($conn, $query);
        //     $answer = mysqli_fetch_assoc($go_query);
        //     var_dump($answer);
        //     die();
        //     header("Location: productlist.php");
          

        //     // if(!$go_query){
        //     //     die("QUERY FAILED". mysqli_error($conn));
        //     // }else{
        //     //     move_uploaded_file($_FILES['photo']['tmp_name'],'../../images'.$photo);
        //     // }

        //     // header("Location: productlist.php");
        // }


        function del_product(){

            global $conn;
            $p_id = $_GET['p_id'];
            $query = "DELETE from product where `product_id` = '$p_id'";
            $go_query = mysqli_query($conn, $query);
            header("Location: productlist.php");
        }

        function adduser(){
            global $conn;
            $user_name = $_POST['username'];
            $password = $_POST['password'];
            $cpass = $_POST['confirm'];
            if($password!= $cpass){
                echo "<script>window.alert('password and confirmpassword are must be same')</script>";
            }
            else if($password!="" && $user_name!=""){

                $query = "SELECT * from user where `user_name`= '$user_name' and `password` = md5('$password')";

                $result = mysqli_query($conn,$query);
                $count = mysqli_num_rows($result);

                if($count > 0){
                    echo "<script>window.alert('This name is already exists')</script>";
                }

                else{
                    $hasvalue = md5($password);
                    $user_role = $_POST['usertype'];
                    $query = "INSERT INTO user(user_name,password,role) Values('$user_name','$hasvalue','$user_role')";
                    $go_query =mysqli_query($conn,$query);

                    if(!$go_query){
                        die("QUERY FAILED" .mysqli_error($conn));
                    }

                    header("Location:user_list.php");
                }
            }

        }

        function del_user(){
            global $conn;
            $u_del= $_GET['u_del'];
            $sql = "DELETE FROM user where `user_id` = '$u_del'";
            $result = mysqli_query($conn, $sql);
            header("Location: user_list.php");

        }

        // function admin_login(){

        //     global $conn;

        //     $name = $_POST['admin_name'];
        //     $password = $_POST['password'];
        //     $hpass = md5($password);

        //     $sql = "SELECT * FROM user where `user_name` = '$name' and `password` = '$hpass' ";
        //     $answer = mysqli_query($conn, $sql);
        //     $result = mysqli_fetch_array($answer);
        //     print_r($result);
        //     die();

        //     while($result = mysqli_fetch_array($answer)){

        //         $db_user_name = $result['user_name'];
        //         $db_user_password = $result['user_password'];
        //         $db_user_role = $result['role'];

        //         if($db_user_name == $name && $db_user_password == $hpass && $db_user_role == 'admin'){

        //             $_SESSION['admin'] = $name;
        //             header("Location: dashboard.php");
                   
        //         }
        //         else{
        //             echo "<script>window.alert('Invalid Admin Name and Password')</script>";

        //             echo "<script>window.location.href='index.php'</script>";
        //         }

        //     }
        // }
    

// ?>