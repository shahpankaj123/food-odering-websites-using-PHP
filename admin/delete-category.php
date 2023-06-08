<?php
include("connect.php");
session_start();
 if(isset($_GET['id']) AND isset($_GET['image_name']) ){
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    if($image_name!="")
    {
        $path="../images/category/".$image_name;
        $remove=unlink($path);
    }
    $sql="DELETE FROM `tbl_category` WHERE `tbl_category`.`id` = '$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['message1'] = "<div class='success'>Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        header('location: manage-category.php');
    }else{
        $_SESSION['message1'] = "<div class='error'>Deleted unSuccessfully.</div>";
        //Redirect to Manage Admin Page
        header('location: manage-category.php');

    }
 }
?>