<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DEMO</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    </head>
    <body class="hold-transition login-page">
        <div class="container">
            <?php  if (empty($_SESSION['email'])){ ?>
            <a href="/index.php">WELCOME !
                <p> Please login or signup to continue</p>
            </a>
            <ul>
                <li class="active"><a href="./register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li class="active"><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php } else{ ?>
                    <li><a href="./user.php">Account Settings</a></li>
                    <li><a href="./change-password.php">Update Password</a></li>
                    <li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            <?php }  ?>
            </ul>
        </div>
    </body>
</html>