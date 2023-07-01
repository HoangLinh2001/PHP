<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbname ="buoi7db";
    //create connection
    $con = new mysqli($serverName,$userName,$password,$dbname);
   //check connection
    if($con->connect_error){
        die("Connection failed: " .$con->connect_error);
    }
    echo "Connect successfully";
?>