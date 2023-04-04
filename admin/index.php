<style>
    .top{
        margin-top: 60px;
    }
</style>

<?php 

session_start();
include 'connect.php';

 include 'header.php';


if(isset($_POST['login'])){
    $name = $_POST['admin_name'];
    $password = $_POST['password'];
    $hpass = md5($password);

    $sql = "SELECT * FROM user ";
    $answer = mysqli_query($conn, $sql);

    while($result = mysqli_fetch_array($answer)){
        $admin_name =  $result['user_name'];
        $admin_password =  $result['password'];
        $admin_role =  $result['role'];
    }

    if($admin_name == $name && $admin_password == $admin_password && $admin_role = 'admin'){

        $_SESSION['admin'] = $name;
        header("Location: dashboard.php");
    }else{

        echo "<script>window.alert('Name or Passcode is incorrect Sir!')</script>";
    }
    // print_r($result);
    // die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container top">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">


            <form action="" method="POST">
                Admin<input type="text" name="admin_name" class="form-control"><br>
                Password<input type="password" name="password" class="form-control"><br>
                <input type="submit" name="login" value="Sign in" class="btn btn-primary">
            </form>


            </div>
        </div>
    </div>
    
</body>
</html>