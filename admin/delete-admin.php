<?php 
session_start();
include("connect.php");
$id=$_GET['id'];
$sql="DELETE FROM `tbl_admin` WHERE id='$id'";
$result=mysqli_query($conn,$sql);
if($result){
    $_SESSION['message'] = "<div class='success'>Admin Deleted Successfully. </div>";
    header("location:manage-admin.php");
}
else{
    $_SESSION['message'] = "<div class='error'>Admin Not Deleted Successfully. </div>";
    header("location:manage-admin.php");

}

?>