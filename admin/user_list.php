


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
        <table class="table table-striped">
                <tr>
                    <td colspan="7" align="right">
                        <a href="add_user.php" class="btn btn-success">
                            <span class="glyphoicon glyphicon-plus"></span>
                                Add User
                            </a>
                    </td>
                </tr>

                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Role</th>
                    <th>Action</th>
                </tr>

                <?php 

                if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                     del_user();
                }

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
$answers = mysqli_fetch_all($result, MYSQLI_ASSOC);
// print_r($answer);
// die();

foreach($answers as $answer){

//   echo '<td>$answer["user_id"]</td>';
  $user_id = $answer['user_id'];
  $user_name = $answer['user_name'];
  $user_role = $answer['role'];

  echo "<tr>";
  
  echo "<td>{$user_id}</td>";
  echo "<td>{$user_name}</td>";
  echo "<td>{$user_role}</td>";

 echo "<td><a href='user_list.php?action=delete&u_del={$user_id}' class='btn btn-danger'>Delete</a></td>";

  echo "</tr>";

    
}


?>


                

        </table>
    </div>

    
        </div>
      </div>
    </div>
