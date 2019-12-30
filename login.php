<?php 
    session_start();
    include("connection.php");
    
    if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $password = md5($password);
      $select = "SELECT * FROM users WHERE email='$email' AND password='$password'";
      $results = mysqli_query($db, $select);
      $count = $results->num_rows;
      if ($count>0) {
        $rows = $results->fetch_object();
          $_SESSION['id'] = $rows->id; 
          $_SESSION['first_name'] = $rows->first_name; 
          $_SESSION['last_name'] = $rows->last_name; 
          $_SESSION['email'] = $rows->email; 
          $_SESSION['success'] = "You are now logged in.";
          header('location: dashboard.php');
      } else {
          $Message = urlencode("<font color='red'>Wrong email/password combination, Please check it.</font>");
          header("Location:login.php?Message=".$Message);
      }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
    <style>.parsley-errors-list { color: red;}</style>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
  </head>
  <body>
    <div class="container">
    <span id="regSuccess" style="color:green;"></span>
    <h1>Login Form</h1>
          <div class="login-box">
          <!-- <?php //if (empty($_SESSION['email'])) { ?> -->
            <form method="post" action="login.php" data-parsley-validate="">
                <div class="form-group">
                <input type="email" class="form-control" value="" required="" placeholder="Email" name="email" data-parsley-maxlength="100">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" required="" placeholder="Password" name="password" >
                </div>
                <div class="row">
                    <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
  <?php //} else{ header('location: dashboard.php');}?>
</div>

