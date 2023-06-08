<?php include('partials/menu.php');
include("connect.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
//if(isset($_FILES['image']))
//{
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
//}

$title=$_POST['title'];
$featured=$_POST['featured'];
$active=$_POST['active'];



$sql="INSERT INTO `tbl_category` (`id`,`title`, `image_name`, `featured`, `active`) VALUES (NULL, '$title', '$file_name', '$featured', '$active')";
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


<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br><?php
        if(isset($_SESSION['message'])) //Checking whether the SEssion is Set of Not
         {
             echo $_SESSION['message']; //Display the SEssion Message if SEt
             unset($_SESSION['message']); //Remove Session Message
         }?>
       

        <br><br>

        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title" required>
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image" required>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes" default> Yes 
                        <input type="radio" name="featured" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes" default> Yes 
                        <input type="radio" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add CAtegory Form Ends -->

       

    </div>
</div>

<?php include('partials/footer.php'); ?>