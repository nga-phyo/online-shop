<style>
    .top{

        margin-top: 40px;
    }
</style>

<?php 

session_start();
include './connect.php';
include './function.php';
include './header.php';

?>

<body>

    <div class="container top">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <div class="page-header">
                    <h2>Welcom Admin, <strong><span class="text-danger">
                    <?php 
                    if(!empty($_SESSION['admin'])){
                        echo $_SESSION['admin'];
                    } else {
                        $_SESSION['admin'] = '';
                    }
                    ?>
                </span></strong></h2>
                    </div>
                </div>

               <div class="row">
                    <table class="table table-striped">

                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Delivery Address</th>
                            <th>Items</th>
                            <th>Order_Date</th>
                            <th>Send_Date</th>
                            <th>Action</th>
                        </tr>

                        <?php

                            $sql = "SELECT * FROM orders order by order_id desc";
                            $order = mysqli_query($conn, $sql);

                            while($ans = mysqli_fetch_array($order)){

                                $status = $ans['status'];

                                if($status > 0){

                                    $show = '<tr class="mark">';
                                }else{
                                    $show = '<tr>';

                                }
                                $show .= "<td>".$ans['order_id']."</td>";
                                $show .= "<td>".$ans['delivery_name']."</td>";
                                $show .= "<td>".$ans['delivery_phone']."</td>";
                                $show .= "<td>".$ans['delivery_address']."</td>";
                                $show .= "<td>";
                                
                                $order_id = $ans['order_id'];
                                $sql = "SELECT order_detail.*, product.* FROM order_detail left join product on order_detail.product_id = product.product_id where order_detail.order_id = '$order_id' ";

                                $result = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_assoc($result)){
                                    $show.= '<ul>'.$row['product_name'].'<span style="color:red";>
                                    ['.$row['product_qty'].'] </span></li></ul>';
                                   
                                }

                                $show .= '</td>';
                                $show .= "<td>".$ans['order_date']."</td>";
                                $status = $ans['status'];

                                if($status > 0){

                                    $show .= '<td>'.$ans['send_date'].'</td>';
                                }else{

                                    $show .= '<td>----/--/--</td>';
                                }

                                if($ans['status']){

                                    $show .= '<td><a href="status.php?id='.$ans['order_id'].' &status=0" class="btn btn-danger">Undo</a></td>';

                                }else{
                                    
                                    $show .= '<td><a href="status.php?id='.$ans['order_id'].' &status=1" class="btn btn-info">Mark as Deilvered</a></td>';
                                }

                                $show .= '</tr>';
                                echo $show;
                                
                            }

                        
                        ?>

                </table>
               </div>

            </div>
        </div>
    </div>

    
</body>