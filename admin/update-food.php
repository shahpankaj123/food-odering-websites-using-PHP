<?php include('partials/menu.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected Food
        $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
        //execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //Get the Individual Values of Selected Food
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

    }
    else
    {
        //Redirect to Manage Food
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            //Image not Available 
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image Available
                            ?>
                            <img src="../images/food/<?php echo $current_image; ?>" width="150px" height="100px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select New Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category">

                        <?php 
                            //Query to Get ACtive Categories
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            //Execute the Query
                            $res = mysqli_query($conn, $sql);
                            //Count Rows
                            $count = mysqli_num_rows($res);

                            //Check whether category available or not
                            if($count>0)
                            {
                                //CAtegory Available
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    
                                    //echo "<option value='$category_id'>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                //CAtegory Not Available
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes 
                    <input <?php if($featured=="No") {echo "checked";} ?> type="radio" name="featured" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Yes") {echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 
                    <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
         if(isset($_POST['submit']))
         {
            session_start();
            $title=$_POST['title'];
            $desc=$_POST['description'];
            $price=$_POST['price'];
            $category_id=$_POST['category'];
            $featured=$_POST['featured'];
            $active=$_POST['active'];
             
             if(empty($_FILES['image']['name']))
             {
               $file_name=$current_image; 
             }else{
              
                     $error=array();
                 
                     $file_name=$_FILES['image']['name'];
                     $file_size=$_FILES['image']['size'];
                     $file_tmp=$_FILES['image']['tmp_name'];
                     $file_type=$_FILES['image']['type'];
                     $file_ext=end(explode('.',$file_name));
                 
                     $extensions = array("jpeg","png","jpg");
                 
                     if(in_array($file_ext,$extensions) === false)
                     {
                         $error[]="this extensions file not allowed,please choose jpeg or jpg";
                 
                     }
                 
                     if($file_size > 1024*1024*2)
                     {
                         $error[]="FILE SIZES MUST BE LESS THEN 2MB";
                     }
                 
                     if(empty($error) == true)
                     {
                         move_uploaded_file($file_tmp,"../images/food/".$file_name);
                         echo "hello";
                     }else{
                         print_r($error);
                         die();
                     }
                     if($current_image!="")
                     {
                      $path="../images/food/".$current_image;
                      $remove=unlink($path);
                     }
              }
              
              

                 
                 
                 
                 $sql="UPDATE `tbl_food` SET title='$title',description='$desc',price='$price',image_name='$file_name',category_id='$category_id',featured='$featured',active='$active' WHERE id='$id'";
                 $result=mysqli_query($conn,$sql);
                 
                 if($result)
                 {
                     $_SESSION['info']="<div class='success'>food Updated Successfully.</div>";
                     header("location:\aryan\web-design-course-restaurant\admin\manage-food.php");
                 }
                 else {
                     $_SESSION['info']="<div class='error'>food Donot Uodated Successfully.</div>";
                     header("location:\aryan\web-design-course-restaurant\admin\add-food.php");
                 }
              }

      
           
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>