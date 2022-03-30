<?php
    //Include constants.php
    include('../config/constants.php');
    //Destroy the Session
    session_destroy(); //unsets $_SESSION['user'] = $username;

    //reDIRECT TO LOGIN PAGE
    header('location:'.SITEURL.'admin/login.php');
?>