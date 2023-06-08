<?php include('partials/menu.php'); 
include("connect.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    
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
        }else{
            print_r($error);
            die();
        }
    //}
    session_start();
    $title=$_POST['title'];
    $desc=$_POST['description'];
    $price=$_POST['price'];
    $category_id=$_POST['category'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    
    
    
    $sql="INSERT INTO `tbl_food` (`id`,`title`, `description`,`price`,`image_name`,`category_id`, `featured`, `active`) VALUES (NULL, '$title', '$desc','$price','$file_name','$category_id', '$featured', '$active')";
    $result=mysqli_query($conn,$sql);
    
    if($result)
    {
        $_SESSION['info']="<div class='success'>Food Added Successfully.</div>";
        header("location:\aryan\web-design-course-restaurant\admin\manage-food.php");
    }
    else {
        $_SESSION['info']="<div class='error'>food Donot Added Successfully.</div>";
        header("location:\aryan\web-design-course-restaurant\admin\add-food.php");
    }
    }
    
    
    


?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>

        <?php 
        if(isset($_SESSION['message'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['message']; //Display the SEssion Message if SEt
            unset($_SESSION['message']); //Remove Session Message
        }
           
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Food."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php 
                              $sql="SELECT * FROM `tbl_category` WHERE active='Yes'";
                              $result=mysqli_query($conn,$sql);
                              while($row=mysqli_fetch_assoc($result)){
                                echo "<option value=".$row['id'].">".$row['title'] ."</option>";
                              }
                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 

            

        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>