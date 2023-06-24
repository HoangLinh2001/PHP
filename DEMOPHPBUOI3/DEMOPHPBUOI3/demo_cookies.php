<?php 
  $userName = "Xuyen Le";
  $visitCounter = 1;
if(isset($_COOKIE['username']) && isset($_COOKIE['visit_counter'])){
    $userName = $_COOKIE['username'];
    $visitCounter = $_COOKIE['visit_counter'];
    echo "Welcome back $userName visit lan thu $visitCounter";
    $visitCounter++;
}
//create cookie
setcookie("username",$userName,time() + 3600);
setcookie("visit_counter",$visitCounter,time() + 3600);
//xoa cookie
setcookie("username","",time() - 3600);
setcookie("visit_counter","",time() - 3600);


?>