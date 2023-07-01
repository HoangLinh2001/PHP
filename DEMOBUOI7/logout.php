<?php
session_start();
if(isset($_SESSION['email'])&& isset($_SESSION['name'])){
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['role']);
    header('Location:login.php');
    exit();
}
?>