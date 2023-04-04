
<style>
    .top{
        margin-top: 50px;
    }
</style>


<?php 
session_start();
include_once './header.php';
include_once './connect.php';

?>



<div class="container top">
    <div class="row">
        <div class="col-md-12">


        <div class="row">
            <div class="page-header">
                <h2>Welcome Admin<span class="text-danger">

                <?php 
                if(!empty($_SESSION['admin'])){
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
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3><span class="glyphicon glyphicon-list">Product</span></h3>
                    </div>

                    <div class="panel-body text-center">
                      <a href="productlist.php" class="btn btn-primary"> View Details<span class="badge">

                 
                      <?php 

                        $total = "SELECT product_id from product";
                        $get = mysqli_query($conn, $total);
                        $num = mysqli_num_rows($get);
                        echo $num;
                    

                      
                      ?>

                      </span></a> 
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3><span class="glyphicon glyphicon-list-alt">Category</span></h3>
                    </div>

                    <div class="panel-body text-center">
                      <a href="category.php" class="btn btn-success"> View Details<span class="badge">

                
                      <?php 

                        $total = "SELECT cat_id from category";
                        $get = mysqli_query($conn, $total);
                        $num = mysqli_num_rows($get);
                        echo $num;
                    

                      ?>

                      </span></a> 
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3><span class="glyphicon glyphicon-envelope">Order</span></h3>
                    </div>

                    <div class="panel-body text-center">
                      <a href="order_management.php" class="btn btn-danger"> View Details<span class="badge">

                      <?php 

                        $total = "SELECT order_id from orders";
                        $get = mysqli_query($conn, $total);
                        $num = mysqli_num_rows($get);
                        echo $num;
                    

                      ?>

                      </span></a> 
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3><span class="glyphicon glyphicon-user">User</span></h3>
                    </div>

                    <div class="panel-body text-center">
                      <a href="user_list.php" class="btn btn-info"> View Details<span class="badge">

                 
                      <?php 

                        $total = "SELECT `user_id` from user";
                        $get = mysqli_query($conn, $total);
                        $num = mysqli_num_rows($get);
                        echo $num;
                    

                      ?>

                      </span></a> 
                    </div>

                </div>
            </div>


       </div>

       <div class="row quickbar">
        <a href="add_product.php" class="btn btn-info">Add Product</a>
        <a href="add_user.php" class="btn btn-info">Add User</a>
       </div>


        </div>
    </div>
</div>