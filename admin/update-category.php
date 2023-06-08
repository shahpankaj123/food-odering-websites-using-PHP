<?php include('partials/menu.php');
include("connect.php");

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>


        <?php 
        
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the ID and all other details
                //echo "Getting the Data";
                $id = $_GET['id'];
                //Create SQL Query to get all other details
                $sql = "SELECT * FROM tbl_category WHERE id=$id";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count the Rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {
                    //redirect to manage category with session message
                    $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

            }
            else
            {
                //redirect to Manage CAtegory
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php 
                            if($current_image != "")
                            {
                                //Display the Image
                                ?>
                                <img src="../images/category/<?php echo $current_image; ?>" width="150px" height="100px">
                                <?php
                            }
                            else
                            {
                                //Display Message
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image" value="<?php echo $current_image; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes 

                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 

                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
               
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                
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
                            move_uploaded_file($file_tmp,"../images/category/".$file_name);
                            echo "hello";
                        }else{
                            print_r($error);
                            die();
                        }
                        if($current_image!="")
                        {
                         $path="../images/category/".$current_image;
                         $remove=unlink($path);
                        }
                 }
                 
                 

                    
                    
                    
                    $sql="UPDATE `tbl_category` SET title='$title',image_name='$file_name',featured='$featured',active='$active' WHERE id='$id'";
                    $result=mysqli_query($conn,$sql);
                    
                    if($result)
                    {
                        $_SESSION['message1']="<div class='success'>Category Added Successfully.</div>";
                        header("location:\aryan\web-design-course-restaurant\admin\manage-category.php");
                    }
                    else {
                        $_SESSION['message1']="<div class='error'>Category Donot Added Successfully.</div>";
                        header("location:\aryan\web-design-course-restaurant\admin\add-category.php");
                    }
                 }

         
               
            
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>