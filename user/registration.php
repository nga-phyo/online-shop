<style>
    .top{

        margin-top: 70px;
    }
</style>
<?php 

    include './header.php';
    include '../admin/connect.php';
    include './function.php';

    if(isset($_POST['register'])){

        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

            $errors = array (
                'username' => '',
                'password' => '',
                'confirm_password' => '',
                'match_password' => '',
                'email' => '',
                'phone' => '',
                'address' => '',
            );

            if($user_name == ''){

                $errors['username'] = 'User Name must be enter';

            }else if(strlen($user_name) < 3){
                $errors['username'] = 'User Name need to be longer';
            }

            if($confirm_password == ''){

                $errors['confirm_password'] = 'This field could not empty';

            }else {if($password != $confirm_password){
                $errors['match_password'] = 'Password could do not match';
            }}

            if($password == '') {

                $errors['password'] = 'This field could not be empty';
            } 
            else {if(strlen($password) < 3){
                $errors['password'] = 'Password need to be longer';
            }
            
            }
            if($email == ''){

                $errors['email'] = 'This field could not be empty';
            }
            if($phone == ''){

                $errors['phone'] = 'This field could not be empty phone number';
            }
            if($address == ''){

                $errors['address'] = 'This field could not be empty address';
            }

            foreach($errors as $key => $value){

                if(empty($value)){
                    unset($errors[$key]);
                }
                if(empty($errors)){
                    
                    create_accu();
                }
            }


    }


?>

    <div class="container top">
        <div class="row">
             <div class="col-md-8 col-md-offset-2">


                    <form action="registration.php" class="form-horizontal" method="POST">

                        <div class="form-group">

                        <label for="email" class="control-label col-sm-2">UserName</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" value="<?php if(isset($user_name)) {echo $user_name;} ?>" placeholder="Enter user name" class="form-control" id="email">
                                <label class="text-danger"><?php echo isset($errors['username']) ? $errors['username']  : '' ?></label>
                            </div>
                        </div>

                        <div class="form-group">

                        <label for="email" class="control-label col-sm-2">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" value="<?php echo isset($password) ?  $password : '' ?>" placeholder="Enter user password"  class="form-control" id="email">
                            <label class="text-danger"><?php echo isset($errors['password']) ? $errors['password']  : '' ?></label>
                        </div>
                    </div>


                    <div class="form-group">

                    <label for="email" class="control-label col-sm-2">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="confirm_password" value="<?php echo isset($confirm_password) ?  $confirm_password : '' ?>" placeholder="Enter user confirm password" class="form-control" id="email">
                        <label class="text-danger"><?php echo isset($errors['confirm_password']) ? $errors['confirm_password']  : '' ?></label>
                    </div>
                   </div>

                    <div class="form-group">

                    <label for="email" class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="<?php echo isset($email) ?  $email : '' ?>" placeholder="Enter user Email" class="form-control" id="email">
                        <label class="text-danger"><?php echo isset($errors['email']) ? $errors['email']  : '' ?></label>
                    </div>
                   </div>

                    <div class="form-group">

                    <label for="email" class="control-label col-sm-2">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" value="<?php echo isset($phone) ?  $phone : '' ?>" placeholder="Enter user Phone" class="form-control" id="email">
                        <label class="text-danger"><?php echo isset($errors['phone']) ? $errors['phone']  : '' ?></label>
                    </div>
                   </div>

                    <div class="form-group">

                    <label for="email" class="control-label col-sm-2">Address</label>
                    <div class="col-sm-10">
                       <textarea name="address" class="form-control" placeholder="enter your address" cols="30" rows="10">
                       <?php echo isset($address) ?  $address : '' ?>
                       </textarea>
                       <label class="text-danger"><?php echo isset($errors['address']) ? $errors['address']  : '' ?></label>
                    </div>
                   </div>


                   <label for="" class="text-danger"></label>
                   <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">

                    <button type="submit" class="btn btn-primary" name="register">Submit</button>
                    </div>
                   </div>

                

                    </form>


             </div>
        </div>
    </div>
