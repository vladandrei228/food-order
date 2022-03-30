<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //Removing Session Message
                }
                    if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload']; //Display Session Message
                    unset($_SESSION['upload']); //Removing Session Message
                } ?>
                <br>
        <!-- Add category -->
        <form action="" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" allow us to ulpoad file as image -->
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title" placeholder="Category Title"></td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td><input type="radio" name="featured" value="yes"> Yes
                        <input type="radio" name="featured" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="yes"> Yes
                        <input type="radio" name="active" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
            //Check if submit button is clicked or not
            if (isset($_POST['submit'])) {
                //get value from out form
                $title = $_POST['title'];

                //For Radio input, we need to check if the button is selected or not 
                if (isset($_POST['featured'])) {
                    //Get the value from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    //set the default value
                    $featured = "No";
                }

                if (isset($_POST['active'])) {
                    $active = $_POST['active'];
                }
                else{
                    $active = "No";
                }

                //check if the image is sleected or not and set the value for image name
                //print_r($_FILES['image']);
                //die();//break the code here

                if (isset($_FILES['image']['name'])) {
                    //Upload the Image
                    //To upload an image we need image name, source path and destination path
                    $image_name= $_FILES['image']['name'];

                    //autorename our image
                    //get the extension of our image e.g. "sepecialfood1.jpg"
                    $ext = end(explode('.', $image_name));
                     //Rename the image
                     $image_name = "Food_Category_".rand(0000, 9999).'.'.$ext; //e.g. Food_Category_765.jpg

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path="../images/category/".$image_name;

                    //Upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check if image is uploaded or not
                    if ($upload==false) {
                        //set message
                        $_SESSION['upload'] = "<div class='fail'>Failed to upload image.</div>";
                        //Redir to add category page
                        header('location:'.SITEURL.'admin/add-category.php');
                        //stop the process
                        die();
                    }
                }
                else
                {
                    //Don't Upload the image and set the iage_name value as blank
                    $image_name ="";
                }

                //SQL to insert category into database
                $sql = "INSERT into tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured= '$featured',
                    active='$active'";
                
                //Execute query
                $res = mysqli_query($conn, $sql);

                //Check if the query is executed
                if ($res==true) {
                    //Query Executed and Category Added
                    $_SESSION['add'] = "<div class='success'>Category Added Succesfully.</div>";
                    //Redir to manage Category Page
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //Failed to add category
                    $_SESSION['add'] = "<div class='fail'>Failed to Add Category.</div>";
                    //Redir to manage Category Page
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        ?>




    </div>
</div>

<?php include('partials/footer.php');?>