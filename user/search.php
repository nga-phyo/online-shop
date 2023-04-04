<style>
    .top{
        margin-top: 50px;
    }
</style>
<?php 
    session_start();
    include '../admin/connect.php';
    include 'header.php';
    include 'function.php';

 ?>


<div class="container CusTop top">
    <div class="row">
        <div class="col-sm-12">


        <div class="well well-sm">
        
            <h3>Welcome <span class="showname" >

            <?php 
            if(!empty($_SESSION['user'])){
                echo $_SESSION['user'];
            }
            else{
                $_SESSION['user'] ='';
            }
            ?>
            </span></h3>
     
    </div>

    <div class="row">

        <div class="col-sm-3">
            <?php include_once './sidebar.php' ?>
        </div>

        <div class="col-sm-9">
            <?php 

            if(isset($_POST['submit'])){
               show_result();
            }

            ?>
        </div>
     </div>

        
      </div>
     </div>
    </div>