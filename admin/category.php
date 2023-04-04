
<style>
    .top{
        margin-top: 50px;
    }
</style>


<?php

    session_start();
    include_once './header.php';
    include_once './connect.php';
    include_once './function.php';
?>


<?php 
    if(isset($_POST['add_category'])){

        insert_category();

    }

    if(isset($_POST['update_category'])){

        update_category();

    }

    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        del_categrory();
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
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Add Category</label>
                        <input type="text" name="cat_name" class="form-control">
                    </div>
                    <button type="submit" name="add_category" class="btn btn-primary ">Add Category</button>
                </form>
                <hr>

                <?php 

                if(isset($_GET['action']) && $_GET['action'] == 'edit'){

                    $cat_id = $_GET['c_id'];
                    $query = "SELECT * from category where cat_id = '$cat_id'";
                    $go_query = mysqli_query($conn, $query);
                   
                    
                    while($out = mysqli_fetch_array($go_query))
                    {

                        $catname = $out['cat_name'];
                  ?>

                        <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Update Category</label>
                            <input type="text" name="cat_name" value="<?php echo $catname ?>" class="form-control">
                        </div>
                        <button type="submit" name="update_category" class="btn btn-primary ">Update Category</button>
                    </form>

                    <?php

                    }
                }

           

                ?>

               


            </div>


            <div class="col-md-6">
                <table class="table table-hover">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

                <?php 

                $query = "SELECT * from category";
                $go_query = mysqli_query($conn,$query);
                while( $row = mysqli_fetch_array($go_query)){

                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_name'];
                    echo "</tr>";
                    echo "<td> {$cat_id} </td>";
                    echo "<td> {$cat_name} </td>";
                    echo "<td> <a href='category.php?action=delete&c_id={$cat_id}'>X</a>||
                    <a href='category.php?action=edit&c_id={$cat_id}'>Edit</a> 
                    </td>";

                   

                    echo "</tr>";
                   

                }
                ?>

                </table>

            </div>


        </div>


    </div>   
  </div>   
</div>   

