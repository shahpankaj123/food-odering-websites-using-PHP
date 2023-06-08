<?php include('connect.php');
session_start();
if(isset($_SESSION['username']))
{
    header("location: index.php");
}
 ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
            if(isset($_SESSION['message'])){
                $msg=$_SESSION['message'];
                echo "<h3 style='color:blue;'>$msg</h3>";
                unset($_SESSION['message']);
            }
                
            ?>
            <br><br>

            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username" required><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password" required><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->

            <p class="text-center">Created By - <a href="www.pankajshah12.com.np">Pankaj shah</a></p>
        </div>

    </body>
</html>

<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    
    $sql="SELECT * FROM `tbl_admin` WHERE username='$username' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    
    $row=mysqli_num_rows($result);
    if($row==1){
        session_start();
        $_SESSION['message']="Login sucessful";
        $_SESSION['login']=true;
        $_SESSION['username']=$username;
        header("location: index.php");
    }
    else{
        $_SESSION['message']="Login unsucessful";
        header("location: login.php");

    }
}

   

?>