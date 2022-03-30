<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php
                if(isset($_SESSION['add'])){ //Checking whether the Session is set or not
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //Removing Session Message
                }
               ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //Process the value from Form and Save it in Database

    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //Get the data from form
        $full_name= $_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']); //Password Encrypted with MD5

        //SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET
        full_name ='$full_name',
        username='$username',
        password='$password'
        ";

        //Execute Query and Save Data in Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //Check whether the data is inseterd or not and display appropiate message
        if($res==TRUE){
            //Data inserted
            //echo "Your accound has been created succesfully! Welcome in our Team!";
            //Create a Session Variable to display message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manageadmin.php');
        }
        else{
            //Data not inserted
            //echo "Something went wrong! Check if there are is another user with the same username!";
            //Create a Session Variable to display message
            $_SESSION['add'] = "<div class='fail>Failed to Add Admin</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }


?>