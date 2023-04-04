<style>
    
    .top{
        margin-top: 80px;
    }
</style>


<?php 
    session_start();
    include '../admin/connect.php';
    include '../admin/header.php';
    include 'function.php';

  
    $getquery = "SELECT * FROM product";
    $perpage = 4;
    $go_query = mysqli_query($conn, $getquery);
    $num = mysqli_num_rows($go_query);
    $nums = ceil($num/$perpage);
    $page = 1 ; //for panigation!

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
                <?php include './sidebar.php' ?>
            </div>
      
            <div class="col-sm-9">

            <?php 
            
        if(isset($_GET['page'])){
            $pages = $_GET['page'];
            $show_product=($pages*$perpage)-$perpage;
        }

        if(!isset($_GET['page'])){
            $show_product= 0;
        }

        $query = "SELECT * FROM product limit $show_product,$perpage";
        $go_query = mysqli_query($conn, $query);
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

            ?>

            </div>
        </div>
    </div>

        <hr>

        <ul class="pager">
            <?php 
                for($i=1; $i<= $nums; $i++){
                    if($i == $page){

                        echo "<li><a href = 'index.php?page={$i}' style = 'background:#09;color:#fff;'>{$i}</a></li>";
                    }
                    else{
                        echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                    }
                }
            ?>
        </ul>

        </div>
     </div>
    </div>

    