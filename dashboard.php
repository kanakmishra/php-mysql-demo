<?php 
    session_start();
    include("connection.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
        />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        
    </head>
    <?php  if (!empty($_SESSION['email'])){ ?>
    <body>
        <p class="text-center"><strong><?php echo "Wecome " . $_SESSION['first_name'] ." ". $_SESSION['last_name'] ?></strong></p>
        <a href="hobbies.php">
            <p  class="text-center"> Hobbies</p>
        </a>
    </body>
    <?php } else { header("location:login.php");} ?>
</html>