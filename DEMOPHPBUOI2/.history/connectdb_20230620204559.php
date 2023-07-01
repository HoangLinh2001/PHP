<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "emdatabase";
    //create connection
    $con = new mysqli($serverName,$username,$password,$dbname);
    //check connection
    // if ($con -> connect_error) {
    //     die("connection failed: ".$con->connect_error);
    // }
    // echo "connect successfully !";
?>