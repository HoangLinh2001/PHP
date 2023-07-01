<?php
require_once("check_connect_mysql.php");
//Create a function to check if the database exists.
function databaseExists($connection, $databaseName)
{
    $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA
     WHERE SCHEMA_NAME = '$databaseName'";
    $result = mysqli_query($connection, $query);
    return mysqli_num_rows($result) > 0;
}
//Create a function to check if a table exists within a database.
function tableExists($connection, $databaseName, $tableName)
{
    $query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
     WHERE TABLE_SCHEMA = '$databaseName' AND TABLE_NAME = '$tableName'";
    $result = mysqli_query($connection, $query);
    return mysqli_num_rows($result) > 0;
}
$databaseName = "buoi7db";
$tableName = "usertb";
// Check if the database exists
if (!databaseExists($connection, $databaseName)) {
    // Create the database
    $createDatabaseQuery = "CREATE DATABASE $databaseName";
    if (mysqli_query($connection, $createDatabaseQuery)) {
        echo "Database created successfully<br>";
    } else {
        echo "Error creating database: " . mysqli_error($connection);
    }
}

// Select the database
mysqli_select_db($connection, $databaseName);

// Check if the table exists
if (!tableExists($connection, $databaseName, $tableName)) {
    // Create the table
    $createTableQuery = "CREATE TABLE $tableName 
    (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50),
    password VARCHAR(50), email VARCHAR(50),role VARCHAR(20),
    status TINYINT(1))";
    if (mysqli_query($connection, $createTableQuery)) {
        echo "Table created successfully<br>";
    } else {
        echo "Error creating table: " . mysqli_error($connection) . "<br>";
    }
}
?>