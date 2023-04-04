<style>
    .top {
        margin-top: 50px;
    }
</style>

<?php 
         session_start();
        include './header.php';
        include '../admin/connect.php';
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
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <h2>Shopping Cart</h2>
                </div>
                <?php if(!empty($_SESSION['cart'])): ?>

                    <div class="panel-body">
                        <table class="table table-condensed">

                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>

                            <?php 
                                $total = 0;
                                foreach($_SESSION['cart'] as $id => $qty):

                                   
                                   $result = mysqli_query($conn,"SELECT * FROM product WHERE `product_id` = '$id'");
                                   $row = mysqli_fetch_assoc($result);
                                //    print_r($row);
                                //    die();
                                
                              
                                    $total += $row['price'] * $qty;
                                                                                      

                                    
                            ?>

                            <tr>

                             <td><img src="../../images/<?php echo $row['photo'] ?>" alt="" width="100" height="100" class="img img-thumbnail"></td>
                             <td><?php echo $row['product_name'] ?></td>
                             <td><?php echo $qty ?>

                                    
                            <spam>

                                 <a href="increase_qty.php?id=<?php echo $id ?>" class="glyphicon glyphicon-plus-sign"></a>
                                 <a href="decrease_qty.php?id=<?php echo $id ?>" class="glyphicon glyphicon-minus-sign"></a>
                                 </td>

                                 <td>$<?php echo $row['price'] ?></td>
                                 <td>$<?php  echo $row['price'] * $qty ?></td>

                                 <td>
                                    <span style="margin:5px"></span>
                                    <a href="remove.php?id=<?php echo $id ?>" class="glyphicon glyphicon-remove"></a>
                                 </td>
                    
                                
                            </tr>

                            <?php endforeach; ?>

                            <tr>
                                <td colspan="5" align="right"><b>Total</b></td>
                                <td>$<?php echo $total; ?></td>
                            </tr>

                        </table>
                    </div>

                    <div class="panel-footer">
                       <a href="clear.php" class="btn btn-danger">Clear cart</a> 
                       <a href="index.php" class="btn btn-default">Back</a> 
                       <a href="submit_order.php" class="btn btn-success">Submit Order</a> 
                    </div>

            </div>

            <?php else: ?>

                <h3 class="text-danger lead text-center">You select no product now!</h3>
                <p class="text-center"><a href="index.php" class="btn btn-info">Shop Now</a></p>

                <?php endif; ?>

        </div>


        <div>
    <div>
<div>