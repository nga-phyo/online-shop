
<style>
    .top{
        margin-top: 50px;
    }
</style>

<?php 


include_once './header.php';
include_once './connect.php';
include_once './function.php';

    if(isset($_POST['add_product'])){
        add_product();
    }

?>

<div class="container top">
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
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Category Name</label>
                           <select name="category_id" id="" class="form-control">
                                <?php 

                                $query = "SELECT * FROM category";
                                $go = mysqli_query($conn,$query);
                                // $row = mysqli_fetch_assoc($go);
                                // var_dump($row);

                                while($row = mysqli_fetch_array($go)){
                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name'];

                                    if($product_category_id == $cat_id){

                                        echo "<option value={$cat_id} selected>{$cat_name}</option>";
                                    
                                    }else {
                                        echo "<option value={$cat_id}>{$cat_name}</option>";
                                    
                                    }

                                  
                                }

                                ?>
                           </select>
                        </div>

                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="text" name="qty" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">File input</label>
                                <input type="file" name="photo">
                                    <img src="" alt="">
                        </div>

                        <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>


                    </form>
                </div>
            </div>


  </div>
 </div>
</div>
