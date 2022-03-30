<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br/><br/>

        <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //Removing Session Message
                }
                if(isset($_SESSION['remove'])){
                    echo $_SESSION['remove']; //Display Session Message
                    unset($_SESSION['remove']); //Removing Session Message
                }
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete']; //Display Session Message
                    unset($_SESSION['delete']); //Removing Session Message
                }
                if(isset($_SESSION['no-category-found']))
                {
                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
                }
    
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
    
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
    
                if(isset($_SESSION['failed-remove']))
                {
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                }
                ?>

                <br>

               <!-- Button to Add Admin -->
               <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

               <br/><br/><br/>
               <table class="tbl-full">
                   <tr>
                       <th>ID</th>
                       <th>Title</th>
                       <th>Image</th>
                       <th>Featured</th>
                       <th>Active</th>
                       <th>Actions</th>
                   </tr>
                   <?php
                    $sql = "SELECT * from tbl_category";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    $sn = 1;
                    //check if we have data in database
                    if($count>0){
                        //We have data in database
                        //Get the data and display
                        while($row=mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $title;?></td>

                                    <td>
                                        <?php
                                            //Check whether img name si available or not
                                            if ($image_name!="") {
                                                // Display the image
                                                ?>
                                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            }
                                            else
                                            {
                                                // Display the message
                                                echo "<div class='fail'>No image added</div>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured;?></td>
                                    <td><?php echo $active;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id;?>" class="btn-secondary">Update Category</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-delete">Delete Category</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else{
                        //We do not have data in database
                        //we will display the message inside table
                        ?>
                            <tr>
                                <td colspan="6">
                                    <div class="fail">No Category Added<./div>
                                </td>
                            </tr>
                        <?php
                    }
                   ?> 
                   
               </table>

    </div>
</div>
<?php include('partials/footer.php'); ?>