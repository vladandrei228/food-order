<?php

    //Include constants.php file here
    include('../config/constants.php');

    //Check whether the id and img name  value is set or not
    if (isset($_GET['id']) AND isset($_GET['image_name'])) {
        //get the value and delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Remove the physical image file if available
        if ($image_name != "") {
            //Img is Available, so remove it
            $path = "../images/category/".$image_name;
            //Remove the image
            $remove = unlink($path);

            //if failt to remove image then add an error message and stop the process
            if($remove == false){
                //set the session message
                $_SESSION['remove'] = "<div class='fail'> Failed to remove category image.</div>";
                //redirect to manage categ page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stopthe process
                die();
            }
        }

        // Delete data from database
        $sql = "DELETE FROM tbl_category where id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is deleted frrom databse or not
        if ($res==true) {
            // Redirect to manage category page with message
            $_SESSION['delete']= "<div class='success'>Category deleted successfully</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');

        }
        else
        {
            //Set fail message Redirect
            $_SESSION['delete']= "<div class='fail'>Failed to delete category</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        
    }
    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }


?>