<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php 
            // Get the ID of Selected Admin
            $id=$_GET['id'];

            //Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_admin where id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed ro not
            if($res==true){
                //Check whether tge data is available or not
                $count = mysqli_num_rows($res);

                //Check whether we have admin data or not
                if($count==1){
                    //Get the details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $full_name =$row['full_name'];
                    $username = $row['username'];
                }
                else{
                    //Redirect to manage admin page
                    header('location:'.SITEURL.'admin/manageadmin.php');
                }
            }
        ?>
        <form action="" method="POST">
        <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name?>"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value="<?php echo $username?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secundary">
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
    $full_name= $_POST['full_name'];
    $username=$_POST['username'];

    //SQL Query to Update Admin
    $sql = "UPDATE tbl_admin SET
    full_name ='$full_name',
    username='$username'
    where id='$id'
    ";

    //Execute Query and Save Data in Database
    $res = mysqli_query($conn, $sql);

    //Check whether the data is inseterd or not and display appropiate message
    if($res==true){

        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
        
        header("location:".SITEURL.'admin/manageadmin.php');
    }
    else{
        
        $_SESSION['update'] = "<div class='fail>Failed to Update Admin</div>";
        
        header("location:".SITEURL.'admin/update-admin.php');
    }
}


?>

<?php include('partials/footer.php'); ?>