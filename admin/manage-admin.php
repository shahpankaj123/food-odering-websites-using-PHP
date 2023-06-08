<?php include('partials/menu.php'); 
 include('connect.php')?>


        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br />

                <?php 
                     if(isset($_SESSION['message'])) //Checking whether the SEssion is Set of Not
                     {
                         echo $_SESSION['message']; //Display the SEssion Message if SEt
                         unset($_SESSION['message']); //Remove Session Message
                     }

                ?>
                <br><br><br>

                <!-- Button to Add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    
                    <?php 
                     $sql="SELECT * FROM `tbl_admin`";
                     $result=mysqli_query($conn,$sql);
                     while($row=mysqli_fetch_assoc($result)){

                       
                    echo "
                                    
                                    <tr>
                                        <td> ". $row['id'] ."</td>
                                        <td>". $row['full_name'] ."</td>
                                        <td>". $row['username'] ."</td>
                                        <td>
                                            <a href='update-password.php?id=". $row['id'] ."' class='btn-primary'>Change Password</a>
                                            <a href='update-admin.php?id=". $row['id'] ."' class='btn-secondary'>Update Admin</a>
                                            <a href='delete-admin.php?id=". $row['id'] ."' class='btn-danger'>Delete Admin</a>
                                        </td>
                                    </tr>";

                                    
                     }
                     ?>
                            
                


                    
                </table>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); ?>