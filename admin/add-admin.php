<?php include('partials/menu.php');
    include('connect.php');
 ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['message'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['message']; //Display the SEssion Message if SEt
                unset($_SESSION['message']); //Remove Session Message
           }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name" required>
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username" required>
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $fullname=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES (NULL, '$fullname','$username','$password')";
    $result=mysqli_query($conn,$sql);

    if($result){
        $_SESSION['message']="Admin created succesfully";
        header("location:\aryan\web-design-course-restaurant\admin\manage-admin.php");
    }
    else{
        $_SESSION['message']="Admin created unsuccesfully";
       header("location:\aryan\web-design-course-restaurant\add-admin.php");
    }


}
?>



    