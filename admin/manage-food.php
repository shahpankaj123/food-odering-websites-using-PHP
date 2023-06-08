<?php include('partials/menu.php'); 
 ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /><br />

                <!-- Button to Add Admin -->
                <a href="add-food.php" class="btn-primary">Add Food</a>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['info'])) //Checking whether the SEssion is Set of Not
                    {
                        echo $_SESSION['info']; 
                        unset($_SESSION['info']); //Remove Session Message
                    }
                
                ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                     $sql="SELECT * FROM `tbl_food`";
                     $result=mysqli_query($conn,$sql);
                     while($row=mysqli_fetch_assoc($result)){
                         $id=$row['id'];
                         $title=$row['title'];
                         $desc=$row['description'];
                         $price=$row['price'];
                         $image_name=$row['image_name'];
                         $category_id=$row['category_id'];
                         $feature=$row['featured'];
                         $active=$row['active'];
 
                       
                                ?>

                                <tr>
                                    <td><?php echo $id; ?> </td>
                                    <td><?php echo $title; ?></td>
                                    <td>$<?php echo $price; ?></td>
                                    <td>
                                    <img src="/aryan/web-design-course-restaurant/images/food/<?php echo $image_name;?>" width=50px; height=30px; alt="No img">
                                    </td>
                                    <td><?php echo $feature; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                        <a href="delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                                    </td>
                                </tr>

                                <?php
                     }
                        
                    ?>

                    
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>