<?php

    //Include constants.php file here
    include('../config/constants.php');

    //Get the ID of ADmin to be deleted
    $id = $_GET['id'];

    //Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Checl whether the query executed succesfully or not
    if($res==true){
        //Query Executed Succesfully, and Admin Deleted
        //echo "Admin Deleted";

        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Succesfully</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manageadmin.php');
    }
    else{
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='fail'>Failed to Delete Admin. Try Again Later.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manageadmin.php');
    }

    //Redirect to ManageAdmin page with message ( succes/fail )

?>