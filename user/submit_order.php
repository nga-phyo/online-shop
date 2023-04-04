<style>
    .top {
        margin-top: 50px;
    }
</style>

<?php 
         session_start();
        include './header.php';
        include '../admin/connect.php';
   


        if(!empty($_SESSION['user'])){

            $user_name = $_SESSION['user'];
            $query = "SELECT * FROM user where `user_name` = '$user_name'";
            $go_query = mysqli_query($conn, $query);

            while($out = mysqli_fetch_assoc($go_query)){

                $user_id = $out['user_id'];
                $user_name = $out['user_name'];
                $email = $out['email'];
                $phone = $out['phone'];
                $address = $out['address'];

            }

        }
        
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
        <div class="col-sm-6 col-sm-offset-3">
        <div class="row">

        </div>
            
                
               <form method="POST" action="submit.php">

                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" name="username" class="form-control" value="<?php if(isset($user_name)){echo $user_name;} ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php if(isset($email)){echo $email;} ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?php if(isset($phone)){echo $phone;} ?>">
                    </div>

                 <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" value="<?php if(isset($address)){echo $address;} ?>">
                   
                 </div>

                    <div class="form-group">

                        <label for="">Payment Type</label>

                       <select name="payment_type" id="" class="form-control">
                       <option value="Master Card">Master Card</option>
                       <option value="Visa Card">Visa Card</option>
                       <option value="Credit Card">Credit Card</option>
                       </select>
                    </div>

                    <div class="form-group">
                        <label for="">CardNo:</label>
                        <input type="text" name="cardno" class="form-control">
                    </div>

                    <div class="form-group">
                       
                        <input type="hidden" value="<?php echo $user_id?>" name="user_id">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>


                </form>

           
        </div>


        </div>
    </div>
</div>



        


