<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../assets/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../assets/bootstrap.js">
    <link rel="stylesheet" href="../assets/jquery.min.js">

    <title>Header</title>
   
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">

     <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#abc">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
            <a href="dashboard.php" class="navbar-brand">Online Product Sale</a>
            <p class="navbar-text">[administration panel]</p>
        </div>

        <div class="collapse navbar-collapse" id="abc">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span></a></li>
            </ul>
        </div>
     </div>

    </nav>


</body>
</html>