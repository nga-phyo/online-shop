

<style>
    .top{
        margin-top: 50px;
    }
</style>

<?php  session_start();
include 'connect.php';
include 'function.php'; 
?>
<body>
    <?php include 'header.php' ?>
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
                    <table class="table table-striped"><tr><td colspan="7" align="right"><a href="add_product.php" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add Product</a></td>
            </tr>
            <tr>
                <th>Photo</th>
                <th>ID</th>
                <th>Name</th>
                <th>CategoryID</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Action</th>
            </tr>

                    <?php
                    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                        del_product();
                    }
                  
   
                    $query="select product.*,category.* from product,category where product.category_id=category.cat_id order by product_id desc";
                    $go_query=mysqli_query($conn,$query);

                while($row=mysqli_fetch_array($go_query)){
                        $product_id=$row['product_id'];
                        $product_name=$row['product_name'];
                        $cat_name=$row['cat_name'];
                        $price=$row['price'];
                        $qty=$row['qty'];
                        $photo=$row['photo'];

                        
                            echo "<tr>";
                            echo "<td><img src='../../images/{$photo}' width='100' height='100'></td>";
                            echo "<td>{$product_id}</td>";
                            echo "<td>{$product_name}</td>";
                            echo "<td>{$cat_name}</td>";
                            echo "<td>{$price}</td>";
                            echo "<td>{$qty}</td>";
                            echo "<td><a href='productlist.php?action=delete&p_id={$product_id}' class='glyphicon glyphicon-remove' onclick=\"return confirm('Are you sure?')\"></a> ||
                            <a href='product_edit.php?p_id={$product_id}' class='glyphicon glyphicon-edit'></a> </td>";
                            echo "</tr>";
                }
                 ?>
                </table></div></div></div></body></html>