<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset ($_SESSION['login']);
                }
                if (isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset ($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!--Login form Starts here -->
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Username">
                <br><br>
                Password: <br>
                <input type="password" name="password" placeholder="Enter Password">
                <br><br>
                <input type="submit" name="submit" value="Login" class="btn-primary">
            </form>
            <!--Login form Ends here -->
            <br><br>
            <p class="text-center">Created By - <a href="#">Vlad-Andrei Gruia</a></p>
        </div>

    </body>
</html>

<?php

    //Check if submit button is clicked
    if(isset($_POST['submit'])){
        //Process for login
        //Get the data from login form
        $username= $_POST['username'];
        $password= md5($_POST['password']);

        //SQL to verify if usn and pwd exists or not
        $sql="SELECT * from tbl_admin where username= '$username' and password='$password'";

        //Execute Query
        $res = mysqli_query($conn, $sql);

        //Count rows to check if user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User Available and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successfull. </div>";
            $_SESSION['user'] = $username; // To check whether the user is logged in or not and logout will unset it 

            //redirect to homepage/dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not Available and Login Fail
            $_SESSION['login'] = "<div class='fail text-center'>Login Failed. </div>";

            //redirect to homepage/dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>