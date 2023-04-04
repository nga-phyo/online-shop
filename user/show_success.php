
<style>
    .top{
        margin-top: 50px;
    }
</style>

<?php 
    session_start();
    include '../admin/connect.php';

    include './header.php';

    $order_id = $_SESSION['order_id'];

    // echo $order_id;

?>
<body>
    <div class="container top">
        <div class="row">
            <div class="col-sm-12">
                <h2>Dear Coustomer, <strong><span class="show_name">
                    <?php 
                    if(!empty($_SESSION['user'])){
                        echo $_SESSION['user'];
                    } else {
                        $_SESSION['user'] = '';
                    }
                    ?>
                </span></strong></h2>
                <p class="test-success lead"> &nbsp; &nbsp; &nbsp;You Successfully sumitted the following products.Thank for your shopping here</p>
                <p>
                    <table class="table tale-hover">
                        <tr>
                            <td>
                                <?php 
                                $query = "SELECT * FROM orders where `order_id` = '$order_id'";
                                $go_query = mysqli_query($conn, $query);
                                while($out = mysqli_fetch_array($go_query)){
                                    $db_name = $out['delivery_name'];
                                    $db_phone = $out['delivery_phone'];
                                    $db_address = $out['delivery_address'];
                                }
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3><span class="glyphicon glyphicon-envelop"></span>Customer's Information</h3>
                                    </div>
                                    <div class="panel-body pull-left">
                                        <p>Coustomer Name <span class="glyphicon glyphicon-user"></span><?php echo $db_name ?></p>
                                        <p>Coustomer Phone <span class="glyphicon glyphicon-phone"></span><?php echo $db_phone ?></p>
                                        <p>Coustomer Address <span class="glyphicon glyphicon-home"></span><?php echo $db_address ?></p>
                                        
                                    </div>
                                </div>
                            </td>

                            <td>
                                <table class="table table-striped">
                                    <tr>
                                        <th colspan="4">Order_information</th>
                                    </tr>

                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Qty</th>
                                        <th>Unit Price</th>
                                    </tr>
                                    <?php 
                                    $total = 0;
                                    $query = "SELECT order_detail.*,product.* from order_detail left join product on order_detail.product_id=product.product_id where order_detail.order_id ='$order_id'";
                                    $go_query=mysqli_query($conn,$query);
                                    while($out = mysqli_fetch_array($go_query)){

                                        $product_name = $out['product_name'];
                                        $price = $out['price'];
                                        $qty = $out['product_qty'];
                                        $unit_price = $qty * $price;
                                        $total += $unit_price;
                                        echo "<tr>
                                            <td>{$product_name}<br></td>
                                            <td>{$price} <br></td>
                                            <td>{$qty} <br></td>
                                            <td>{$unit_price}</td>

                                            </tr>";
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3" align="right">Total Amount is</td>
                                        <td><?php echo $total; ?></td>
                                    </tr>
                                </table>
                            </td>

                        </tr>
                    </table>
                </p>
            </div>
        </div>
    </div>
</body>

