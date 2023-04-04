

<?php if(empty($_SESSION['user'])):?>

    <link rel="stylesheet" href="../assets/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../assets/bootstrap.js">
    <link rel="stylesheet" href="../assets/jquery.min.js">
    
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">


        <div class="nabar-header">
            <a class="navbar-brand" href="#">Online Book Sale</a>
        </div>

            <ul class="nav navbar-nav">

            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="registration.php">Register</a></li>

            </ul>

    </div>
</nav>


<?php else: ?>
    <link rel="stylesheet" href="../assets/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../assets/bootstrap.js">
    <link rel="stylesheet" href="../assets/jquery.min.js">
    
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">


        <div class="nabar-header">
            <a class="navbar-brand" href="#">Online Book Sale</a>
        </div>

            <ul class="nav navbar-nav">

            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="logout.php">Logout</a></li>

            </ul>

    </div>
</nav>

<?php endif ?>