<?php
include("connect.php");
session_start();
 if(isset($_GET['id']) AND isset($_GET['image_name']) ){
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    if($image_name!="")
    {
        $path="../images/food/".$image_name;
        $remove=unlink($path);
    }
    $sql="DELETE FROM `tbl_food` WHERE `tbl_food`.`id` = '$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['info'] = "<div class='success'>Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        header('location: manage-food.php');
    }else{
        $_SESSION['info'] = "<div class='error'>Deleted unSuccessfully.</div>";
        //Redirect to Manage Admin Page
        header('location: manage-food.php');

    }
 }
?>