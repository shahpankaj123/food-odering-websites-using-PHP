<?php include('partials/menu.php'); 
include("connect.php");
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /><br />
        <?php 
         if(isset($_SESSION['message1'])) //Checking whether the SEssion is Set of Not
         {
             echo $_SESSION['message1']; //Display the SEssion Message if SEt
             unset($_SESSION['message1']); //Remove Session Message
         }
           
        
        ?>
        <br><br>

                <!-- Button to Add Admin -->
                <a href="add-category.php" class="btn-primary">Add Category</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                    $sql="SELECT * FROM `tbl_category`";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        $featured=$row['featured'];
                        $active=$row['active'];

               
                       
                    ?>

                                    <tr>
                                      <td><?php echo $id; ?></td>
                                      <td><?php echo $title; ?></td>
                                      <td><img src="/aryan/web-design-course-restaurant/images/category/<?php echo $image_name;?>" width=50px; height=30px; alt="No img"></td>

                                       <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                            <a href="delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                                        </td>
                                    </tr>

                                <?php
                    }
                       
                    
                    ?>

                    

                    
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>