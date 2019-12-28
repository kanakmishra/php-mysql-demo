<?php
    session_start();
    include("connection.php"); 
    
	$first_name	= $_POST['firstName'];
	$last_name	= $_POST['lastName'];
	$email	= $_POST['email'];
	$password	= md5($_POST['password']);
	
	$insert = "INSERT INTO users (first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email', '$password' )";
	$results = mysqli_query($db, $insert);
    if($db->affected_rows > 0 ){
        echo true;
    } else {
        echo 0;
    }
?>