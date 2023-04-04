<style>
    .top{
        margin-top: 50px;
    }
</style>

 <?php 
    
    include '../admin/connect.php';
    include 'header.php';

 ?>


    <div class="well top">
        
    <h4>Blog Search</h4>
    <form action="search.php" method="POST">

        <div class="input-group">

            <input type="text" name="search" class="form-control">

            <span class="input-group-btn">
                <button name="submit" class="btn btn-primary" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        

        </div>
    </form>
    </div>

    <div class="well">
        <h4>Cagegories</h4>
        <div class="row">
            <div class="col-md-12">

                <ul class="list-style-type:circel">

                    <?php 

                        $category = "SELECT * FROM category";
                        $result = mysqli_query($conn,$category);

                        while($out = mysqli_fetch_array($result)){

                            $db_cat_id = $out['cat_id'];
                            $db_cat_name = $out['cat_name'];
                            echo "<li><a href='index.php?cat_id={$db_cat_id}'>{$db_cat_name}</a></li>";

                        }
                    ?>

                </ul>

            </div>
        </div>
    </div>