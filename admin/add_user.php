

<style>
    .top{
        margin-top: 50px;
    }
</style>

<?php  session_start();
include 'connect.php';
include 'function.php'; 
include 'header.php';
?>
<body>
    <?php 
    if(isset($_POST['add_user'])){
        adduser();
    }
    
    ?>


<div class="container Top">
    <div class="row">
        <div class="col-md-12">


        <div class="row">
        <div class="page-header">
            <h2>Welcome Admin<span class="text-danger">

            <?php 
            if(isset($_SESSION['admin'])){
                echo $_SESSION['admin'];
            }
            else{
                $_SESSION['admin'] ='';
            }
            ?>
            </span></h2>
        </div>
    </div>



<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="username" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="">Confirm</label>
                <input type="password" name="confirm" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="">User Type</label>
               <select name="usertype" id="usertype" class="form-control">
                    
               <option value="admin">---Admin---</option>
               <option value="user">---User---</option>
               </select>
            </div>

            <button type="submit" name="add_user" class="btn btn-primary ">Add User</button>
            
        </form>
    </div>
</div>


  </div>
 </div>
</div>

