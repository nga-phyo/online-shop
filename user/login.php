<style>
    .top {
        margin-top: 60px;
    }
</style>
<?php 

session_start();
include '../admin/connect.php';
include 'header.php';
include 'function.php';


 
    if(isset($_POST['login'])){

        $name = $_POST['username'];
        $password = $_POST['password'];

        $errors = array('username' => '', 'password' => '');

        if(!$name){
            $errors['username'] = 'this field could not be empty';
        }
        if(!$password){
            $errors['password'] = 'this field could not be empty';
        }

        $hpass = md5($password);

        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);

        while($ans = mysqli_fetch_array($result)){

            $db_user_name = $ans['user_name'];
            $db_password = $ans['password'];
            $db_role = $ans['role'];

            if($db_user_name == $name & $db_password == $hpass & $db_role == 'admin'){

                $_SESSION['admin'] = $name;
                header("Location: admin/product.php");

            }
            else if($db_user_name == $name & $db_password == $hpass){

                $_SESSION['user'] = $name;
                header("Location: index.php");

            }else{

                header("Location: index.php");

            }
        }

    }

?>


<div class="container top">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

            <form action="" method="POST">

                <div class="form-group">

                    <label for="">User Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" placeholder="Enter your name" id="email">

                    </div>
                </div>

                <div class="form-group">

                    <label for="">Password</label>
                 <div class="col-sm-10">
                 <input type="password" name="password" class="form-control" placeholder="Enter your name" id="pwd">
                 </div>

                </div>

                <button type="submit" class="btn btn-primary" name="login">Login</button>

            </form>

        </div>
    </div>
</div>
