<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    
    // Connect to MySQL server
    $connection = new mysqli($host, $username, $password);
    
    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "connect mysql server successfully";
?>