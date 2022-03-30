<?php

    //Authorization- Access Control
    //Check if user is logged in or not
    if(!isset($_SESSION['user']))//IF user session is not set
    {
        //User is not logged it
        //redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='fail text-center'> Please login to access Admin Panel.</div>";
        //redir to login page
        header('location:'.SITEURL.'admin/login.php');
    }
?>