<?php

    session_start();
	include("connection.php");
	 $email	= $_POST['email']; 
	
	$insert = "SELECT * from users WHERE email= '".$email."' ";
	$results = mysqli_query($db, $insert);
	
    if(mysqli_num_rows($results)>0){
        echo true;
    } else {
        echo 0;
    }
?>
