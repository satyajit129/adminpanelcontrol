<?php

session_start();
if(!isset($_SESSION['auth'])){
    $_SESSION['auth_status']= "login to access Dashboard";
    header('location:login.php');
    exit();
}

?>