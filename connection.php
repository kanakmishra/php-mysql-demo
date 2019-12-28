<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'php-mysql';
    $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if (!$db) {
        echo "Failed to connect to MySQL: " . $db->connect_error;
        exit();
    }
?>
