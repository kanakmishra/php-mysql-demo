<?php
    session_start();
    include('connection.php');
	if(isset($_GET['Message'])){
		echo $_GET['Message'];
    }
    $userId = $_SESSION['id'];
    if (isset($_POST['add'])) {
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $reminder = mysqli_real_escape_string($db, $_POST['reminder']);
        $select = "INSERT INTO hobbies(user_id, name, reminder) VALUES ($userId, '$name', '$reminder')"; 
        $results = mysqli_query($db, $select);
            $Message = urlencode("<font color='green'>Data Added successfully.</font>");
            header("Location:hobbies.php?Message=".$Message);
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <style>.parsley-errors-list { color: red;}</style>
        <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
        />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        
    </head>
    <?php  if (!empty($_SESSION['email'])){ ?>
    <body>  
        <div class="container">
            <h3 class="card-title text-center">Add Hobbies</h3>
            <form method="post" action="hobbies_add.php" data-parsley-validate=""> 
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="name" class="form-control" value="" required=""/>
                </div>
                <div class="form-group">
                    <label>Reminder</label>
                    <input type="text" name="reminder" class="form-control" value="" required=""/>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="add">Add</button>
                </div>
            </form>
        </div>
    </body>
    <?php } else { header("location:login.php");} ?>
</html>