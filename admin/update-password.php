<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td><input type="password" name="current_password" placeholder="Current password"></td>
                </tr>
                <tr>
                    <td>New Password: </td>
                    <td><input type="password" name="new_password" placeholder="New password"></td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php

//Check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    // Button Clicked
    //echo "Button Clicked";

    //Get the data from form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //SQL Query to Update Admin
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    //Execute Query and Save Data in Database
    $res = mysqli_query($conn, $sql);

    if($res==true){
        $count=mysqli_num_rows($res);
        if($count==1){
            //check if new pass and confirm pass mathces
            if($new_password==$confirm_password){
                //update pwd
                $sql2 =" UPDATE tbl_admin SET password='$new_password' WHERE id = $id";

                //Execute query
                $res2 =mysqli_query($conn, $sql2);

                //CHeck whether the query exeuted or not
                if($res2==true)
                {
                    //Display Succes Message
                    //REdirect to Manage Admin Page with Success Message
                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
                    //Redirect the User
                    header('location:'.SITEURL.'admin/manageadmin.php');
                }
                else
                {
                    //Display Error Message
                    //REdirect to Manage Admin Page with Error Message
                    $_SESSION['change-pwd'] = "<div class='fail'>Failed to Change Password. </div>";
                    //Redirect the User
                    header('location:'.SITEURL.'admin/manageadmin.php');
                }
            }
            else{
                //redir to manage admin with err msg
                $_SESSION['pwd-not-match']= "<div class='fail'>Passwords does not match. </div>";
                //redir user
                header('location: '.SITEURL.'admin/manageadmin.php');
            }
        }
        else{
            //user does not exists set message and redirect
            $_SESSION['user-not-found'] = "<div class='fail'>User Not Found. </div>";
            //Redirect the USer
            header('location:'.SITEURL.'admin/manageadmin.php');
        }
    }

}


?>




<?php include('partials/footer.php'); ?>