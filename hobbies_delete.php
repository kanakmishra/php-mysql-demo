<?php
    session_start();
    include('include/connection.php');
    $hobbiesId= $_GET["id"];
    $select = "DELETE FROM hobbies WHERE id=$hobbiesId"; 
    $results = mysqli_query($db, $select);
    $Message = urlencode("<font color='green'>Data deleted successfully.</font>");
    header("Location:hobbies.php?Message=".$Message);
?>